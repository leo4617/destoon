<?php
defined('IN_DESTOON') or exit('Access Denied');
$menus = array (
    array('��Ʒ����', '?moduleid='.$moduleid),
    array('��������', '?moduleid='.$moduleid.'&file='.$file),
    array('ͳ�Ʊ���', '?moduleid='.$moduleid.'&file='.$file.'&action=stats'),
);
$_status = array(
	'<span style="color:#0000FF;">��ҷ��𶩵�<br/>�ȴ�����ȷ��</span>',
	'<span style="color:#FF6600;">������ȷ�϶���<br/>�ȴ���Ҹ���</span>',
	'<span style="color:#008080;">����Ѹ���<br/>�ȴ����ҷ���</span>',
	'<span style="color:#FF0000;">�����ѷ���<br/>�ȴ����ȷ��</span>',
	'<span style="color:#008000;">���׳ɹ�</span>',
	'<span style="color:#FF0000;text-decoration:underline;">��������˿�</span>',
	'<span style="color:#0000FF;text-decoration:underline;">���˿�����</span>',
	'<span style="color:#FF6600;text-decoration:underline;">�Ѹ��������</span>',
	'<span style="color:#888888;text-decoration:line-through;">��ҹرս���</span>',
	'<span style="color:#888888;text-decoration:line-through;">���ҹرս���</span>',
);
$dstatus = array(
	'��ҷ��𶩵�,�ȴ�����ȷ��',
	'������ȷ�϶���,�ȴ���Ҹ���',
	'����Ѹ���,�ȴ����ҷ���',
	'�����ѷ���,�ȴ����ȷ��',
	'���׳ɹ�',
	'��������˿�',
	'���˿�����',
	'�Ѹ��������',
	'��ҹرս���',
	'���ҹرս���',
);
$STARS = $L['star_type'];
$table = $DT_PRE.'mall_order';
if($action == 'refund' || $action == 'show' || $action == 'comment') {
	$itemid or msg('δָ����¼');
	$item = $db->get_one("SELECT * FROM {$table} WHERE itemid=$itemid ");
	$item or msg('��¼������');
	$item['linkurl'] = $EXT['linkurl'].'redirect.php?mid='.$moduleid.'&itemid='.$item['mallid'];
	$item['money'] = $item['amount'] + $item['fee'];
	$item['addtime'] = timetodate($item['addtime'], 6);
	$item['updatetime'] = timetodate($item['updatetime'], 6);
}
switch($action) {
	case 'stats':
		$year = isset($year) ? intval($year) : date('Y', $DT_TIME);
		$year or $year = date('Y', $DT_TIME);
		$month = isset($month) ? intval($month) : date('n', $DT_TIME);
		isset($seller) or $seller = '';
		$chart_data = '';
		$T1 = $T2 = $T3 = 0;
		if($month) {
			$L = date('t', strtotime($year.'-'.$month.'-01'));
			for($i = 1; $i <= $L; $i++) {
				if($i > 1) $chart_data .= '\n';
				$chart_data .= $i;
				$F = strtotime($year.'-'.$month.'-'.$i.' 00:00:00');
				$T = strtotime($year.'-'.$month.'-'.$i.' 23:59:59');
				$condition = "addtime>=$F AND addtime<=$T";
				if($seller) $condition .= " AND seller='$seller'";
				$t = $db->get_one("SELECT SUM(`amount`) AS num1,SUM(`fee`) AS num2 FROM {$table} WHERE {$condition} AND status=4");
				$num1 = $t['num1'] ? dround($t['num1']) : 0;
				$num2 = $t['num2'] ? dround($t['num2']) : 0;
				$num = $num1 + $num2;
				$chart_data .= ';'.$num;
				$T1 += $num;
				$t = $db->get_one("SELECT SUM(`amount`) AS num1,SUM(`fee`) AS num2 FROM {$table} WHERE {$condition} AND status=6");
				$num1 = $t['num1'] ? dround($t['num1']) : 0;
				$num2 = $t['num2'] ? dround($t['num2']) : 0;
				$num = $num1 + $num2;
				$chart_data .= ';'.$num;
				$T2 += $num;
				$t = $db->get_one("SELECT SUM(`amount`) AS num1,SUM(`fee`) AS num2 FROM {$table} WHERE {$condition} AND status=7");
				$num1 = $t['num1'] ? dround($t['num1']) : 0;
				$num2 = $t['num2'] ? dround($t['num2']) : 0;
				$num = $num1 + $num2;
				$chart_data .= ';'.$num;
				$T3 += $num;
			}
			$title = $year.'��'.$month.'�½��ױ���';
			if($seller) $title = '['.$seller.'] '.$title;
		} else {
			for($i = 1; $i < 13; $i++) {
				if($i > 1) $chart_data .= '\n';
				$chart_data .= $i;
				$F = strtotime($year.'-'.$i.'-01 00:00:00');
				$T = strtotime($year.'-'.$i.'-'.date('t', $F).' 23:59:59');
				$condition = "addtime>=$F AND addtime<=$T";
				if($seller) $condition .= " AND seller='$seller'";
				$t = $db->get_one("SELECT SUM(`amount`) AS num1,SUM(`fee`) AS num2 FROM {$table} WHERE {$condition} AND status=4");
				$num1 = $t['num1'] ? dround($t['num1']) : 0;
				$num2 = $t['num2'] ? dround($t['num2']) : 0;
				$num = $num1 + $num2;
				$chart_data .= ';'.$num;
				$T1 += $num;
				$t = $db->get_one("SELECT SUM(`amount`) AS num1,SUM(`fee`) AS num2 FROM {$table} WHERE {$condition} AND status=6");
				$num1 = $t['num1'] ? dround($t['num1']) : 0;
				$num2 = $t['num2'] ? dround($t['num2']) : 0;
				$num = $num1 + $num2;
				$chart_data .= ';'.$num;
				$T2 += $num;
				$t = $db->get_one("SELECT SUM(`amount`) AS num1,SUM(`fee`) AS num2 FROM {$table} WHERE {$condition} AND status=7");
				$num1 = $t['num1'] ? dround($t['num1']) : 0;
				$num2 = $t['num2'] ? dround($t['num2']) : 0;
				$num = $num1 + $num2;
				$chart_data .= ';'.$num;
				$T3 += $num;
			}
			$title = $year.'�꽻�ױ���';
			if($seller) $title = '['.$seller.'] '.$title;
		}
		include tpl('order_stats', $module);
	break;
	case 'refund':
		if($item['status'] != 5) msg('�˽�����������');
		if($submit) {
			isset($status) or msg('��ָ��������');
			$content or msg('����д��������');
			if($status == 6) {//���˿���ʤ �˿�
				$db->query("UPDATE {$DT_PRE}member SET money=money+$item[money],locking=locking-$item[money] WHERE username='$item[buyer]'");
				$msg = '����ɹ�������״̬�Ѿ��ı�Ϊ ���˿�����';
			} else if($status == 7) {//���˿����ʤ ����
				$db->query("UPDATE {$DT_PRE}member SET locking=locking-$item[money] WHERE username='$item[buyer]'");
				money_record($item['buyer'], -$item['money'], 'վ��', 'system', '������������', '������:'.$itemid);
				money_add($item['seller'], $item['money']);
				money_record($item['seller'], $item['money'], 'վ��', 'system', '������������', '������:'.$itemid);
				$msg = '����ɹ�������״̬�Ѿ��ı�Ϊ �Ѹ��������';
			} else {
				msg();
			}
			$db->query("UPDATE {$table} SET status=$status,editor='$_username',updatetime=$DT_TIME,refund_reason='$content' WHERE itemid=$itemid");
			msg($msg, $forward, 5);
		} else {
			include tpl('order_refund', $module);
		}
	break;
	case 'show':
		$cm = $db->get_one("SELECT * FROM {$DT_PRE}mall_comment WHERE itemid=$itemid");
		include tpl('order_show', $module);
	break;
	case 'comment':
		$cm = $db->get_one("SELECT * FROM {$DT_PRE}mall_comment WHERE itemid=$itemid");
		$cm or msg('���۲�����');
		$mallid = $item['mallid'];
		$post['seller_ctime'] = $post['seller_ctime'] ? strtotime($post['seller_ctime']) : 0;
		$post['seller_rtime'] = $post['seller_rtime'] ? strtotime($post['seller_rtime']) : 0;
		$post['buyer_ctime'] = $post['buyer_ctime'] ? strtotime($post['buyer_ctime']) : 0;
		$post['buyer_rtime'] = $post['buyer_rtime'] ? strtotime($post['buyer_rtime']) : 0;
		if($cm['seller_star'] != $post['seller_star']) {
			$s = $post['seller_star'];
			$s1 = 's'.$cm['seller_star'];
			$s2 = 's'.$post['seller_star'];
			$db->query("UPDATE {$DT_PRE}mall_order SET seller_star=$s WHERE itemid=$itemid");
			$db->query("UPDATE {$DT_PRE}mall_stat SET `$s2`=`$s2`+1 WHERE mallid=$mallid");
			if($cm['seller_star']) $db->query("UPDATE {$DT_PRE}mall_stat SET `$s1`=`$s1`-1 WHERE mallid=$mallid");
		}
		if($cm['buyer_star'] != $post['buyer_star']) {
			$s = $post['buyer_star'];
			$s1 = 'b'.$cm['buyer_star'];
			$s2 = 'b'.$post['buyer_star'];
			$db->query("UPDATE {$DT_PRE}mall_order SET buyer_star=$s WHERE itemid=$itemid");
			$db->query("UPDATE {$DT_PRE}mall_stat SET `$s2`=`$s2`+1 WHERE mallid=$mallid");
			if($cm['buyer_star']) $db->query("UPDATE {$DT_PRE}mall_stat SET `$s1`=`$s1`-1 WHERE mallid=$mallid");
		}
		$sql = '';
		foreach($post as $k=>$v) {
			$sql .= ",$k='$v'";
		}
        $sql = substr($sql, 1);
	    $db->query("UPDATE {$DT_PRE}mall_comment SET $sql WHERE itemid=$itemid");
		msg('�޸ĳɹ�', '?moduleid='.$moduleid.'&file='.$file.'&action=show&itemid='.$itemid.'#comment1');
	break;
	case 'delete':
		$itemid or msg('δѡ���¼');
		$itemids = is_array($itemid) ? implode(',', $itemid) : $itemid;
		$db->query("DELETE FROM {$table} WHERE itemid IN ($itemids)");
		dmsg('ɾ���ɹ�', $forward);
	break;
	default:
		$sfields = array('������', '��Ʒ����', '����', '���', '�������', '���ӽ��', '��������', '�������', '��ҵ�ַ', '����ʱ�', '��ҵ绰', '����ֻ�', '�������', '��������', '��������', '��ע');
		$dfields = array('title', 'title', 'seller', 'buyer', 'amount', 'fee', 'fee_name', 'buyer_name', 'buyer_address', 'buyer_postcode', 'buyer_phone', 'buyer_mobile', 'buyer_receive', 'send_type', 'send_no', 'note');
		$sorder  = array('����ʽ', '�µ�ʱ�併��', '�µ�ʱ������', '����ʱ�併��', '����ʱ������', '��Ʒ���۽���', '��Ʒ��������', '������������', '������������', '��������', '�����������', '���ӽ���', '���ӽ������');
		$dorder  = array('itemid DESC', 'addtime DESC', 'addtime ASC', 'updatetime DESC', 'updatetime ASC', 'price DESC', 'price ASC', 'number DESC', 'number ASC', 'amount DESC', 'amount ASC', 'fee DESC', 'fee ASC');
		isset($fields) && isset($dfields[$fields]) or $fields = 0;
		$status = isset($status) && isset($dstatus[$status]) ? intval($status) : '';
		$itemid or $itemid = '';
		$mallid = isset($mallid) && $mallid ? intval($mallid) : '';
		$seller_star = isset($seller_star) ? intval($seller_star) : 0;
		$buyer_star = isset($buyer_star) ? intval($buyer_star) : 0;
		isset($seller) or $seller = '';
		isset($buyer) or $buyer = '';
		isset($amounts) or $amounts = '';
		isset($fromtime) or $fromtime = '';
		isset($totime) or $totime = '';
		isset($dfromtime) or $dfromtime = '';
		isset($dtotime) or $dtotime = '';
		isset($timetype) or $timetype = 'addtime';
		isset($mtype) or $mtype = 'money';
		isset($minamount) or $minamount = '';
		isset($maxamount) or $maxamount = '';
		isset($order) && isset($dorder[$order]) or $order = 0;
		$fields_select = dselect($sfields, 'fields', '', $fields);
		$status_select = dselect($dstatus, 'status', '״̬', $status, 'style="width:200px;"', 1, '', 1);
		$order_select = dselect($sorder, 'order', '', $order);
		$condition = '1';
		if($keyword) $condition .= " AND $dfields[$fields] LIKE '%$keyword%'";
		if($fromtime) $condition .= " AND $timetype>".(strtotime($fromtime.' 00:00:00'));
		if($totime) $condition .= " AND $timetype<".(strtotime($totime.' 23:59:59'));
		if($status !== '') $condition .= " AND status='$status'";
		if($seller) $condition .= " AND seller='$seller'";
		if($buyer) $condition .= " AND buyer='$buyer'";
		if($itemid) $condition .= " AND itemid=$itemid";
		if($mallid) $condition .= " AND mallid=$mallid";
		if($seller_star) $condition .= " AND seller_star=$seller_star";
		if($buyer_star) $condition .= " AND buyer_star=$buyer_star";
		if($mtype == 'money') $mtype = "`amount`+`fee`";
		if($minamount != '') $condition .= " AND $mtype>=$minamount";
		if($maxamount != '') $condition .= " AND $mtype<=$maxamount";
		if($page > 1 && $sum) {
			$items = $sum;
		} else {
			$r = $db->get_one("SELECT COUNT(*) AS num FROM {$table} WHERE $condition");
			$items = $r['num'];
		}
		$pages = pages($items, $page, $pagesize);	
		$lists = array();
		$result = $db->query("SELECT * FROM {$table} WHERE $condition ORDER BY $dorder[$order] LIMIT $offset,$pagesize");
		$amount = $fee = $money = 0;
		while($r = $db->fetch_array($result)) {
			$r['addtime'] = str_replace(' ', '<br/>', timetodate($r['addtime'], 5));
			$r['updatetime'] = str_replace(' ', '<br/>', timetodate($r['updatetime'], 5));
			$r['linkurl'] = $EXT['linkurl'].'redirect.php?mid='.$moduleid.'&itemid='.$r['mallid'];
			$r['dstatus'] = $_status[$r['status']];
			$r['money'] = $r['amount'] + $r['fee'];
			$amount += $r['amount'];
			$fee += $r['fee'];
			$lists[] = $r;
		}
		$money = $amount + $fee;
		include tpl('order', $module);
	break;
}
?>