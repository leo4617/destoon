<?php
defined('IN_DESTOON') or exit('Access Denied');
$MCFG['module'] = 'video';
$MCFG['name'] = '��Ƶ';
$MCFG['author'] = 'DESTOON.COM';
$MCFG['homepage'] = 'www.destoon.com';
$MCFG['copy'] = true;
$MCFG['uninstall'] = true;
$MCFG['moduleid'] = 0;

$RT = array();
$RT['file']['index'] = '��Ƶ����';
$RT['file']['html'] = '������ҳ';

$RT['action']['index']['add'] = '�����Ƶ';
$RT['action']['index']['edit'] = '�޸���Ƶ';
$RT['action']['index']['delete'] = 'ɾ����Ƶ';
$RT['action']['index']['check'] = '�����Ƶ';
$RT['action']['index']['expire'] = '������Ƶ';
$RT['action']['index']['reject'] = 'δͨ����Ƶ';
$RT['action']['index']['recycle'] = '����վ';
$RT['action']['index']['move'] = '�ƶ���Ƶ';
$RT['action']['index']['level'] = '��Ƶ����';

$CT = true;
?>