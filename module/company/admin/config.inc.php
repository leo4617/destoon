<?php
defined('DT_ADMIN') or exit('Access Denied');
$MCFG['module'] = 'company';
$MCFG['name'] = '��˾';
$MCFG['author'] = 'DESTOON.COM';
$MCFG['homepage'] = 'www.destoon.com';
$MCFG['copy'] = false;
$MCFG['uninstall'] = false;

$RT = array();
$RT['file']['index'] = '��˾�б�';
$RT['file']['vip'] = VIP.'����';
$RT['file']['html'] = '������ҳ';

$RT['action']['vip']['add'] = '���'.VIP;
$RT['action']['vip']['edit'] = '�޸�'.VIP;
$RT['action']['vip']['delete'] = '����'.VIP;
$RT['action']['vip']['expire'] = '����'.VIP;
$RT['action']['vip']['show'] = '�鿴����';
$RT['action']['vip']['move'] = 'ɾ������';
$RT['action']['vip']['update'] = '����ָ��';

$RT['action']['index']['fporder'] = '��˾��������';//tmp 2010-12-13
$RT['action']['index']['fptech'] = '��˾����֧��';//tmp

$CT = false;
?>