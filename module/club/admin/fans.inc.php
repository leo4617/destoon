<?php
defined('DT_ADMIN') or exit('Access Denied');
$gid = isset($gid) ? intval($gid) : 0;
require MD_ROOT.'/fans.class.php';
$do = new fans();
$menus = array (
    array('��˿�б�', '?moduleid='.$moduleid.'&file='.$file.'&gid='.$gid),
    array('�����', '?moduleid='.$moduleid.'&file='.$file.'&gid='.$gid.'&action=check'),
    array('δͨ��', '?moduleid='.$moduleid.'&file='.$file.'&gid='.$gid.'&action=reject'),
    array('����վ', '?moduleid='.$moduleid.'&file='.$file.'&gid='.$gid.'&action=recycle'),
);
if(in_array($action, array('', 'check', 'reject', 'recycle'))) {
	$sfields = array('��������', '��Ա��', '�ǳ�');
	$dfields = array('content', 'username', 'passport');
	$sorder  = array('�������ʽ', '���ʱ�併��', '���ʱ������');
	$dorder  = array('itemid desc', 'addtime DESC', 'addtime ASC');

	isset($fields) && isset($dfields[$fields]) or $fields = 0;
	isset($order) && isset($dorder[$order]) or $order = 0;

	$fields_select = dselect($sfields, 'fields', '', $fields);
	$order_select  = dselect($sorder, 'order', '', $order);

	$condition = '';
	if($keyword) $condition .= " AND $dfields[$fields] LIKE '%$keyword%'";
	if($gid) $condition .= " AND gid='$gid'";
}
switch($action) {
	case 'delete':
		$itemid or msg('��ѡ���˿');
		isset($recycle) ? $do->recycle($itemid) : $do->delete($itemid);
		dmsg('ɾ���ɹ�', $forward);
	break;
	case 'cancel':
		$itemid or msg('��ѡ���˿');
		$do->check($itemid, 2);
		dmsg('ȡ���ɹ�', $forward);
	break;
	case 'restore':
		$itemid or msg('��ѡ���˿');
		$do->restore($itemid);
		dmsg('��ԭ�ɹ�', $forward);
	break;
	case 'clear':
		$do->clear();
		dmsg('��ճɹ�', $forward);
	break;
	case 'recycle':
		$lists = $do->get_list('status=0'.$condition, $dorder[$order]);
		$menuid = 3;
		include tpl('fans', $module);
	break;
	case 'reject':
		if($itemid && !$psize) {
			$do->reject($itemid);
			dmsg('�ܾ��ɹ�', $forward);
		} else {
			$lists = $do->get_list('status=1'.$condition, $dorder[$order]);
			$menuid = 2;
			include tpl('fans', $module);
		}
	break;
	case 'check':
		if($itemid) {
			$do->check($itemid);
			dmsg('��˳ɹ�', $forward);
		} else {
			$lists = $do->get_list('status=2'.$condition, $dorder[$order]);
			$menuid = 1;
			include tpl('fans', $module);
		}
	break;
	default:
		$lists = $do->get_list('status=3'.$condition, $dorder[$order]);
		$menuid = 0;
		include tpl('fans', $module);
	break;
}
?>