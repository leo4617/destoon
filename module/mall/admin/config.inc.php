<?php
defined('IN_DESTOON') or exit('Access Denied');
$MCFG['module'] = 'mall';
$MCFG['name'] = '�̳�';
$MCFG['author'] = 'DESTOON.COM';
$MCFG['homepage'] = 'www.destoon.com';
$MCFG['copy'] = false;
$MCFG['uninstall'] = true;
$MCFG['moduleid'] = 16;

$RT = array();
$RT['file']['index'] = '��Ʒ����';
$RT['file']['order'] = '��������';
$RT['file']['html'] = '������ҳ';

$RT['action']['index']['add'] = '�����Ʒ';
$RT['action']['index']['edit'] = '�޸���Ʒ';
$RT['action']['index']['relate'] = '������Ʒ';
$RT['action']['index']['delete'] = 'ɾ����Ʒ';
$RT['action']['index']['check'] = '�����Ʒ';
$RT['action']['index']['expire'] = '�¼���Ʒ';
$RT['action']['index']['onsale'] = '�ϼ���Ʒ';
$RT['action']['index']['reject'] = 'δͨ����Ʒ';
$RT['action']['index']['recycle'] = '����վ';
$RT['action']['index']['move'] = '�ƶ���Ʒ';
$RT['action']['index']['level'] = '��Ϣ����';

$CT = 1;
?>