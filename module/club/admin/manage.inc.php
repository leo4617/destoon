<?php
defined('DT_ADMIN') or exit('Access Denied');
$gid = isset($gid) ? intval($gid) : 0;
require MD_ROOT.'/manage.class.php';
$do = new manage();
$menus = array (
    array('��¼�б�', '?moduleid='.$moduleid.'&file='.$file.'&gid='.$gid),
    array('��¼����', '?moduleid='.$moduleid.'&file='.$file.'&action=clear', 'onclick="if(!confirm(\'Ϊ��ϵͳ��ȫ,ϵͳ��ɾ��30��֮ǰ�ļ�¼\n�˲������ɳ��������������\')) return false"'),
);
switch($action) {
	case 'clear':
		$time = $today_endtime - 30*86400;
		$db->query("DELETE FROM {$table}_manage WHERE addtime<$time");
		dmsg('����ɹ�', $forward);
	break;
	default:
		$sfields = array('����/�ظ�', '����ԭ��', '��������', '������');
		$dfields = array('title', 'reason', 'content', 'username');

		isset($fields) && isset($dfields[$fields]) or $fields = 0;
		$typeid = isset($typeid) ? intval($typeid) : 0;
		$tid = isset($tid) ? intval($tid) : 0;
		$rid = isset($rid) ? intval($rid) : 0;
		$message = isset($message) ? intval($message) : -1;

		$fields_select = dselect($sfields, 'fields', '', $fields);

		$condition = '';
		if($keyword) $condition .= " AND $dfields[$fields] LIKE '%$keyword%'";
		if($typeid) $condition .= " AND typeid='$typeid'";
		if($gid) $condition .= " AND gid='$gid'";
		if($tid) $condition .= " AND tid='$tid'";
		if($rid) $condition .= " AND rid='$rid'";
		if($message > -1) $condition .= " AND message='$message'";
		$lists = $do->get_list('1'.$condition);
		$menuid = 0;
		include tpl('manage', $module);
	break;
}
?>