<?php
defined('IN_DESTOON') or exit('Access Denied');
$MCFG['module'] = 'job';
$MCFG['name'] = '�˲�';
$MCFG['author'] = 'DESTOON.COM';
$MCFG['homepage'] = 'www.destoon.com';
$MCFG['copy'] = false;
$MCFG['uninstall'] = true;
$MCFG['moduleid'] = 9;

$RT = array();
$RT['file']['index'] = '��Ƹ����';
$RT['file']['resume'] = '��������';
$RT['file']['html'] = '������ҳ';

$RT['action']['index']['add'] = '�����Ƹ';
$RT['action']['index']['edit'] = '�޸���Ƹ';
$RT['action']['index']['delete'] = 'ɾ����Ƹ';
$RT['action']['index']['check'] = '�����Ƹ';
$RT['action']['index']['expire'] = '������Ƹ';
$RT['action']['index']['reject'] = 'δͨ����Ƹ';
$RT['action']['index']['recycle'] = '����վ';
$RT['action']['index']['move'] = '�ƶ���Ƹ';
$RT['action']['index']['level'] = '��Ϣ����';

$RT['action']['resume']['add'] = '��Ӽ���';
$RT['action']['resume']['edit'] = '�޸ļ���';
$RT['action']['resume']['delete'] = 'ɾ������';
$RT['action']['resume']['check'] = '��˼���';
$RT['action']['resume']['reject'] = 'δͨ������';
$RT['action']['resume']['recycle'] = '����վ';
$RT['action']['resume']['move'] = '�ƶ�����';
$RT['action']['resume']['level'] = '��Ϣ����';
$CT = 1;
?>