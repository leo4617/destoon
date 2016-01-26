<?php
/*
	[Destoon B2B System] Copyright (c) 2008-2015 www.destoon.com
	This is NOT a freeware, use is subject to license.txt
*/
$_SERVER['REQUEST_URI'] = '';
require '../common.inc.php';
header("Content-type:text/javascript");
check_referer() or exit('document.write("<h2>Invalid Referer</h2>");');
$tag = isset($auth) ? strip_sql(decrypt($auth)) : '';
$tag or exit('document.write("<h2>Bad Parameter</h2>");');
foreach(array($DT_PRE, '#', '$', '%', '&amp;', 'table', 'fields', 'password', 'payword', 'debug') as $v) {
	strpos($tag, $v) === false or exit('document.write("<h2>Bad Parameter</h2>");');
}
ob_start();
tag($tag);
$data = ob_get_contents();
ob_clean();
echo 'document.write(\''.dwrite($data ? $data : 'No Data or Bad Parameter').'\');';
?>