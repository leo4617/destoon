<?php
defined('IN_DESTOON') or exit('Access Denied');
$MCFG = array();
$MCFG['module'] = 'special';
$MCFG['name'] = 'ר��';
$MCFG['author'] = 'DESTOON.COM';
$MCFG['homepage'] = 'www.destoon.com';
$MCFG['copy'] = false;
$MCFG['uninstall'] = true;
$MCFG['moduleid'] = 11;

$RT = array();
$RT['file']['index'] = 'ר�����';
$RT['file']['item'] = '��Ϣ����';
$RT['file']['html'] = '������ҳ';

$RT['action']['index']['add'] = '���ר��';
$RT['action']['index']['edit'] = '�޸�ר��';
$RT['action']['index']['delete'] = 'ɾ��ר��';
$RT['action']['index']['check'] = '���ר��';
$RT['action']['index']['recycle'] = '����վ';
$RT['action']['index']['move'] = 'ר���ƶ�';
$RT['action']['index']['level'] = '��Ϣ����';

$CT = true;
?>