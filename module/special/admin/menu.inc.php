<?php
defined('DT_ADMIN') or exit('Access Denied');
$menu = array(
	array("���".$name, "?moduleid=$moduleid&action=add"),
	array($name."�б�", "?moduleid=$moduleid"),
	array("�������", "?file=category&mid=$moduleid"),
	array("��������", "?moduleid=$moduleid&file=html"),
	array("ģ������", "?moduleid=$moduleid&file=setting"),
);
?>