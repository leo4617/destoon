<?php
defined('IN_DESTOON') or exit('Access Denied');
$stats_baidu = preg_match("/^[a-z0-9]{32}$/", $stats) ? $stats : '';
?>
<tr id="stats_post_baidu" style="display:none;">
<td class="tl">����ͳ���ʺ�</td>
<td class="tr">
<input type="text" name="stats[baidu]" id="stats_baidu" value="<?php echo $stats_baidu;?>" size="40"/>&nbsp;&nbsp;
<?php if($stats_baidu) { ?>
<a href="http://tongji.baidu.com/" class="t" target="_blank">�鿴ͳ��</a>
<?php } else { ?>
<a href="http://tongji.baidu.com/" class="t" target="_blank">�ʺ�����</a>
<?php } ?><br/><br/>
��ʾ��ע����ȡ��ͳ�ƴ��롰...hm.baidu.com/hm.js?<span class="f_red">394a7f9c9b18fdf6cc887f7176ac0123</span>...����<span class="f_red">394a7f9c9b18fdf6cc887f7176ac0123</span>��Ϊͳ���ʺ�
</td>
</tr>