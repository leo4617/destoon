<?php
defined('IN_DESTOON') or exit('Access Denied');
preg_match("/^[0-9]{5,11}$/", $stats) or $stats = '';
?>
<tr id="stats_post_qq" style="display:none;">
<td class="tl">����ͳ���ʺ�</td>
<td class="tr">
<input type="text" name="stats[qq]" id="stats_qq" value="<?php echo $stats;?>" size="10"/>&nbsp;&nbsp;
<?php if($stats) { ?>
<a href="http://ta.qq.com/" class="t" target="_blank">�鿴ͳ��</a>
<?php } else { ?>
<a href="http://ta.qq.com/" class="t" target="_blank">�ʺ�����</a>
<?php } ?><br/><br/>
��ʾ��ע����ȡ��ͳ�ƴ��롰...http://tajs.qq.com/stats?sId=<span class="f_red">1234567</span>...����<span class="f_red">1234567</span>��Ϊͳ���ʺ�
</td>
</tr>