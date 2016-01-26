<?php
defined('DT_ADMIN') or exit('Access Denied');
$TYPE = get_type('vote', 1);
require MD_ROOT.'/vote.class.php';
$do = new vote();
$menus = array (
    array('���ͶƱ', '?moduleid='.$moduleid.'&file='.$file.'&action=add'),
    array('ͶƱ�б�', '?moduleid='.$moduleid.'&file='.$file),
    array('����ͶƱ', '?moduleid='.$moduleid.'&file='.$file.'&action=html'),
    array('ͶƱ����', 'javascript:Dwidget(\'?file=type&item='.$file.'\', \'ͶƱ����\');'),
    array('ģ����ҳ', $EXT[$file.'_url'], ' target="_blank"'),
    array('ģ������', '?moduleid='.$moduleid.'&file=setting#'.$file),
);
if($_catids || $_areaids) require DT_ROOT.'/admin/admin_check.inc.php';
switch($action) {
	case 'add':
		if($submit) {
			if($do->pass($post)) {
				$do->add($post);
				dmsg('��ӳɹ�', $forward);
			} else {
				msg($do->errmsg);
			}
		} else {
			foreach($do->fields as $v) {
				isset($$v) or $$v = '';
			}
			$vote_min = 1;
			$vote_max = 3;
			$addtime = timetodate($DT_TIME);
			$typeid = 0;
			$menuid = 0;
			include tpl('vote_edit', $module);
		}
	break;
	case 'edit':
		$itemid or msg();
		$do->itemid = $itemid;
		if($submit) {
			if($do->pass($post)) {
				$do->edit($post);
				dmsg('�޸ĳɹ�', $forward);
			} else {
				msg($do->errmsg);
			}
		} else {
			extract($do->get_one());
			$addtime = timetodate($addtime);
			$fromtime = $fromtime ? timetodate($fromtime, 3) : '';
			$totime = $totime ? timetodate($totime, 3) : '';
			$menuid = 1;
			include tpl('vote_edit', $module);
		}
	break;
	case 'html':
		$all = (isset($all) && $all) ? 1 : 0;
		$one = (isset($one) && $one) ? 1 : 0;
		if(!isset($num)) {
			$num = 50;
		}
		if(!isset($fid)) {
			$r = $db->get_one("SELECT min(itemid) AS fid FROM {$DT_PRE}vote");
			$fid = $r['fid'] ? $r['fid'] : 0;
		}
		isset($sid) or $sid = $fid;
		if(!isset($tid)) {
			$r = $db->get_one("SELECT max(itemid) AS tid FROM {$DT_PRE}vote");
			$tid = $r['tid'] ? $r['tid'] : 0;
		}
		if($fid <= $tid) {
			$result = $db->query("SELECT itemid,linkurl FROM {$DT_PRE}vote WHERE itemid>=$fid ORDER BY itemid LIMIT 0,$num");
			if($db->affected_rows($result)) {
				while($r = $db->fetch_array($result)) {
					$itemid = $r['itemid'];
					$linkurl = $do->linkurl($itemid);
					if($linkurl != $r['linkurl']) $db->query("UPDATE {$DT_PRE}vote SET linkurl='$linkurl' WHERE itemid=$itemid");
					tohtml('vote', $module);
				}
				$itemid += 1;
			} else {
				$itemid = $fid + $num;
			}
		} else {
			if($all) dheader('?moduleid=3&file=poll&action=html&all=1&one='.$one);
			dmsg('���³ɹ�', "?moduleid=$moduleid&file=$file");
		}
		msg('ID��'.$fid.'��'.($itemid-1).'[ͶƱ]���³ɹ�'.progress($sid, $fid, $tid), "?moduleid=$moduleid&file=$file&action=$action&sid=$sid&fid=$itemid&tid=$tid&num=$num&all=$all&one=$one");
	break;
	case 'delete':
		$itemid or msg('��ѡ��ͶƱ');
		$do->delete($itemid);
		dmsg('ɾ���ɹ�', $forward);
	break;
	case 'level':
		$itemid or msg('��ѡ��ͶƱ');
		$level = intval($level);
		$do->level($itemid, $level);
		dmsg('�������óɹ�', $forward);
	break;
	case 'record':
		$itemid or msg();
		$menus = array (
			array('ͶƱ��¼', '?moduleid='.$moduleid.'&file='.$file.'&itemid='.$itemid.'&action=record'),
			array('ͳ�Ʊ���', '?moduleid='.$moduleid.'&file='.$file.'&itemid='.$itemid.'&action=stats'),
		);
		$do->itemid = $itemid;
		$item = $do->get_one();
		extract($item);
		$votes = array();
		for($i = 1; $i < 11; $i++) {
			$s = 's'.$i;
			if($$s) $votes[$i] = $$s;
		}
		$sfields = array('������', '��Ա', 'IP');
		$dfields = array('username','username','ip');
		isset($fields) && isset($dfields[$fields]) or $fields = 0;
		$fields_select = dselect($sfields, 'fields', '', $fields);
		$condition = "itemid=$itemid";
		if($keyword) $condition .= " AND $dfields[$fields] LIKE '%$keyword%'";
		$lists = $do->get_list_record($condition);
		include tpl('vote_record', $module);
	break;
	case 'stats':
		$itemid or msg();
		$menus = array (
			array('ͶƱ��¼', '?moduleid='.$moduleid.'&file='.$file.'&itemid='.$itemid.'&action=record'),
			array('ͳ�Ʊ���', '?moduleid='.$moduleid.'&file='.$file.'&itemid='.$itemid.'&action=stats'),
		);
		$do->itemid = $itemid;
		$item = $do->get_one();
		extract($item);
		$chart_data = '';
		for($i = 1; $i < 11; $i++) {
			$s = 's'.$i;
			$v = 'v'.$i;
			if($$s) {
				if($i > 1) $chart_data .= '\n';
				$chart_data .= $$s.';'.$$v;
			}
		}
		include tpl('vote_stats', $module);
	break;
	default:
		$sfields = array('������', '����', '����', '����');
		$dfields = array('title','title','linkto','content');
		$sorder  = array('�������ʽ', '���ʱ�併��', '���ʱ������', 'ͶƱ��������', 'ͶƱ��������', '�����������', '�����������', '��ʼʱ�併��', '��ʼʱ������', '����ʱ�併��', '����ʱ������');
		$dorder  = array('itemid DESC', 'addtime DESC', 'addtime ASC', 'votes DESC', 'votes ASC', 'hits DESC', 'hits ASC', 'fromtime DESC', 'fromtime ASC', 'totime DESC', 'totime ASC');
		isset($fields) && isset($dfields[$fields]) or $fields = 0;
		isset($order) && isset($dorder[$order]) or $order = 0;
		isset($typeid) or $typeid = 0;
		$level = isset($level) ? intval($level) : 0;
		$type_select = type_select('vote', 1, 'typeid', '��ѡ�����', $typeid);
		$fields_select = dselect($sfields, 'fields', '', $fields);
		$order_select  = dselect($sorder, 'order', '', $order);
		$level_select = level_select('level', '����', $level);
		$condition = '1';
		if($_areaids) $condition .= " AND areaid IN (".$_areaids.")";//CITY
		if($keyword) $condition .= " AND $dfields[$fields] LIKE '%$keyword%'";
		if($typeid) $condition .= " AND typeid IN (".type_child($typeid, $TYPE).")";
		if($level) $condition .= " AND level=$level";
		if($areaid) $condition .= ($ARE['child']) ? " AND areaid IN (".$ARE['arrchildid'].")" : " AND areaid=$areaid";
		$lists = $do->get_list($condition, $dorder[$order]);
		include tpl('vote', $module);
	break;
}
?>