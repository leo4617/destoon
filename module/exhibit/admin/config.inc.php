<?php
defined('DT_ADMIN') or exit('Access Denied');
$MCFG['module'] = 'exhibit';
$MCFG['name'] = 'չ��';
$MCFG['author'] = 'DESTOON.COM';
$MCFG['homepage'] = 'www.destoon.com';
$MCFG['copy'] = false;
$MCFG['uninstall'] = true;
$MCFG['moduleid'] = 8;

$RT = array();
$RT['file']['index'] = 'չ�����';
$RT['file']['order'] = '��������';
$RT['file']['html'] = '������ҳ';

$RT['action']['index']['add'] = '���չ��';
$RT['action']['index']['edit'] = '�޸�չ��';
$RT['action']['index']['delete'] = 'ɾ��չ��';
$RT['action']['index']['check'] = '���չ��';
$RT['action']['index']['expire'] = '����չ��';
$RT['action']['index']['reject'] = 'δͨ��';
$RT['action']['index']['recycle'] = '����վ';
$RT['action']['index']['move'] = '�ƶ�չ��';
$RT['action']['index']['level'] = '��Ϣ����';

$CT = true;
?>