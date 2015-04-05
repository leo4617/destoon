<?php
/*
	[Destoon B2B System] Copyright (c) 2008-2013 Destoon.COM
	This is NOT a freeware, use is subject to license.txt
*/
defined('IN_DESTOON') or exit('Access Denied');
$menus = array (
    array('��ӹ���', '?file='.$file.'&action=add'),
    array('�ɱ����', '?file='.$file),
);
switch($action) {
	case 'add':
		if($submit) {
			if(!$domain) msg('������ɱ�����');
			if(strpos($content, '[content]') === false) msg('���������ݹ���');
			$db->query("INSERT INTO {$DT_PRE}fetch (sitename,domain,encode,title,content,editor,edittime) VALUES ('$sitename','$domain','$encode','$title','$content','$_username','$DT_TIME')");
			dmsg('��ӳɹ�', $forward);
		} else {
			$domain = $sitename = $title = '';
			$encode = strtolower(DT_CHARSET);
			$content = '<div class="content">[content]</div>';
			include tpl('fetch_edit');
		}
	break;
	case 'edit':
		$itemid or msg('��ѡ�����');
		if($submit) {
			if(!$domain) msg('������ɱ�����');
			if(strpos($content, '[content]') === false) msg('���������ݹ���');
			$db->query("UPDATE {$DT_PRE}fetch SET sitename='$sitename',domain='$domain',encode='$encode',title='$title',content='$content',editor='$_username',edittime='$DT_TIME' WHERE itemid=$itemid");
			dmsg('�޸ĳɹ�', $forward);
		} else {
			extract($db->get_one("SELECT * FROM {$DT_PRE}fetch WHERE itemid=$itemid"));
			include tpl('fetch_edit');
		}
	break;
	case 'delete':
		$itemid or msg('��ѡ�����');
		$ids = is_array($itemid) ? implode(',', $itemid) : $itemid;
		$db->query("DELETE FROM {$DT_PRE}fetch WHERE itemid IN ($ids)");
		dmsg('ɾ���ɹ�', $forward);
	break;
	default:
		$sfields = array('������', '����', '��վ', '�༭');
		$dfields = array('domain', 'domain', 'sitename', 'username');
		isset($fields) && isset($dfields[$fields]) or $fields = 0;
		$fields_select = dselect($sfields, 'fields', '', $fields);
		$condition = '1';
		if($keyword) $condition .= " AND $dfields[$fields] LIKE '%$keyword%'";
		if($page > 1 && $sum) {
			$items = $sum;
		} else {
			$r = $db->get_one("SELECT COUNT(*) AS num FROM {$DT_PRE}fetch WHERE $condition");
			$items = $r['num'];
		}
		$pages = pages($items, $page, $pagesize);	
		$lists = array();
		$result = $db->query("SELECT * FROM {$DT_PRE}fetch WHERE $condition ORDER BY itemid DESC LIMIT $offset,$pagesize");
		while($r = $db->fetch_array($result)) {
			$r['edittime'] = timetodate($r['edittime'], 5);
			$lists[] = $r;
		}
		include tpl('fetch');
	break;
}
?>