<?php
defined('DT_ADMIN') or exit('Access Denied');
$menu = array(
	array('����ά��', '?file=database'),
	array('�ļ�ά��', '?file=patch'),
	array('��Ϣͳ��', '?file=count'),
	array('�ƻ�����', '?file=cron'),
	array('ģ����', '?file=template'),
	array('��ǩ��', '?file=tag'),
	array('�ϴ���¼', '?file=upload'),
	array('������¼', '?file=keyword'),
	array('��̨��־', '?file=log'),
	array('404��־', '?file=404'),
	array('������֤', '?file=question'),
	array('�������', '?file=banword'),
	array('��ֹIP', '?file=banip'),
	array('�������', '?file=repeat'),
	array('��ҳ�ɱ�', '?file=fetch'),
	array('�༭����', '?file=word'),
	array('��̨����', '?file=search'),
	array('ϵͳ���', '?file=doctor'),
);
if(!$_founder) unset($menu[0],$menu[1],$menu[3]);
$menu_help = array(
	array('ʹ��Э��', '?file=cloud&action=license'),
	array('�����ĵ�', '?file=cloud&action=doc'),
	array('����֧��', '?file=cloud&action=support'),
	array('�ٷ���̳', '?file=cloud&action=bbs'),
	array('��Ϣ����', '?file=cloud&action=feedback'),
	array('������', '?file=cloud&action=update'),
	array('�������', '?file=cloud&action=about'),
);
$menu_system = array(
	array('��վ����', '?file=setting'),
	array('ģ�����', '?file=module'),
	array('��������', '?file=area'),
	array('���з�վ', '?file=city'),
	array('����Ա����', '?file=admin'),
);
?>