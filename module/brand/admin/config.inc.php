<?php
defined('DT_ADMIN') or exit('Access Denied');
$MCFG['module'] = 'brand';
$MCFG['name'] = 'Ʒ��';
$MCFG['author'] = 'DESTOON.COM';
$MCFG['homepage'] = 'www.destoon.com';
$MCFG['copy'] = true;
$MCFG['uninstall'] = true;
$MCFG['moduleid'] = 0;

$RT = array();
$RT['file']['index'] = 'Ʒ�ƹ���';
$RT['file']['html'] = '������ҳ';

$RT['action']['index']['add'] = '���Ʒ��';
$RT['action']['index']['edit'] = '�޸�Ʒ��';
$RT['action']['index']['delete'] = 'ɾ��Ʒ��';
$RT['action']['index']['check'] = '���Ʒ��';
$RT['action']['index']['expire'] = '����Ʒ��';
$RT['action']['index']['reject'] = 'δͨ��';
$RT['action']['index']['recycle'] = '����վ';
$RT['action']['index']['move'] = '�ƶ�Ʒ��';
$RT['action']['index']['level'] = 'Ʒ�Ƽ���';

$CT = true;
?>