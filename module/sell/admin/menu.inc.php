<?php
defined('DT_ADMIN') or exit('Access Denied');
$menu = array(
	array("���".$name, "?moduleid=$moduleid&action=add"),
	array($name."�б�", "?moduleid=$moduleid"),
	array("�����б�", "?moduleid=$moduleid&file=order"),
	array("���".$name, "?moduleid=$moduleid&action=check"),
	array("��ҵ����", "?file=category&mid=$moduleid"),
	array("��������", "?moduleid=$moduleid&file=html"),
	array("ģ������", "?moduleid=$moduleid&file=setting"),
);
?>