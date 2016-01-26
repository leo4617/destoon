<?php
defined('DT_ADMIN') or exit('Access Denied');
$menus = array (
    array('������ҳ', '?moduleid='.$moduleid.'&file='.$file),
    array('����ͳ��', 'javascript:Dwidget(\'?file=count&action=stats&&mid='.$moduleid.'\', \'['.$MOD['name'].']����ͳ��\');'),
    array('ģ����ҳ', $MOD['linkurl'], ' target="_blank"'),
);
$all = (isset($all) && $all) ? 1 : 0;
$one = (isset($one) && $one) ? 1 : 0;
$this_forward = '?moduleid='.$moduleid.'&file='.$file;
switch($action) {
	case 'all':
		msg('', '?moduleid='.$moduleid.'&file='.$file.'&action=show&update=1&all=1&one='.$one);
	break;
	case 'index':
		tohtml('index', $module);
		$all ? msg($MOD['name'].'��ҳ���ɳɹ�', '?moduleid='.$moduleid.'&file='.$file.'&action=list&all=1&one='.$one) : dmsg($MOD['name'].'��ҳ���ɳɹ�', $this_forward);
	break;
	case 'list':
		if(!$MOD['list_html']) {
			$all ? msg($MOD['name'].'�б����ɳɹ�', '?moduleid='.$moduleid.'&file='.$file.'&action=group&all='.$all.'&one='.$one) : msg($MOD['name'].'�б����ɳɹ�', $this_forward);
		}
		if(isset($catids)) {
			$CAT = $db->get_one("SELECT * FROM {$DT_PRE}category WHERE moduleid=$moduleid AND catid>$catids ORDER BY catid");
			if($CAT) {
				$bcatid = $catid = $CAT['catid'];
				$total = max(ceil($CAT['item']/$MOD['pagesize']), 1);
				$num = 50;
				$bfid = $fid;
				isset($fpage) or $fpage = 1;
				if($fpage <= $total) {
					$fid = $fpage;
					tohtml('list', $module);
					$fid = $bfid;
					msg('['.$CAT['catname'].'] ��'.$fpage.'ҳ����'.($fpage+$num-1).'ҳ���ɳɹ�'.progress(0, $fid, $tid), '?moduleid='.$moduleid.'&file='.$file.'&action='.$action.'&catids='.$catids.'&fid='.$fid.'&tid='.$tid.'&all='.$all.'&one='.$one.'&fpage='.($fpage+$num));
				}
				$fid++;
				msg('['.$CAT['catname'].'] ���ɳɹ�'.progress(0, $fid, $tid), '?moduleid='.$moduleid.'&file='.$file.'&action='.$action.'&catids='.$catid.'&fid='.$fid.'&tid='.$tid.'&all='.$all.'&one='.$one);
			} else {
				$all ? msg('�б����ɳɹ�', '?moduleid='.$moduleid.'&file='.$file.'&action=group&all='.$all.'&one='.$one) : msg('�б����ɳɹ�', $this_forward);
			}		
		} else {
			$r = $db->get_one("SELECT COUNT(*) AS num FROM {$DT_PRE}category WHERE moduleid=$moduleid");
			$tid = $r['num'];
			msg('', '?moduleid='.$moduleid.'&file='.$file.'&action='.$action.'&catids=0&fid=1&&tid='.$tid.'&all='.$all.'&one='.$one);
		}
	break;
	case 'group':
		if(!$MOD['list_html']) {
			$all ? msg('��Ȧ���ɳɹ�', '?moduleid='.$moduleid.'&file='.$file.'&action=show&all='.$all.'&one='.$one) : msg('��Ȧ���ɳɹ�', $this_forward);
		}
		if(isset($catids)) {
			$GRP = $db->get_one("SELECT * FROM {$table}_group WHERE status=3 AND itemid>$catids ORDER BY itemid");
			if($GRP) {
				$bitemid = $itemid = $GRP['itemid'];
				$total = max(ceil($GRP['post']/$MOD['pagesize']), 1);
				$num = 50;
				$bfid = $fid;
				isset($fpage) or $fpage = 1;
				if($fpage <= $total) {
					$fid = $fpage;
					tohtml('group', $module);
					$fid = $bfid;
					msg('��Ȧ ['.$GRP['title'].'] ��'.$fpage.'ҳ����'.($fpage+$num-1).'ҳ���ɳɹ�'.progress(0, $fid, $tid), '?moduleid='.$moduleid.'&file='.$file.'&action='.$action.'&catids='.$catids.'&fid='.$fid.'&tid='.$tid.'&all='.$all.'&one='.$one.'&fpage='.($fpage+$num));
				}
				$fid++;
				msg('��Ȧ ['.$GRP['title'].'] ���ɳɹ�'.progress(0, $fid, $tid), '?moduleid='.$moduleid.'&file='.$file.'&action='.$action.'&catids='.$itemid.'&fid='.$fid.'&tid='.$tid.'&all='.$all.'&one='.$one);
			} else {
				$all ? msg('��Ȧ���ɳɹ�', '?moduleid='.$moduleid.'&file='.$file.'&action=show&all='.$all.'&one='.$one) : msg('��Ȧ���ɳɹ�', $this_forward);
			}		
		} else {
			$r = $db->get_one("SELECT COUNT(*) AS num FROM {$table}_group WHERE status=3");
			$tid = $r['num'];
			msg('', '?moduleid='.$moduleid.'&file='.$file.'&action='.$action.'&catids=0&fid=1&&tid='.$tid.'&all='.$all.'&one='.$one);
		}
	break;
	case 'show':
		$update = (isset($update) && $update) ? 1 : 0;
		if(!$update && !$MOD['show_html']) {
			if($one) dheader( '?file=html&action=back&mid='.$moduleid);
			$all ? msg('�������ɳɹ�', $this_forward) : dmsg('�������ɳɹ�', $this_forward);
		}
		$catid = isset($catid) ? intval($catid) : '';
		$sql = $catid ? " AND catid=$catid" : '';
		if(!isset($fid)) {
			$r = $db->get_one("SELECT min(itemid) AS fid FROM {$table} WHERE status>2 {$sql}");
			$fid = $r['fid'] ? $r['fid'] : 0;
		}
		isset($sid) or $sid = $fid;
		if(!isset($tid)) {
			$r = $db->get_one("SELECT max(itemid) AS tid FROM {$table} WHERE status>2 {$sql}");
			$tid = $r['tid'] ? $r['tid'] : 0;
		}
		if($update) {
			require MD_ROOT.'/club.class.php';
			$do = new club($moduleid);
		}
		isset($num) or $num = 100;
		if($fid <= $tid) {
			$result = $db->query("SELECT itemid FROM {$table} WHERE status>2 AND itemid>=$fid {$sql} ORDER BY itemid LIMIT 0,$num ");
			if($db->affected_rows($result)) {
				while($r = $db->fetch_array($result)) {
					$itemid = $r['itemid'];
					if($update) {
						$do->update($itemid);
					} else {
						$bfid= $fid;
						$fid = 0;
						tohtml('show', $module);
						$fid = $bfid;
					}
				}
				$itemid += 1;
			} else {
				$itemid = $fid + $num;
			}
		} else {
			if($update) {
				$all ? msg('', '?moduleid='.$moduleid.'&file='.$file.'&action=groups&all=1&one='.$one) : dmsg('���³ɹ�', $this_forward);
			} else {
				if($one) dheader( '?file=html&action=back&mid='.$moduleid);
				$all ? msg('�������ɳɹ�', $this_forward) : dmsg('�������ɳɹ�', $this_forward);
			}
		}
		msg('ID��'.$fid.'��'.($itemid-1).'����'.($update ? '����' : '����').'�ɹ�'.progress($sid, $fid, $tid), "?moduleid=$moduleid&file=$file&action=$action&sid=$sid&fid=$itemid&tid=$tid&num=$num&update=$update&all=$all&one=$one");
	break;
	case 'groups':
		if(!isset($fid)) {
			$r = $db->get_one("SELECT min(itemid) AS fid FROM {$table}_group WHERE status>2");
			$fid = $r['fid'] ? $r['fid'] : 0;
		}
		isset($sid) or $sid = $fid;
		if(!isset($tid)) {
			$r = $db->get_one("SELECT max(itemid) AS tid FROM {$table}_group WHERE status>2");
			$tid = $r['tid'] ? $r['tid'] : 0;
		}
		require MD_ROOT.'/group.class.php';
		$do = new group();
		isset($num) or $num = 100;
		if($fid <= $tid) {
			$result = $db->query("SELECT itemid FROM {$table}_group WHERE status=3 AND itemid>=$fid ORDER BY itemid LIMIT 0,$num ");
			if($db->affected_rows($result)) {
				while($r = $db->fetch_array($result)) {
					$itemid = $r['itemid'];
					$do->update($itemid);
				}
				$itemid += 1;
			} else {
				$itemid = $fid + $num;
			}
		} else {
			$all ? msg('', '?moduleid='.$moduleid.'&file='.$file.'&action=index&all=1&one='.$one) : dmsg('���³ɹ�', $this_forward);
		}
		msg('ID��'.$fid.'��'.($itemid-1).'��Ȧ���³ɹ�'.progress($sid, $fid, $tid), "?moduleid=$moduleid&file=$file&action=$action&sid=$sid&fid=$itemid&tid=$tid&num=$num&all=$all&one=$one");
	break;
	case 'cate':
		$catid or msg('��ѡ�����');
		isset($num) or $num = 50;
		isset($fid) or $fid = 1;
		$total = max(ceil($CAT['item']/$MOD['pagesize']), 1);
		if($fpage && $tpage) {
			$fid = $fpage;
			$num = $tpage - $fpage + 1;
			tohtml('list', $module);
			dmsg('���ɳɹ�', $this_forward);
		}
		if($fid <= $total) {
			tohtml('list', $module);
			msg('��'.$fid.'ҳ����'.($fid+$num-1).'ҳ���ɳɹ�', '?moduleid='.$moduleid.'&file='.$file.'&action='.$action.'&catid='.$catid.'&fid='.($fid+$num).'&num='.$num.'&fpage='.$fpage.'&tpage='.$tpage);
		} else {
			dmsg('���ɳɹ�', $this_forward);
		}
	break;
	case 'item':
		$catid or msg('��ѡ�����');
		msg('', '?moduleid='.$moduleid.'&file='.$file.'&action=show&catid='.$catid.'&num='.$num);
	break;
	default:
		$r = $db->get_one("SELECT min(itemid) AS fid,max(itemid) AS tid FROM {$table} WHERE status=3");
		$fid = $r['fid'] ? $r['fid'] : 0;
		$tid = $r['tid'] ? $r['tid'] : 0;
		include tpl('html', $module);
	break;
}
?>