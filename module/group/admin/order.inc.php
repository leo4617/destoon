<?php
defined('IN_DESTOON') or exit('Access Denied');
$menus = array (
    array($MOD['name'].'����', '?moduleid='.$moduleid),
    array('��������', '?moduleid='.$moduleid.'&file='.$file),
    array('ͳ�Ʊ���', '?moduleid='.$moduleid.'&file='.$file.'&action=stats'),
);
$_status = array(
	'<span style="color:#0000FF;">�Ѹ���</span>',
	'<span style="color:#FF0000;">�ѷ���</span>',
	'<span style="color:#FF6600;">������</span>',
	'<span style="color:#008000;">���׳ɹ�</span>',
	'<span style="color:#888888;text-decoration:line-through;">���˿�</span>',
);
$dstatus = array(
	'�Ѹ���',
	'�ѷ���',
	'������',
	'���׳ɹ�',
	'���˿�',
);
$table = $DT_PRE.'group_order';
switch($action) {
	case 'stats':
		$year = isset($year) ? intval($year) : date('Y', $DT_TIME);
		$year or $year = date('Y', $DT_TIME);
		$month = isset($month) ? intval($month) : date('n', $DT_TIME);
		isset($seller) or $seller = '';
		$chart_data = '';
		$T1 = $T2 = 0;
		if($month) {
			$L = date('t', strtotime($year.'-'.$month.'-01'));
			for($i = 1; $i <= $L; $i++) {
				if($i > 1) $chart_data .= '\n';
				$chart_data .= $i;
				$F = strtotime($year.'-'.$month.'-'.$i.' 00:00:00');
				$T = strtotime($year.'-'.$month.'-'.$i.' 23:59:59');
				$condition = "addtime>=$F AND addtime<=$T";
				if($seller) $condition .= " AND seller='$seller'";
				$t = $db->get_one("SELECT SUM(`amount`) AS num FROM {$table} WHERE {$condition} AND status=3");
				$num = $t['num'] ? dround($t['num']) : 0;
				$chart_data .= ';'.$num;
				$T1 += $num;
				$t = $db->get_one("SELECT SUM(`amount`) AS num FROM {$table} WHERE {$condition} AND status=4");
				$num = $t['num'] ? dround($t['num']) : 0;
				$chart_data .= ';'.$num;
				$T2 += $num;
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
				$t = $db->get_one("SELECT SUM(`amount`) AS num FROM {$table} WHERE {$condition} AND status=3");
				$num = $t['num'] ? dround($t['num']) : 0;
				$chart_data .= ';'.$num;
				$T1 += $num;
				$t = $db->get_one("SELECT SUM(`amount`) AS num FROM {$table} WHERE {$condition} AND status=4");
				$num = $t['num'] ? dround($t['num']) : 0;
				$chart_data .= ';'.$num;
				$T2 += $num;
			}
			$title = $year.'�꽻�ױ���';
			if($seller) $title = '['.$seller.'] '.$title;
		}
		include tpl('order_stats', $module);
	break;
	case 'refund':
		$itemid or msg('δѡ���¼');
		$itemids = is_array($itemid) ? implode(',', $itemid) : $itemid;
		$i = 0;
		$result = $db->query("SELECT * FROM {$table} WHERE itemid IN ($itemids)");
		while($r = $db->fetch_array($result)) {
			if($r['status'] < 3) {
				$i++;
				$itemid = $r['itemid'];
				money_add($r['buyer'], $r['amount']);
				money_record($r['buyer'], $r['amount'], 'վ��', 'system', '�Ź��˿�', '������:'.$itemid);			
				$db->query("UPDATE {$table} SET status=4,editor='$_username',updatetime=$DT_TIME WHERE itemid=$itemid");
			}
		}
		dmsg('�˿�ɹ�'.$i.'������', $forward);
	break;
	case 'show':
		$itemid or msg('δָ����¼');
		$item = $db->get_one("SELECT * FROM {$table} WHERE itemid=$itemid ");
		$item or msg('��¼������');
		$item['linkurl'] = $EXT['linkurl'].'redirect.php?mid='.$moduleid.'&itemid='.$item['gid'];
		$item['money'] = $item['amount'];
		$item['addtime'] = timetodate($item['addtime'], 6);
		$item['updatetime'] = timetodate($item['updatetime'], 6);
		include tpl('order_show', $module);
	break;
	case 'delete':
		$itemid or msg('δѡ���¼');
		$itemids = is_array($itemid) ? implode(',', $itemid) : $itemid;
		$db->query("DELETE FROM {$table} WHERE itemid IN ($itemids)");
		dmsg('ɾ���ɹ�', $forward);
	break;
	default:
		$sfields = array('������', '��Ʒ����', '����', '���', '�������', '����', '�������', '��ҵ�ַ', '����ʱ�', '��ҵ绰', '����ֻ�', '�������', '��������', '��������', '��ע');
		$dfields = array('title', 'title', 'seller', 'buyer', 'amount', 'password', 'buyer_name', 'buyer_address', 'buyer_postcode', 'buyer_phone', 'buyer_mobile', 'buyer_receive', 'send_type', 'send_no', 'note');
		$sorder  = array('����ʽ', '�µ�ʱ�併��', '�µ�ʱ������', '����ʱ�併��', '����ʱ������', '��Ʒ���۽���', '��Ʒ��������', '������������', '������������', '��������', '�����������');
		$dorder  = array('itemid DESC', 'addtime DESC', 'addtime ASC', 'updatetime DESC', 'updatetime ASC', 'price DESC', 'price ASC', 'number DESC', 'number ASC', 'amount DESC', 'amount ASC');
		isset($fields) && isset($dfields[$fields]) or $fields = 0;
		$status = isset($status) && isset($dstatus[$status]) ? intval($status) : '';
		$itemid or $itemid = '';
		$gid = isset($gid) && $gid ? intval($gid) : '';
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
		$logistic = isset($logistic) ? intval($logistic) : '-1';
		isset($order) && isset($dorder[$order]) or $order = 0;
		$fields_select = dselect($sfields, 'fields', '', $fields);
		$status_select = dselect($dstatus, 'status', '״̬', $status, '', 1, '', 1);
		$order_select = dselect($sorder, 'order', '', $order);
		$condition = '1';
		if($keyword) $condition .= " AND $dfields[$fields] LIKE '%$keyword%'";
		if($fromtime) $condition .= " AND $timetype>".(strtotime($fromtime.' 00:00:00'));
		if($totime) $condition .= " AND $timetype<".(strtotime($totime.' 23:59:59'));
		if($status !== '') $condition .= " AND status='$status'";
		if($seller) $condition .= " AND seller='$seller'";
		if($buyer) $condition .= " AND buyer='$buyer'";
		if($itemid) $condition .= " AND itemid=$itemid";
		if($gid) $condition .= " AND gid=$gid";
		if($mtype == 'money') $mtype = "`amount`+`fee`";
		if($minamount != '') $condition .= " AND $mtype>=$minamount";
		if($maxamount != '') $condition .= " AND $mtype<=$maxamount";
		if($logistic>-1) $condition .= " AND logistic=$logistic";
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
			$r['linkurl'] = $EXT['linkurl'].'redirect.php?mid='.$moduleid.'&itemid='.$r['gid'];
			$r['dstatus'] = $_status[$r['status']];
			$r['money'] = $r['amount'];
			$amount += $r['amount'];
			$lists[] = $r;
		}
		$money = $amount + $fee;
		include tpl('order', $module);
}
?>