<?php
defined('DT_ADMIN') or exit('Access Denied');
$MCFG['module'] = 'member';
$MCFG['name'] = '��Ա';
$MCFG['author'] = 'DESTOON.COM';
$MCFG['homepage'] = 'www.destoon.com';
$MCFG['copy'] = false;
$MCFG['uninstall'] = false;

$RT = array();
$RT['file']['index'] = '��Ա����';
$RT['file']['group'] = '��Ա�����';
$RT['file']['contact'] = '��ϵ��Ա';
$RT['file']['online'] = '���߻�Ա';
$RT['file']['chat'] = '���߽�̸';
$RT['file']['oauth'] = 'һ����¼';
$RT['file']['grade'] = '��Ա����';
$RT['file']['record'] = '�ʽ���ˮ';
$RT['file']['credit'] = '���ֽ���';
$RT['file']['sms'] = '��������';
$RT['file']['charge'] = '��ֵ��¼';
$RT['file']['cash'] = '���ּ�¼';
$RT['file']['pay'] = '��Ϣ֧��';
$RT['file']['card'] = '��ֵ������';
$RT['file']['promo'] = '�Ż������';
$RT['file']['ask'] = '�ͷ�����';
$RT['file']['validate'] = '������֤';
$RT['file']['sendsms'] = '�ֻ�����';
$RT['file']['sendmail'] = '�����ʼ�';
$RT['file']['alert'] = 'ó������';
$RT['file']['mail'] = '�ʼ�����';
$RT['file']['message'] = 'վ���ż�';
$RT['file']['favorite'] = '�̻��ղ�';
$RT['file']['friend'] = '��Ա����';
$RT['file']['address'] = '�ջ���ַ';
$RT['file']['honor'] = '��������';
$RT['file']['news'] = '��˾����';
$RT['file']['page'] = '��˾��ҳ';
$RT['file']['link'] = '��������';
$RT['file']['style'] = '��˾ģ��';

$RT['action']['index']['add'] = '��Ա���';
$RT['action']['index']['edit'] = '��Ա�޸�';
$RT['action']['index']['delete'] = '��Աɾ��';
$RT['action']['index']['check'] = '��Ա���';
$RT['action']['index']['move'] = '��Ա�ƶ�';
$RT['action']['index']['show'] = '��Ա�鿴';

$RT['action']['group']['add'] = '��Ա�����';
$RT['action']['group']['edit'] = '��Ա���޸�';
$RT['action']['group']['delete'] = '��Ա��ɾ��';

$RT['action']['record']['add'] = '�ʽ�����';
$RT['action']['record']['delete'] = 'ɾ����¼';

$RT['action']['credit']['add'] = '���ֽ���';
$RT['action']['credit']['delete'] = 'ɾ����¼';

$RT['action']['sms']['add'] = '��������';
$RT['action']['sms']['delete'] = 'ɾ����¼';

$RT['action']['charge']['check'] = '��˼�¼';
$RT['action']['charge']['recycle'] = '���ϼ�¼';
$RT['action']['charge']['delete'] = 'ɾ����¼';

$RT['action']['cash']['show'] = '�鿴����';
$RT['action']['cash']['edit'] = '��������';

$RT['action']['pay']['delete'] = 'ɾ����¼';

$RT['action']['ask']['edit'] = '��������';
$RT['action']['ask']['delete'] = 'ɾ������';

$RT['action']['validate']['check'] = 'ͨ����֤';
$RT['action']['validate']['delete'] = 'ɾ����¼';

$RT['action']['sms']['record'] = '���ͼ�¼';
$RT['action']['sms']['delete_record'] = 'ɾ����¼';
$RT['action']['sms']['list'] = '�����б�';
$RT['action']['sms']['make'] = '��ȡ�б�';
$RT['action']['sms']['delete'] = 'ɾ���б�';

$RT['action']['sendmail']['list'] = '�ʼ��б�';
$RT['action']['sendmail']['make'] = '��ȡ�б�';
$RT['action']['sendmail']['download'] = '�����б�';
$RT['action']['sendmail']['delete'] = 'ɾ���б�';

$RT['action']['alert']['add'] = '�������';
$RT['action']['alert']['edit'] = '�޸�����';
$RT['action']['alert']['delete'] = 'ɾ������';
$RT['action']['alert']['check'] = '�������';
$RT['action']['alert']['send'] = '�����̻�';

$RT['action']['mail']['send'] = '�����ʼ�';
$RT['action']['mail']['add'] = '����ʼ�';
$RT['action']['mail']['edit'] = '�޸��ʼ�';
$RT['action']['mail']['delete'] = 'ɾ���ʼ�';
$RT['action']['mail']['list'] = '�鿴�б�';
$RT['action']['mail']['list_delete'] = 'ȡ������';

$RT['action']['message']['send'] = '�����ż�';
$RT['action']['message']['edit'] = '�޸��ż�';
$RT['action']['message']['delete'] = 'ɾ���ż�';
$RT['action']['message']['mail'] = '�ż�ת��';
$RT['action']['message']['clear'] = '�ż�����';

$RT['action']['favorite']['edit'] = '�޸��ղ�';
$RT['action']['favorite']['delete'] = 'ɾ���ղ�';

$RT['action']['friend']['edit'] = '�޸�����';
$RT['action']['friend']['delete'] = 'ɾ������';

$RT['action']['honor']['add'] = '���֤��';
$RT['action']['honor']['edit'] = '�޸�֤��';
$RT['action']['honor']['delete'] = 'ɾ��֤��';
$RT['action']['honor']['check'] = '���֤��';
$RT['action']['honor']['expire'] = '����֤��';
$RT['action']['honor']['reject'] = 'δͨ��֤��';
$RT['action']['honor']['recycle'] = '����վ';
$RT['action']['honor']['clear'] = '��ջ���վ';
$RT['action']['honor']['update'] = '���µ�ַ';

$RT['action']['news']['add'] = '�������';
$RT['action']['news']['edit'] = '�޸�����';
$RT['action']['news']['delete'] = 'ɾ������';
$RT['action']['news']['check'] = '�������';
$RT['action']['news']['reject'] = 'δͨ������';
$RT['action']['news']['recycle'] = '����վ';
$RT['action']['news']['clear'] = '��ջ���վ';

$RT['action']['page']['add'] = '��ӵ�ҳ';
$RT['action']['page']['edit'] = '�޸ĵ�ҳ';
$RT['action']['page']['delete'] = 'ɾ����ҳ';
$RT['action']['page']['check'] = '��˵�ҳ';
$RT['action']['page']['reject'] = 'δͨ����ҳ';
$RT['action']['page']['recycle'] = '����վ';
$RT['action']['page']['clear'] = '��ջ���վ';

$RT['action']['link']['add'] = '�������';
$RT['action']['link']['edit'] = '�޸�����';
$RT['action']['link']['delete'] = 'ɾ������';
$RT['action']['link']['check'] = '�������';

$RT['action']['style']['add'] = '���ģ��';
$RT['action']['style']['edit'] = '�޸�ģ��';
$RT['action']['style']['delete'] = 'ɾ��ģ��';
$RT['action']['style']['order'] = '��������';

$CT = false;
?>