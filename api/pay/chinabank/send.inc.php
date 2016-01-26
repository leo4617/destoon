<?php
defined('IN_DESTOON') or exit('Access Denied');
$notify_url = DT_PATH.'api/pay/'.$bank.'/'.($PAY[$bank]['notify'] ? $PAY[$bank]['notify'] : 'notify.php');
$v_mid = $PAY[$bank]['partnerid']; // �̻���
$v_url = $receive_url; // ����url
$key = $PAY[$bank]['keycode']; // MD5��Կ

$v_oid = $orderid; 
$v_amount = $charge; //֧�����                 
$v_moneytype = 'CNY'; //����

$text = $v_amount.$v_moneytype.$v_oid.$v_mid.$v_url.$key; //md5����ƴ�մ�,ע��˳��
$v_md5info = strtoupper(md5($text));

$remark1 = $charge_title ? $charge_title : '��Ա('.$_username.')��ֵ(��ˮ��:'.$orderid.')'; //��ע�ֶ�1
$remark1 = convert($remark1, DT_CHARSET, 'GBK');
$remark2 = '[url:='.$notify_url.']'; //��ע�ֶ�2
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo DT_CHARSET;?>">
<title>������ת��<?php echo $PAY[$bank]['name'];?>����֧��ƽ̨...</title>
</head>
<body onload="document.getElementById('pay').submit();">
<?php if($key == 'SANDBOX') { ?>
<form method="post" action="http://demo.destoon.com/api/sandbox.php" id="pay">
<input type="hidden" name="v_notify"    value="<?php echo $notify_url;?>"/>
<?php } else { ?>
<form method="post" action="https://Pay3.chinabank.com.cn/PayGate" id="pay">
<?php } ?>
<input type="hidden" name="v_mid"       value="<?php echo $v_mid;?>"/>
<input type="hidden" name="v_oid"       value="<?php echo $v_oid;?>"/>
<input type="hidden" name="v_amount"    value="<?php echo $v_amount;?>"/>
<input type="hidden" name="v_moneytype" value="<?php echo $v_moneytype;?>"/>
<input type="hidden" name="v_url"       value="<?php echo $v_url;?>"/>
<input type="hidden" name="v_md5info"   value="<?php echo $v_md5info;?>"/>
<input type="hidden" name="remark1"     value="<?php echo $remark1;?>"/>
<input type="hidden" name="remark2"     value="<?php echo $remark2;?>"/>
</form>
</body>
</html>