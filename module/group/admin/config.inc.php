<?php
defined('DT_ADMIN') or exit('Access Denied');
$MCFG['module'] = 'group';
$MCFG['name'] = '�Ź�';
$MCFG['author'] = 'DESTOON.COM';
$MCFG['homepage'] = 'www.destoon.com';
$MCFG['copy'] = false;
$MCFG['uninstall'] = true;
$MCFG['moduleid'] = 17;

$RT = array();
$RT['file']['index'] = '�Ź�����';
$RT['file']['order'] = '��������';
$RT['file']['html'] = '������ҳ';

$RT['action']['index']['add'] = '����Ź�';
$RT['action']['index']['edit'] = '�޸��Ź�';
$RT['action']['index']['delete'] = 'ɾ���Ź�';
$RT['action']['index']['check'] = '����Ź�';
$RT['action']['index']['expire'] = '�����Ź�';
$RT['action']['index']['reject'] = 'δͨ��';
$RT['action']['index']['recycle'] = '����վ';
$RT['action']['index']['move'] = '�ƶ��Ź�';
$RT['action']['index']['level'] = '��Ϣ����';

$CT = 1;
?>