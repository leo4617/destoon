<?php
defined('IN_DESTOON') or exit('Access Denied');
include IN_ROOT.'/header.tpl.php';
?>
<div class="head">
	<div>
		<strong>��ʾ��Ϣ</strong><br/>
		����Դ���ʾ��Ϣ�����ʣ������www.destoon.com
	</div>
</div>
<div class="body">
<div>
	<br/><br/>
	<fieldset>
		<legend>&nbsp;��ʾ��Ϣ&nbsp;</legend>
		<div><?php echo $msg;?></div>
	</fieldset>
	<br/><br/>
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
<input type="button" value=" ���� " onclick="history.back(-1);"/>&nbsp;
<input type="button" value=" �ر� " onclick="window.close();"/>&nbsp;
<?php
include IN_ROOT.'/footer.tpl.php';
?>