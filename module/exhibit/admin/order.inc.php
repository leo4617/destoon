<?php
defined('IN_DESTOON') or exit('Access Denied');
$menus = array (
    array($MOD['name'].'����', '?moduleid='.$moduleid),
    array('��������', '?moduleid='.$moduleid.'&file='.$file),
);
$id = isset($id) && $id ? intval($id) : '';
switch($action) {
	case 'show':
		$itemid or msg('δָ����¼');
		$item = $db->get_one("SELECT * FROM {$table_order} WHERE itemid=$itemid");
		$item or msg('��¼������');
		$item['linkurl'] = $EXT['linkurl'].'redirect.php?mid='.$moduleid.'&itemid='.$item['id'];
		$item['addtime'] = timetodate($item['addtime'], 6);
		include tpl('order_show', $module);
	break;
	case 'delete':
		$itemid or msg('δѡ���¼');
		$itemids = is_array($itemid) ? implode(',', $itemid) : $itemid;
		$db->query("DELETE FROM {$table_order} WHERE itemid IN ($itemids)");
		dmsg('ɾ���ɹ�', $forward);
	break;
	default:
		$sfields = array('������', 'չ������', '������', '��Ա', '��˾', '����', '��ַ', '�ʱ�', '�ֻ�', '�ʼ�', 'QQ', '��ע');
		$dfields = array('title', 'title', 'user', 'username', 'company', 'truename', 'address', 'postcode', 'mobile', 'email', 'qq', 'content');
		$sorder  = array('����ʽ', '����ʱ�併��', '����ʱ������', '������������', '������������');
		$dorder  = array('itemid DESC', 'addtime DESC', 'addtime ASC', 'amount DESC', 'amount ASC');
		isset($fields) && isset($dfields[$fields]) or $fields = 0;
		$itemid or $itemid = '';
		isset($amounts) or $amounts = '';
		isset($fromtime) or $fromtime = '';
		isset($totime) or $totime = '';
		isset($minamount) or $minamount = '';
		isset($maxamount) or $maxamount = '';
		isset($order) && isset($dorder[$order]) or $order = 0;
		$fields_select = dselect($sfields, 'fields', '', $fields);
		$order_select = dselect($sorder, 'order', '', $order);
		$condition = '1';
		if($keyword) $condition .= " AND $dfields[$fields] LIKE '%$keyword%'";
		if($fromtime) $condition .= " AND addtime>".(strtotime($fromtime.' 00:00:00'));
		if($totime) $condition .= " AND addtime<".(strtotime($totime.' 23:59:59'));
		if($itemid) $condition .= " AND itemid=$itemid";
		if($id) $condition .= " AND id=$id";
		if($minamount != '') $condition .= " AND amount>=$minamount";
		if($maxamount != '') $condition .= " AND amount<=$maxamount";
		if($page > 1 && $sum) {
			$items = $sum;
		} else {
			$r = $db->get_one("SELECT COUNT(*) AS num FROM {$table_order} WHERE $condition");
			$items = $r['num'];
		}
		$pages = pages($items, $page, $pagesize);	
		$lists = array();
		$result = $db->query("SELECT * FROM {$table_order} WHERE $condition ORDER BY $dorder[$order] LIMIT $offset,$pagesize");
		while($r = $db->fetch_array($result)) {
			$r['linkurl'] = $EXT['linkurl'].'redirect.php?mid='.$moduleid.'&itemid='.$r['id'];
			$r['addtime'] = timetodate($r['addtime'], 5);
			$lists[] = $r;
		}
		include tpl('order', $module);
	break;
}
?>