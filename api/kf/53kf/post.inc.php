<?php
defined('IN_DESTOON') or exit('Access Denied');
preg_match("/^[0-9a-zA-z_\-]{4,20}$/", $kf) or $kf = '';
?>
<tr id="kf_post_53kf" style="display:none;">
<td class="tl">���߿ͷ��ʺ�</td>
<td class="tr">
<input type="text" name="kf[53kf]" id="kf_53kf" value="<?php echo $kf;?>" size="10"/>&nbsp;&nbsp;
<?php if($kf) { ?>
<a href="http://www.53kf.com/" class="t" target="_blank">�ʺŹ���</a>
<?php } else { ?>
<a href="http://www.53kf.com/" class="t" target="_blank">�ʺ�����</a>
<?php } ?><br/><br/>
��ʾ��ע����ȡ�Ŀͷ�����"...http://tb.53kf.com/kf.php?arg=<span class="f_red">123456</span>&style=0..."��<span class="f_red">123456</span>��Ϊ�ͷ��ʺ�
</td>
</tr>