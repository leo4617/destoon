<?php
defined('IN_DESTOON') or exit('Access Denied');
preg_match("/^[0-9a-z]{32,}$/i", $kf) or $kf = '';
?>
<tr id="kf_post_qq" style="display:none;">
<td class="tl">���߿ͷ��ʺ�</td>
<td class="tr">
<input type="text" name="kf[qq]" id="kf_qq" value="<?php echo $kf;?>" size="50"/>&nbsp;&nbsp;
<?php if($kf) { ?>
<a href="http://b.qq.com/" class="t" target="_blank">�ʺŹ���</a>
<?php } else { ?>
<a href="http://b.qq.com/" class="t" target="_blank">�ʺ�����</a>
<?php } ?><br/><br/>
��ʾ��ע����ȡ�Ŀͷ����롰...src="http://wpa.b.qq.com/cgi/wpa.php?key=<span class="f_red">XzgwMDAsTA2M18xNDAzMzhf08AwMDYxMDYzXw</span>">...����<span class="f_red">XzgwMDAsTA2M18xNDAzMzhf08AwMDYxMDYzXw</span>��Ϊ�ͷ��ʺ�
</td>
</tr>