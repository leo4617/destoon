<?php
$_SERVER['REQUEST_URI'] = '';
$_DPOST = $_POST;
$_DGET = $_GET;
require '../../../common.inc.php';
$_POST = $_DPOST;
$_GET = $_DGET;
if(!$_POST && !$_GET) exit('fail');
$bank = 'chinapay';
$PAY = cache_read('pay.php');
if(!$PAY[$bank]['enable']) exit('fail');
if(!$PAY[$bank]['partnerid']) exit('fail');
$receive_url = '';
require DT_ROOT."/api/pay/".$bank."/netpayclient_config.php";
//���� netpayclient ���
require DT_ROOT."/api/pay/".$bank."/netpayclient.php";
//���빫Կ�ļ�
$flag = buildKey(PUB_KEY);
$flag or exit('���빫Կ�ļ�ʧ�ܣ�');

//��ȡ����Ӧ��ĸ���ֵ
$merid = $_POST["merid"];
$orderno = $_POST["orderno"];
$transdate = $_POST["transdate"];
$amount = $_POST["amount"];
$currencycode = $_POST["currencycode"];
$transtype = $_POST["transtype"];
$status = $_POST["status"];
$checkvalue = $_POST["checkvalue"];
$gateId = $_POST["GateId"];
$priv1 = $_POST["Priv1"];
$flag = verifyTransResponse($merid, $orderno, $amount, $currencycode, $transdate, $transtype, $status, $checkvalue);
if($flag) {
	if($status == '1001') {
		//���Ĵ����߼���д�������������ݿ�ȡ�
		//ע�⣺��������ύʱͬʱ��д��ҳ�淵�ص�ַ�ͺ�̨���ص�ַ���ҵ�ַ��ͬ��������������һ�����ݿ��ѯ�ж϶���״̬���Է�ֹ�ظ�����ñʶ���
		$priv1 = intval($priv1);
		$r = $db->get_one("SELECT * FROM {$DT_PRE}finance_charge WHERE itemid='$priv1'");
		if($r) {
			if($r['status'] == 0) {
				$charge_orderid = $r['itemid'];
				$charge_money = $r['amount'] + $r['fee'];
				$charge_amount = $r['amount'];
				$editor = 'N'.$bank;
				if($amount == padstr($charge_money*100, 12)) {
					$db->query("UPDATE {$DT_PRE}finance_charge SET status=3,money=$charge_money,receivetime='$DT_TIME',editor='$editor' WHERE itemid=$charge_orderid");
					require DT_ROOT.'/include/module.func.php';
					money_add($r['username'], $r['amount']);
					money_record($r['username'], $r['amount'], $PAY[$bank]['name'], 'system', '���߳�ֵ', '��ˮ��:'.$charge_orderid);
					$MOD = cache_read('module-2.php');
					if($MOD['credit_charge'] > 0) {
						$credit = intval($r['amount']*$MOD['credit_charge']);
						if($credit > 0) {
							credit_add($r['username'], $credit);
							credit_record($r['username'], $credit, 'system', '��ֵ����', '��ֵ'.$r['amount'].$DT['money_unit']);
						}
					}
					exit('success');
				} else {
					$note = '��ֵ��ƥ��S:'.$charge_money.'R:'.$amount;
					$db->query("UPDATE {$DT_PRE}finance_charge SET status=1,receivetime='$DT_TIME',editor='$editor',note='$note' WHERE itemid=$charge_orderid");//֧��ʧ��
					exit('fail');
				}
			} else if($r['status'] == 1) {
				exit('fail');
			} else if($r['status'] == 2) {
				exit('fail');
			} else {
				exit('success');
			}
		} else {
			exit('fail');
		}
	}
}
exit('fail');
?>