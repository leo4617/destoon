<?php
defined('IN_DESTOON') or exit('Access Denied');
$MCFG['module'] = 'extend';
$MCFG['name'] = '��չ';
$MCFG['author'] = 'DESTOON.COM';
$MCFG['homepage'] = 'www.destoon.com';
$MCFG['copy'] = false;
$MCFG['uninstall'] = false;

$RT = array();
$RT['file']['spread'] = '�����ƹ�';
$RT['file']['ad'] = '������';
$RT['file']['announce'] = '�������';
$RT['file']['webpage'] = '��ҳ����';
$RT['file']['link'] = '��������';
$RT['file']['comment'] = '���۹���';
$RT['file']['guestbook'] = '���Թ���';
$RT['file']['vote'] = 'ͶƱ����';
$RT['file']['html'] = '��������';

$RT['action']['spread']['add'] = '�������';
$RT['action']['spread']['edit'] = '�޸�����';
$RT['action']['spread']['delete'] = 'ɾ������';
$RT['action']['spread']['check'] = '�������';
$RT['action']['spread']['price'] = '�������';
$RT['action']['spread']['html'] = '��������';

$RT['action']['ad']['add_place'] = '��ӹ��λ';
$RT['action']['ad']['edit_place'] = '�޸Ĺ��λ';
$RT['action']['ad']['delete_place'] = 'ɾ�����λ';
$RT['action']['ad']['view'] = 'Ԥ�����λ';
$RT['action']['ad']['add'] = '��ӹ��';
$RT['action']['ad']['edit'] = '�޸Ĺ��';
$RT['action']['ad']['delete'] = 'ɾ�����';
$RT['action']['ad']['add'] = '��ӹ��';
$RT['action']['ad']['list'] = '������';
$RT['action']['ad']['html'] = '���ɹ��';

$RT['action']['announce']['add'] = '��ӹ���';
$RT['action']['announce']['edit'] = '�޸Ĺ���';
$RT['action']['announce']['delete'] = 'ɾ������';
$RT['action']['announce']['expire'] = '���ڹ���';
$RT['action']['announce']['order'] = '��������';

$RT['action']['webpage']['add'] = '��ӵ�ҳ';
$RT['action']['webpage']['edit'] = '�޸ĵ�ҳ';
$RT['action']['webpage']['delete'] = 'ɾ����ҳ';
$RT['action']['webpage']['order'] = '��������';
$RT['action']['webpage']['html'] = '���ɵ�ҳ';

$RT['action']['link']['add'] = '�������';
$RT['action']['link']['edit'] = '�޸�����';
$RT['action']['link']['delete'] = 'ɾ������';
$RT['action']['link']['check'] = '�������';
$RT['action']['link']['order'] = '��������';

$RT['action']['comment']['edit'] = '�޸�����';
$RT['action']['comment']['delete'] = 'ɾ������';
$RT['action']['comment']['check'] = '�������';
$RT['action']['comment']['ban'] = '���۽�ֹ';

$RT['action']['guestbook']['edit'] = '�޸�����';
$RT['action']['guestbook']['delete'] = 'ɾ������';

$RT['action']['vote']['add'] = '���ͶƱ';
$RT['action']['vote']['edit'] = '�޸�ͶƱ';
$RT['action']['vote']['delete'] = 'ɾ��ͶƱ';
$RT['action']['vote']['check'] = '���ͶƱ';
$RT['action']['vote']['update'] = '���µ�ַ';
$RT['action']['vote']['html'] = '����ͶƱ';
$RT['action']['vote']['level'] = '���ü���';

$CT = false;
?>