<?php
defined('IN_DESTOON') or exit('Access Denied');
$MCFG['module'] = 'info';
$MCFG['name'] = '��Ϣ';
$MCFG['author'] = 'DESTOON.COM';
$MCFG['homepage'] = 'www.destoon.com';
$MCFG['copy'] = true;
$MCFG['uninstall'] = true;

$RT = array();
$RT['file']['index'] = '��Ϣ����';
$RT['file']['html'] = '������ҳ';

$RT['action']['index']['add'] = '�����Ϣ';
$RT['action']['index']['edit'] = '�޸���Ϣ';
$RT['action']['index']['delete'] = 'ɾ����Ϣ';
$RT['action']['index']['check'] = '�����Ϣ';
$RT['action']['index']['expire'] = '������Ϣ';
$RT['action']['index']['reject'] = 'δͨ����Ϣ';
$RT['action']['index']['recycle'] = '����վ';
$RT['action']['index']['move'] = '�ƶ���Ϣ';
$RT['action']['index']['level'] = '��Ϣ����';

$CT = true;
?>