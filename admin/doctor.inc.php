<?php
/*
	[Destoon B2B System] Copyright (c) 2008-2013 Destoon.COM
	This is NOT a freeware, use is subject to license.txt
*/
defined('IN_DESTOON') or exit('Access Denied');
$menus = array (
    array('ϵͳ���', '?file='.$file),
    array('PHP��Ϣ', '?file='.$file.'&action=phpinfo', ' target="_blank"'),
);
if($action == 'phpinfo') {
	phpinfo();
} else {
	include tpl('doctor');
}
?>