<?php
defined('IN_DESTOON') or exit('Access Denied');
$kf_qiao = preg_match("/^[0-9a-z]{32}$/", $kf) ? $kf : '';
?>
<tr id="kf_post_qiao" style="display:none;">
<td class="tl">���߿ͷ��ʺ�</td>
<td class="tr">
<input type="text" name="kf[qiao]" id="kf_qiao" value="<?php echo $kf_qiao;?>" size="40"/>&nbsp;&nbsp;
<?php if($kf_qiao) { ?>
<a href="http://qiao.baidu.com/" class="t" target="_blank">�ʺŹ���</a>
<?php } else { ?>
<a href="http://qiao.baidu.com/" class="t" target="_blank">�ʺ�����</a>
<?php } ?><br/><br/>
��ʾ��ע����ȡ�Ŀͷ����롰...hm.baidu.com/h.js%3F<span class="f_red">321c361fa45809b610d5ec4ae9a392c2</span>' type=...����<span class="f_red">321c361fa45809b610d5ec4ae9a392c2</span>��Ϊ�ͷ��ʺ�
</td>
</tr>