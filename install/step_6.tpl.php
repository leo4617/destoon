<?php
defined('IN_DESTOON') or exit('Access Denied');
include IN_ROOT.'/header.tpl.php';
?>
<div class="head">
	<div>
		<strong>ϵͳ��װ�ɹ�</strong><br/>
		��ϲ!���Ѿ��ɹ���װDESTOON B2B��վ����ϵͳ
	</div>
</div>
<div class="body">
<div>
	<strong style="font-size:14px;">��ϲ�����Ѿ��ɹ���װDESTOON B2B��վ����ϵͳ</strong><br/><br/>
	<fieldset>
	<legend>&nbsp;��վ������Ϣ&nbsp;</legend>
	<table cellpadding="2" cellspacing="2" width="100%">
	<tr>
	<td width="100">&nbsp;&nbsp;��վ��̨��ַ��</td>
	<td><a href="<?php echo $url;?>admin.php"><?php echo $url;?>admin.php</a></td>
	</tr>
	<tr>
	<td>&nbsp;&nbsp;����Ա������</td>
	<td><?php echo $username;?> </td>
	</tr>
	<tr>
	<td >&nbsp;&nbsp;����Ա���룺  </td>
	<td><?php echo $password;?> (�����Ʊ���)</td>
	</tr>
	</table>
	</fieldset>
	<br/><br/>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ǳ���лѡ��DESTOON B2B��Ʒ<br/><br/>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����Ʒ�����Ϣ�������ע <a href="http://www.destoon.com" target="_blank">www.destoon.com</a>
</div>
</div>
<div class="foot">
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="215">
<div class="progress">
<div id="progress"></div>
</div>
</td>
<td id="percent"></td>
<td height="40" align="right">
<input type="button" value="��¼��̨" onclick="window.location='../admin.php';"/>
<input type="button" value="��վ��ҳ" onclick="window.location='../';"/>
<?php
include IN_ROOT.'/footer.tpl.php';
?>