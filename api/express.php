<?php
/*
	[Destoon B2B System] Copyright (c) 2008-2015 www.destoon.com
	This is NOT a freeware, use is subject to license.txt
*/
$_COOKIE = array();
require '../common.inc.php';
function get_express_home($name) {
	$name = strtolower($name);
	if(strpos($name, '˳��') !== false) return 'http://www.sf-express.com/cn/sc/';
	if(strpos($name, '��ͨ') !== false) return 'http://www.sto.cn/';
	if(strpos($name, 'Բͨ') !== false) return 'http://www.yto.net.cn/cn/index/index.html';
	if(strpos($name, '��ͨ') !== false) return 'http://www.zto.cn/';
	if(strpos($name, 'լ����') !== false) return 'http://www.zjs.com.cn/';
	if(strpos($name, '�ϴ�') !== false) return 'http://www.yundaex.com/';
	if(strpos($name, '����') !== false) return 'http://www.ttkdex.com/';
	if(strpos($name, '����') !== false) return 'http://www.rufengda.com/';
	if(strpos($name, '��ͨ') !== false) return 'http://www.htky365.com/';
	if(strpos($name, 'ȫ��') !== false) return 'http://www.qfkd.com.cn/';
	if(strpos($name, 'ems') !== false) return 'http://www.ems.com.cn/';
	return '';
}
function get_express_code($name) {
	#http://code.google.com/p/kuaidi-api/wiki/Open_API_Chaxun_URL
	$name = strtolower($name);
	if(strpos($name, '˳��') !== false) return 'sf';
	if(strpos($name, '��ͨ') !== false) return 'st';
	if(strpos($name, 'Բͨ') !== false) return 'yt';
	if(strpos($name, '��ͨ') !== false) return 'zt';
	if(strpos($name, 'լ����') !== false) return 'zjs';
	if(strpos($name, '�ϴ�') !== false) return 'yd';
	if(strpos($name, '����') !== false) return 'tt';
	if(strpos($name, '����') !== false) return 'rufengda';
	if(strpos($name, '��ͨ') !== false) return 'huitongkuaidi';
	if(strpos($name, 'ȫ��') !== false) return 'quanfengkuaidi';
	if(strpos($name, 'ems') !== false) return 'ems';
	if(strpos($name, 'dhl') !== false) return 'dhl';
	if(strpos($name, 'ups') !== false) return 'ups';
	if(strpos($name, 'tnt') !== false) return 'tnt';
	if(strpos($name, 'fedex') !== false) return 'fedex';
	if(strpos($name, '����') !== false) return 'lianb';
	return '';
}
$e = isset($e) ? trim($e) : '';
$n = isset($n) ? trim($n) : '';
if($action == 'home') {
	if($e) {
		$u = get_express_home($e);
		if($u) dheader($u.'?no='.$n);
	}
	dheader('http://www.baidu.com/s?wd='.urlencode($e.' ').$n);
} else {
	if($e && $n) {
		$c = get_express_code($e);
		if($c) dheader('http://www.kuaidi100.com/chaxun?com='.$c.'&nu='.$n);
	}
	dheader('http://www.kuaidi100.com/?nu='.$n);
}
?>