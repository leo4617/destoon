<?php
defined('IN_DESTOON') or exit('Access Denied');
$partner = trim($PAY[$bank]['partnerid']);			//�������ID
$security_code = trim($PAY[$bank]['keycode']);		//��ȫ������
$seller_email = trim($PAY[$bank]['email']);	//��������
$_input_charset = DT_CHARSET;		//�ַ������ʽ  Ŀǰ֧�� GBK �� utf-8
$service_type = 'create_direct_pay_by_user';//�������ͣ�����ʵ�ｻ�ף�trade_create_by_buyer����Ҫ��д������ ������Ʒ���ף�create_digital_goods_trade_p
$sign_type = 'MD5';				//���ܷ�ʽ  ϵͳĬ��(��Ҫ�޸�)
$transport= 'http';			//����ģʽ,����Ը����Լ��ķ������Ƿ�֧��ssl���ʶ�ѡ��http�Լ�https����ģʽ(ϵͳĬ��,��Ҫ�޸�)
$notify_url = DT_PATH.'api/pay/'.$bank.'/'.($PAY[$bank]['notify'] ? $PAY[$bank]['notify'] : 'notify.php');	// �첽���ص�ַ
$return_url = $receive_url;		//ͬ�����ص�ַ
$show_url   = DT_PATH;		//����վ��Ʒ��չʾ��ַ,����Ϊ��
?>