<?php
defined('DT_ADMIN') or exit('Access Denied');
$MCFG = array();
$MCFG['module'] = 'club';
$MCFG['name'] = '��Ȧ';
$MCFG['author'] = 'DESTOON.COM';
$MCFG['homepage'] = 'www.destoon.com';
$MCFG['copy'] = false;
$MCFG['uninstall'] = true;
$MCFG['moduleid'] = 18;

$RT = array();
$RT['file']['index'] = '���ӹ���';
$RT['file']['reply'] = '�ظ�����';
$RT['file']['group'] = '��Ȧ����';
$RT['file']['fans'] = '��˿����';
$RT['file']['manage'] = '�����¼';
$RT['file']['html'] = '������ҳ';

$RT['action']['index']['add'] = '��������';
$RT['action']['index']['edit'] = '�޸�����';
$RT['action']['index']['delete'] = 'ɾ������';
$RT['action']['index']['check'] = '�������';
$RT['action']['index']['reject'] = 'δͨ��';
$RT['action']['index']['recycle'] = '����վ';
$RT['action']['index']['move'] = '�ƶ�����';
$RT['action']['index']['level'] = '���뾫��';
$RT['action']['index']['ontop'] = '�ö�����';
$RT['action']['index']['style'] = '��������';

$RT['action']['reply']['edit'] = '�޸Ļظ�';
$RT['action']['reply']['delete'] = 'ɾ���ظ�';
$RT['action']['reply']['check'] = '��˻ظ�';
$RT['action']['reply']['reject'] = 'δͨ��';
$RT['action']['reply']['recycle'] = '����վ';
$RT['action']['reply']['cancel'] = 'ȡ�����';

$RT['action']['group']['add'] = '�����Ȧ';
$RT['action']['group']['edit'] = '�޸���Ȧ';
$RT['action']['group']['delete'] = 'ɾ����Ȧ';
$RT['action']['group']['check'] = '�����Ȧ';
$RT['action']['group']['reject'] = 'δͨ��';
$RT['action']['group']['recycle'] = '����վ';
$RT['action']['group']['level'] = '��Ȧ����';

$RT['action']['fans']['delete'] = 'ɾ����˿';
$RT['action']['fans']['check'] = '��˷�˿';
$RT['action']['fans']['reject'] = 'δͨ��';
$RT['action']['fans']['recycle'] = '����վ';
$RT['action']['fans']['cancel'] = 'ȡ�����';

$CT = true;
?>