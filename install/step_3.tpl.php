<?php
defined('IN_DESTOON') or exit('Access Denied');
include IN_ROOT.'/header.tpl.php';
?>
<div class="head">
	<div>
		<strong>���Ŀ¼/�ļ�����</strong><br/>
		�����Ҫд������Ŀ¼/�ļ��Ƿ���д����Ȩ��
	</div>
</div>
<div class="body">
<div>
	<table cellpadding="4" cellspacing="1" width="100%" bgcolor="#F1F1F1">
	<tr bgcolor="#C0C0C0" align="center">
	<td width="15%">Ŀ¼/�ļ�</td>
	<td width="8%">����</td>
	<td width="15%">Ŀ¼/�ļ�</td>
	<td width="8%">����</td>
	<td width="15%">Ŀ¼/�ļ�</td>
	<td width="8%">����</td>
	</tr>
	<?php foreach($FILES as $k=>$v) { ?>
	<?php if($k%3 == 0) { ?>
	<tr bgcolor="#D4D0C8" align="center">
	<?php } ?>
	<td align="left">&nbsp;<?php echo $v['name'];?></td>
	<td><?php echo $v['write'] ? '<span style="color:blue;">��д</span>' : '<span style="color:red;">����д</span>';?></td>
	<?php if($k%3 == 2) { ?>
	</tr>
	<?php } ?>
	<?php } ?>
	</table>
	<br/>
	<?php
	if($pass) {
		echo '&nbsp;&nbsp;Ŀ¼/�ļ�����ͨ����⣬��� ��һ��(N) ������װ';
	} else {
		echo '<br/>&nbsp;&nbsp;<span style="color:red;">Ŀ¼/�ļ�����δͨ����⣬��װ�޷�����!</span> <br/><br/>&nbsp;&nbsp;';
		if($ISWIN) {
			echo '�����ò���дĿ¼/�ļ�(����Ŀ¼���ļ�)д��Ȩ��';
		} else {
			echo '�����ò���дĿ¼/�ļ�(����Ŀ¼���ļ�)����Ϊ��д('.sprintf('%o', DT_CHMOD).')';
		}
	}
	?>
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
<input type="hidden" name="step" value="4"/>
<input type="button" value="��һ��(P)" onclick="history.back(-1);"/>
<input type="submit" value="��һ��(N)"<?php if(!$pass) echo ' disabled';?>/>
&nbsp;&nbsp;
<input type="button" value="ȡ��(C)" onclick="if(confirm('��ȷ��Ҫ�˳���װ����')) window.close();"/>
</form>
<?php
include IN_ROOT.'/footer.tpl.php';
?>