<?php
defined('IN_DESTOON') or exit('Access Denied');
include IN_ROOT.'/header.tpl.php';
?>
<div class="head">
	<div>
		<strong>��װ���ڽ���</strong><br/>
		��װ���ڽ��У����Ժ�...
	</div>
</div>
<div class="body">
<div>
<textarea style="width:515px;height:215px;" id="msgbox"></textarea>
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

<form action="index.php" method="post" id="dform">
<input type="hidden" name="step" value="6"/>
<input type="hidden" name="url" value="<?php echo $url;?>"/>
<input type="hidden" name="username" value="<?php echo $username;?>"/>
<input type="hidden" name="password" value="<?php echo $password;?>"/>
<input type="hidden" name="step" value="6"/>
<input type="button" value="��һ��(P)" onclick="history.back(-1);" disabled/>
<input type="submit" value="��һ��(N)"/>
&nbsp;&nbsp;
<input type="button" value="ȡ��(C)" onclick="if(confirm('��ȷ��Ҫ�˳���װ����')) window.close();"/>
</form>
<?php
include IN_ROOT.'/footer.tpl.php';
?>
<script type="text/javascript">
$('msgbox').value = '';
<?php
$time = 400;
foreach($msgs as $v) {
?>
setTimeout("$('msgbox').value += ' # <?php echo $v;?>\\n';", <?php echo $time;?>);
<?php
	$time += 200;
}
$time += 200;
?>
setTimeout("$('dform').submit();", <?php echo $time;?>);
</script>