<?php
/*
	[Destoon B2B System] Copyright (c) 2008-2015 www.destoon.com
	This is NOT a freeware, use is subject to license.txt
*/
defined('DT_ADMIN') or exit('Access Denied');
$menus = array (
    array('�ļ�����', '?file=patch'),
    array('ľ��ɨ��', '?file=scan'),
    array('�ļ�У��', '?file=md5'),
);
$sys = array('admin', 'api', 'file', 'include', 'lang', 'module', 'skin', 'template', 'mobile', $MODULE[2]['moduledir']);
$ext = 'php|htm|css|js|jpg|gif|png';
if($action == 'view') {
	isset($fid) or msg();
	preg_match("/^[0-9\.\-\s~]{33}$/", $fid) or msg();
	is_dir(DT_ROOT.'/file/patch/'.$fid) or msg();
	$lists = get_file(DT_ROOT.'/file/patch/'.$fid);
	include tpl('patch_view');
} else if($action == 'delete') {
	isset($fid) or msg();
	preg_match("/^[0-9\.\-\s~]{33}$/", $fid) or msg();
	is_dir(DT_ROOT.'/file/patch/'.$fid) or msg();
	dir_delete(DT_ROOT.'/file/patch/'.$fid);
	dmsg('ɾ���ɹ�', '?file='.$file);
} else {
	if($submit) {
		is_date($fd) or $fd = timetodate($DT_TIME, 3);
		if($fh < 0 || $fh > 23) $fh = 0;
		if($fm < 0 || $fm > 59) $fm = 0;
		$ft = strtotime($fd.' '.($fh > 9 ? $fh : '0'.$fh).':'.($fm > 9 ? $fm : '0'.$fm).':00');

		is_date($td) or $td = timetodate($DT_TIME, 3);
		if($th < 0 || $th > 23) $th = 23;
		if($tm < 0 || $tm > 59) $tm = 59;
		$tt = strtotime($td.' '.($th > 9 ? $th : '0'.$th).':'.($tm > 9 ? $tm : '0'.$tm).':59');
		
		$tt > $ft or msg('���ڷ�Χ���ô���');

		isset($filedir) or $filedir = $sys;
		$fileext or $fileext = $ext;
		$files = array();
		foreach(glob(DT_ROOT.'/*.*') as $f) {
			if(in_array(basename($f), array('config.inc.php', 'index.html', 'baidunews.xml', 'sitemaps.xml'))) continue;
			$files[] = $f;
		}
		foreach($filedir as $d) {
			if($d == 'file') {
				$files = array_merge($files, get_file(DT_ROOT.'/'.$d.'/script', $fileext));
				$files = array_merge($files, get_file(DT_ROOT.'/'.$d.'/image', $fileext));
				$files = array_merge($files, get_file(DT_ROOT.'/'.$d.'/config', $fileext));
			} else {
				$files = array_merge($files, get_file(DT_ROOT.'/'.$d, $fileext));
			}
		}
		$lists = array();
		foreach($files as $f) {
			if(in_array($f, array(DT_ROOT.'/file/script/config.js'))) continue;
			$n = basename($f);
			if(file_ext($n) == 'js') {
				if(in_array(substr($n, 0, 1), array('A', '0'))) continue;
			}
			$t = filemtime($f);
			if($t >= $ft && $t <= $tt) {
				$lists[] = $f;
			}
		}
		$find = count($lists);
		if($find) {
			$dir = DT_ROOT.'/file/patch/'.timetodate($ft, 'Y-m-d H.i').'~'.timetodate($tt, 'Y-m-d H.i').'/';
			if(is_dir($dir)) dir_delete($dir);
			foreach($lists as $f) {
				file_copy($f, $dir.str_replace(DT_ROOT.'/', '', $f));
				@touch($dir.str_replace(DT_ROOT.'/', '', $f), filemtime($f));
			}
			msg('���ݳɹ� '.$find.' ���ļ����ѱ�����file/patchĿ¼', '?file='.$file, 5);
		}
		msg('û�з����������ļ�');
	} else {
		$files = glob(DT_ROOT.'/*');
		$dirs = $rfiles = $baks = $ups = array();
		foreach($files as $f) {
			$bn = basename($f);
			if(is_file($f)) {
				$rfiles[] = $bn;
			} else {
				$dirs[] = $bn;
			}
		}
		$fd = substr(DT_RELEASE, 0, 4).'-'.substr(DT_RELEASE, 4, 2).'-'.substr(DT_RELEASE, 6, 2);
		$td = timetodate($DT_TIME, 3);
		$files = glob(DT_ROOT.'/file/patch/*');
		foreach($files as $f) {
			if(is_dir($f)) {
				$n = basename($f);
				if(preg_match("/^[0-9\.\-\s~]{33}$/", $n)) {
					$r = array();
					$r['file'] = $n;
					$r['num'] = count(get_file($f));
					$r['time'] = timetodate(filemtime($f), 5);
					$baks[] = $r;
				}
			}
		}
	}
	include tpl('patch');
}
?>