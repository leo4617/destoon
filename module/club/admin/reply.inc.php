<?php
defined('DT_ADMIN') or exit('Access Denied');
$tid = isset($tid) ? intval($tid) : 0;
$gid = isset($gid) ? intval($gid) : 0;
require MD_ROOT.'/reply.class.php';
$do = new reply();
$menus = array (
    array('�ظ��б�', '?moduleid='.$moduleid.'&file='.$file.'&tid='.$tid),
    array('�����', '?moduleid='.$moduleid.'&file='.$file.'&tid='.$tid.'&action=check'),
    array('δͨ��', '?moduleid='.$moduleid.'&file='.$file.'&tid='.$tid.'&action=reject'),
    array('����վ', '?moduleid='.$moduleid.'&file='.$file.'&tid='.$tid.'&action=recycle'),
);
if(in_array($action, array('', 'check', 'reject', 'recycle'))) {
	$sfields = array('����', '��Ա��', '�ǳ�', '�༭', 'IP');
	$dfields = array('content', 'username', 'passport', 'editor', 'ip');
	$sorder  = array('�������ʽ', '���ʱ�併��', '���ʱ������');
	$dorder  = array('itemid desc', 'addtime DESC', 'addtime ASC');

	isset($fields) && isset($dfields[$fields]) or $fields = 0;
	isset($order) && isset($dorder[$order]) or $order = 0;
	isset($ip) or $ip = '';
	$fromdate = isset($fromdate) && is_date($fromdate) ? $fromdate : '';
	$fromtime = $fromdate ? strtotime($fromdate.' 0:0:0') : 0;
	$todate = isset($todate) && is_date($todate) ? $todate : '';
	$totime = $todate ? strtotime($todate.' 23:59:59') : 0;

	$fields_select = dselect($sfields, 'fields', '', $fields);
	$order_select  = dselect($sorder, 'order', '', $order);

	$condition = '';
	if($keyword) $condition .= in_array($dfields[$fields], array('gid', 'itemid', 'ip')) ? " AND $dfields[$fields]='$kw'" : " AND $dfields[$fields] LIKE '%$keyword%'";
	if($tid) $condition .= " AND tid='$tid'";
	if($gid) $condition .= " AND gid='$gid'";
	if($ip) $condition .= " AND ip='$ip'";
	if($fromtime) $condition .= " AND addtime>=$fromtime";
	if($totime) $condition .= " AND addtime<=$totime";
}
switch($action) {
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
			include tpl('reply_edit', $module);
		}
	break;
	case 'delete':
		$itemid or msg('��ѡ��ظ�');		
		isset($recycle) ? $do->recycle($itemid) : $do->delete($itemid);
		dmsg('ɾ���ɹ�', $forward);
	break;
	case 'recycle':
		$lists = $do->get_list('status=0'.$condition, $dorder[$order]);
		$menuid = 3;
		include tpl('reply', $module);
	break;
	case 'reject':
		if($itemid && !$psize) {
			$do->reject($itemid);
			dmsg('�ܾ��ɹ�', $forward);
		} else {
			$lists = $do->get_list('status=1'.$condition, $dorder[$order]);
			$menuid = 2;
			include tpl('reply', $module);
		}
	break;
	case 'check':
		if($itemid) {
			$do->check($itemid, 3);
			dmsg('��˳ɹ�', $forward);
		} else {
			$lists = $do->get_list('status=2'.$condition, $dorder[$order]);
			$menuid = 1;
			include tpl('reply', $module);
		}
	break;
	case 'cancel':
		$itemid or msg('��ѡ��ظ�');
		$do->check($itemid, 2);
		dmsg('ȡ���ɹ�', $forward);
	break;
	default:
		$lists = $do->get_list('status=3'.$condition, $dorder[$order]);
		$menuid = 0;
		include tpl('reply', $module);
	break;
}
?>