<?php
defined('IN_DESTOON') or exit('Access Denied');
require MD_ROOT.'/expert.class.php';
$do = new expert();
$menus = array (
    array('���ר��', '?moduleid='.$moduleid.'&file='.$file.'&action=add'),
    array('ר���б�', '?moduleid='.$moduleid.'&file='.$file),
);
if(in_array($action, array('', 'check'))) {
	$level = isset($level) ? intval($level) : 0;
	$sfields = array('������', '����', '��Ա��', '�ó�����', 'ר�ҽ���');
	$dfields = array('title', 'title', 'username', 'major', 'content');
	$sorder  = array('�������ʽ', '���ʱ�併��', '���ʱ������', '�޸�ʱ�併��', '�޸�ʱ������', '�����������', '�����������', '������������', '������������', '�ش��������', '�ش��������', '������������', '������������');
	$dorder  = array('addtime DESC', 'addtime DESC', 'addtime ASC', 'edittime DESC', 'edittime ASC', 'hits DESC', 'hits ASC', 'ask DESC', 'ask ASC', 'answer DESC', 'answer ASC', 'best DESC', 'best ASC');

	isset($fields) && isset($dfields[$fields]) or $fields = 0;
	isset($order) && isset($dorder[$order]) or $order = 0;

	$fields_select = dselect($sfields, 'fields', '', $fields);
	$order_select  = dselect($sorder, 'order', '', $order);
	$level_select = level_select('level', '����', $level);

	$condition = '';
	if($keyword) $condition .= " AND $dfields[$fields] LIKE '%$keyword%'";
	if($level) $condition .= " AND level=$level";
}
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
			$content = '';
			$addtime = timetodate($DT_TIME);
			$menuid = 0;
			include tpl('expert_edit', $module);
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
			include tpl('expert_edit', $module);
		}
	break;
	case 'delete':
		$itemid or msg('��ѡ��ר��');
		isset($recycle) ? $do->recycle($itemid) : $do->delete($itemid);
		dmsg('ɾ���ɹ�', $forward);
	break;
	default:
		$lists = $do->get_list('1 '.$condition, $dorder[$order]);
		include tpl('expert', $module);
	break;
}
?>