<?php
defined('DT_ADMIN') or exit('Access Denied');
$MCFG['module'] = 'buy';
$MCFG['name'] = '��';
$MCFG['author'] = 'DESTOON.COM';
$MCFG['homepage'] = 'www.destoon.com';
$MCFG['copy'] = true;
$MCFG['uninstall'] = true;
$MCFG['moduleid'] = 0;

$RT = array();
$RT['file']['index'] = '�󹺹���';
$RT['file']['html'] = '������ҳ';

$RT['action']['index']['add'] = '�����';
$RT['action']['index']['edit'] = '�޸���';
$RT['action']['index']['delete'] = 'ɾ����';
$RT['action']['index']['check'] = '�����';
$RT['action']['index']['expire'] = '������';
$RT['action']['index']['reject'] = 'δͨ��';
$RT['action']['index']['recycle'] = '����վ';
$RT['action']['index']['move'] = '�ƶ���';
$RT['action']['index']['level'] = '��Ϣ����';

$CT = 1;
?>