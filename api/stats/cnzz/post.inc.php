<?php
defined('IN_DESTOON') or exit('Access Denied');
$stats_cnzz = preg_match("/^http:\/\/s[0-9]{1,5}\.cnzz\.com\/stat\.php\?id=[0-9]{5,11}&web_id=[0-9]{5,11}$/", $stats) ? $stats : '';
?>
<tr id="stats_post_cnzz" style="display:none;">
<td class="tl">����ͳ�Ƶ�ַ</td>
<td class="tr">
<input type="text" name="stats[cnzz]" id="stats_cnzz" value="<?php echo $stats_cnzz;?>" size="70"/>&nbsp;&nbsp;
<?php 
if($stats_cnzz) {
	$tmp = explode('web_id=', $stats_cnzz);
	$web_id = $tmp[1];
?>
<a href="http://www.cnzz.com/stat/website.php?web_id=<?php echo $web_id;?>" class="t" target="_blank">�鿴ͳ��</a>
<?php } else { ?>
<a href="http://www.cnzz.com/" class="t" target="_blank">�ʺ�����</a>
<?php } ?><br/><br/>
��ʾ��ע����ȡ��ͳ�ƴ�����ʽΪ��<br/>&lt;script src="<span class="f_red">http://s21.cnzz.com/stat.php?id=1234567&web_id=1234567</span>" language="JavaScript"&gt;&lt;/script&gt;<br/>
���� <span class="f_red">http://s21.cnzz.com/stat.php?id=1234567&web_id=1234567</span> ��Ϊͳ�Ƶ�ַ
</td>
</tr>