<?php
defined('DT_ADMIN') or exit('Access Denied');
if($action == 'sitemaps') {
	tohtml('sitemaps', $module);
	msg('SiteMaps ���³ɹ�', '?moduleid='.$moduleid.'&file=setting#sitemaps');
} else if($action == 'baidunews') {
	tohtml('baidunews', $module);
	msg('BaiduNews ���³ɹ�', '?moduleid='.$moduleid.'&file=setting#baidunews');
}
?>