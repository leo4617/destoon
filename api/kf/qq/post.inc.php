<?php
defined('IN_DESTOON') or exit('Access Denied');
$kf_qq = preg_match("/^[0-9a-z]{32,}$/i", $kf) ? $kf : '';
?>
<tr id="kf_post_qq" style="display:none;">
<td class="tl">���߿ͷ��ʺ�</td>
<td class="tr">
<input type="text" name="kf[qq]" id="kf_qq" value="<?php echo $kf_qq;?>" size="50"/>&nbsp;&nbsp;
<?php if($kf_qq) { ?>
<a href="http://b.qq.com/" class="t" target="_blank">�ʺŹ���</a>
<?php } else { ?>
<a href="http://b.qq.com/" class="t" target="_blank">�ʺ�����</a>
<?php } ?><br/><br/>
��ʾ��ע����ȡ�Ŀͷ����롰...src="http://wpa.b.qq.com/cgi/wpa.php?key=<span class="f_red">XzgwMDAsTA2M18xNDAzMzhf08AwMDYxMDYzXw</span>">...����<span class="f_red">XzgwMDAsTA2M18xNDAzMzhf08AwMDYxMDYzXw</span>��Ϊ�ͷ��ʺ�
</td>
</tr>