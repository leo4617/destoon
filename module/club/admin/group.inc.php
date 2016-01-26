<?php
defined('DT_ADMIN') or exit('Access Denied');
$menus = array (
    array('�����Ȧ', '?moduleid='.$moduleid.'&file='.$file.'&action=add'),
    array('��Ȧ�б�', '?moduleid='.$moduleid.'&file='.$file),
    array('�����', '?moduleid='.$moduleid.'&file='.$file.'&action=check'),
    array('δͨ��', '?moduleid='.$moduleid.'&file='.$file.'&action=reject'),
    array('����վ', '?moduleid='.$moduleid.'&file='.$file.'&action=recycle'),
);
$MOD['level'] = '';
if(in_array($action, array('', 'check', 'reject', 'recycle'))) {
	$level = isset($level) ? intval($level) : 0;
	$sfields = array('������', '��Ȧ����', '��Ȧ����', '��������', '��ʼ��', '����', '�༭', '��̬Ŀ¼');
	$dfields = array('title', 'title', 'content', 'reason', 'username', 'manager', 'editor', 'filepath');
	$sorder  = array('�������ʽ', '���ʱ�併��', '���ʱ������', '�޸�ʱ�併��', '�޸�ʱ������', '������������', '������������', '��˿��������', '��˿��������');
	$dorder  = array('addtime DESC', 'addtime DESC', 'addtime ASC', 'edittime DESC', 'edittime ASC', 'post DESC', 'post ASC', 'fans DESC', 'fans ASC');

	isset($fields) && isset($dfields[$fields]) or $fields = 0;
	isset($order) && isset($dorder[$order]) or $order = 0;

	$fields_select = dselect($sfields, 'fields', '', $fields);
	$order_select  = dselect($sorder, 'order', '', $order);
	$level_select = level_select('level', '����', $level, 'all');

	$condition = '';
	if($_childs) $condition .= " AND catid IN (".$_childs.")";//CATE
	if($keyword) $condition .= " AND $dfields[$fields] LIKE '%$keyword%'";
	if($catid) $condition .= ($CAT['child']) ? " AND catid IN (".$CAT['arrchildid'].")" : " AND catid=$catid";
	if($level) $condition .= $level > 9 ? " AND level>0" : " AND level=$level";
}
require MD_ROOT.'/group.class.php';
$do = new group();
switch($action) {
	case 'add':
		if($submit) {
			if($do->pass($post)) {
				$do->add($post);
				dmsg('��ӳɹ�', '?moduleid='.$moduleid.'&file='.$file);
			} else {
				msg($do->errmsg);
			}
		} else {
			foreach($do->fields as $v) {
				isset($$v) or $$v = '';
			}
			$status = 3;
			$content = '';
			$addtime = timetodate($DT_TIME);
			$menuid = 0;
			include tpl('group_edit', $module);
		}
	break;
	case 'edit':
		$itemid or msg();
		$do->itemid = $itemid;
		$item = $do->get_one();
		if($submit) {
			if($MOD['list_html']) {
				if(preg_match("/^[0-9a-z_\-\/]+$/i", $post['filepath'])) {
					$t = $db->get_one("SELECT itemid FROM {$table}_group WHERE filepath='$post[filepath]' AND itemid<>$itemid");
					if($t) msg('��̬Ŀ¼���ظ�');
				} else {
					msg('��̬Ŀ¼�������');
				}
			}
			if($do->pass($post)) {
				$do->edit($post);
				if($post['catid'] != $item['catid']) $db->query("UPDATE {$table} SET catid=$post[catid] WHERE gid=$itemid");
				dmsg('�޸ĳɹ�', $forward);
			} else {
				msg($do->errmsg);
			}
		} else {
			extract($item);
			$addtime = timetodate($addtime);
			$menuid = 1;
			include tpl('group_edit', $module);
		}
	break;
	case 'update':
		is_array($itemid) or msg('��ѡ����Ȧ');
		foreach($itemid as $v) {
			$do->update($v);
		}
		dmsg('���³ɹ�', $forward);
	break;
	case 'tohtml':
		is_array($itemid) or msg('��ѡ����Ȧ');
		$html_itemids = $itemid;
		foreach($html_itemids as $itemid) {
			tohtml('group', $module);
		}
		dmsg('���ɳɹ�', $forward);
	break;
	case 'delete':
		$itemid or msg('��ѡ����Ȧ');
		isset($recycle) ? $do->recycle($itemid) : $do->delete($itemid);
		dmsg('ɾ���ɹ�', $forward);
	break;
	case 'restore':
		$itemid or msg('��ѡ����Ȧ');
		$do->restore($itemid);
		dmsg('��ԭ�ɹ�', $forward);
	break;
	case 'clear':
		$do->clear();
		dmsg('��ճɹ�', $forward);
	break;
	case 'level':
		$itemid or msg('��ѡ����Ȧ');
		$level = intval($level);
		$do->level($itemid, $level);
		dmsg('�������óɹ�', $forward);
	break;
	case 'recycle':
		$lists = $do->get_list('status=0'.$condition, $dorder[$order]);
		$menuid = 4;
		include tpl('group', $module);
	break;
	case 'reject':
		if($itemid && !$psize) {
			$do->reject($itemid);
			dmsg('�ܾ��ɹ�', $forward);
		} else {
			$lists = $do->get_list('status=1'.$condition, $dorder[$order]);
			$menuid = 3;
			include tpl('group', $module);
		}
	break;
	case 'check':
		if($itemid && !$psize) {
			$do->check($itemid);
			dmsg('��˳ɹ�', $forward);
		} else {
			$lists = $do->get_list('status=2'.$condition, $dorder[$order]);
			$menuid = 2;
			include tpl('group', $module);
		}
	break;
	default:
		$lists = $do->get_list('status=3'.$condition, $dorder[$order]);
		$menuid = 1;
		include tpl('group', $module);
	break;
}
?>