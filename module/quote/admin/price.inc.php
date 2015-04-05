<?php
defined('IN_DESTOON') or exit('Access Denied');
$pid = isset($pid) ? intval($pid) : 0;
$menus = array (
	array('��ӱ���', '?file='.$file.'&moduleid='.$moduleid.'&pid='.$pid.'&action=add'),
	array('���۹���', '?file='.$file.'&moduleid='.$moduleid.'&pid='.$pid),
	array('�������', '?file='.$file.'&moduleid='.$moduleid.'&pid='.$pid.'&action=check'),
);
$P = $pid ? $db->get_one("SELECT * FROM {$table_product} WHERE itemid=$pid") : array();
$M = ($P && $P['market']) ? explode('|', '�����г�|'.$P['market']) : array();
require MD_ROOT.'/price.class.php';
$do = new price;
if(in_array($action, array('', 'check'))) {
	$sfields = array('��˾', '��Ա', 'IP', '�绰', 'QQ', '�༭', '��ע');
	$dfields = array('company', 'username', 'ip', 'telephone', 'qq', 'editor', 'note');
	$sorder  = array('�������ʽ', '���ʱ�併��', '���ʱ������', '����ʱ�併��', '����ʱ������', '���۽���', '��������');
	$dorder  = array('addtime DESC', 'addtime DESC', 'addtime ASC', 'edittime DESC', 'edittime ASC', 'price DESC', 'price ASC');
		
	isset($fields) && isset($dfields[$fields]) or $fields = 0;
	isset($order) && isset($dorder[$order]) or $order = 0;
	$itemid or $itemid = '';
	$market = isset($market) ? intval($market) : 0;	
	$minprice = isset($minprice) ? dround($minprice) : '';
	$minprice or $minprice = '';
	$maxprice = isset($maxprice) ? dround($maxprice) : '';
	$maxprice or $maxprice = '';

	$fields_select = dselect($sfields, 'fields', '', $fields);
	$order_select  = dselect($sorder, 'order', '', $order);
	$condition = '';
	if($keyword) $condition .= " AND $dfields[$fields] LIKE '%$keyword%'";
	if($areaid) $condition .= ($ARE['child']) ? " AND areaid IN (".$ARE['arrchildid'].")" : " AND areaid=$areaid";
	if($minprice)  $condition .= " AND price>=$minprice";
	if($maxprice)  $condition .= " AND price<=$maxprice";
	if($market) $condition .= " AND market=$market";
	if($pid) $condition .= " AND pid=$pid";
	if($itemid) $condition .= " AND itemid=$itemid";
	$timetype = strpos($dorder[$order], 'edit') === false ? 'add' : '';
}
switch($action) {
	case 'add':
		$P or msg('δָ����Ʒ');
		if($submit) {
			if($do->pass($post)) {
				$do->add($post);
				dmsg('��ӳɹ�', '?moduleid='.$moduleid.'&file='.$file.'&pid='.$post['pid']);
			} else {
				msg($do->errmsg);
			}
		} else {
			foreach($do->fields as $v) {
				isset($$v) or $$v = '';
			}
			$username = $_username;
			$status = 3;
			$addtime = timetodate($DT_TIME);
			$menuid = 0;
			include tpl('price_edit', $module);
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
			$menuid = 1;
			include tpl('price_edit', $module);
		}
	break;
	case 'delete':
		$itemid or msg('��ѡ����Ϣ');
		$do->delete($itemid);
		dmsg('ɾ���ɹ�', $forward);
	break;
	case 'check':
		if($itemid && !$psize) {
			$do->check($itemid);
			dmsg('��˳ɹ�', $forward);
		} else {
			$lists = $do->get_list('status=2'.$condition, $dorder[$order]);
			$menuid = 2;
			include tpl('price', $module);
		}
	break;
	default:
		$item = 0;
		$lists = $do->get_list('status=3'.$condition, $dorder[$order]);
		if($P && $P['item'] != $item) $db->query("UPDATE {$table_product} SET item=$item WHERE itemid=$pid");
		$menuid = 1;
		include tpl('price', $module);
	break;
}
?>