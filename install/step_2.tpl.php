<?php
defined('IN_DESTOON') or exit('Access Denied');
include IN_ROOT.'/header.tpl.php';
?>
<div class="head">
	<div>
		<strong>���ϵͳ���л���</strong><br/>
		��鵱ǰ���������������Ƿ�֧��DESTOON B2B��������
	</div>
</div>
<div class="body">
<div>
	<table cellpadding="4" cellspacing="1" width="100%" bgcolor="#F1F1F1">
	<tr bgcolor="#C0C0C0" align="center">
	<td>�����Ŀ</td>
	<td>��ǰ����</td>
	<td>Ҫ�󻷾�</td>
	<td>�Ƽ�����</td>
	<td>�����</td>
	</tr>
	<tr bgcolor="#D4D0C8" align="center">
	<td>PHP�汾</td>
	<td><?php echo $PHP_VERSION;?></td>
	<td>4.3.0������</td>
	<td>5.0.0������</td>
	<td><?php echo $php_pass ? '<span style="color:blue;">ͨ��</span>' : '<span style="color:red;">PHP�汾����</span>';?></td>
	</tr>
	<tr bgcolor="#D4D0C8" align="center">
	<td>MySQL�汾</td>
	<td><?php echo $PHP_MYSQL;?></td>
	<td>4.0.0������</td>
	<td>5.0.0������</td>
	<td><?php echo $mysql_pass ? '<span style="color:blue;">ͨ��</span>' : '<span style="color:red;">MySQL�汾����</span>';?></td>
	</tr>
	<tr bgcolor="#D4D0C8" align="center">
	<td>GD��</td>
	<td><?php echo $PHP_GD;?></td>
	<td>jpg gif png</td>
	<td>jpg gif png</td>
	<td><?php echo $gd_pass ? '<span style="color:blue;">ͨ��</span>' : '<span style="color:red;">�޷�����ͼƬ</span>';?></td>
	</tr>
	<tr bgcolor="#D4D0C8" align="center">
	<td>URL���ļ�</td>
	<td><?php echo $PHP_URL ? '֧��' : '��֧��';?></td>
	<td>֧��</td>
	<td>֧��</td>
	<td><?php echo $url_pass ? '<span style="color:blue;">ͨ��</span>' : '<span style="color:red;">���鿪��</span>';?></td>
	</tr>
	</table>
	<br/>
	<br/>
	<?php
	if($pass) {
		echo '&nbsp;&nbsp;��������������ͨ����⣬��� ��һ��(N) ������װ';
	} else {
		echo '&nbsp;&nbsp;<span style="color:red;">��������������δͨ����⣬��װ�޷�����!</span> <br/><br/>&nbsp;&nbsp;�밴��ʾ���ú÷������������������б���װ�򵼡�';
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
<input type="hidden" name="step" value="3"/>
<input type="button" value="��һ��(P)" onclick="history.back(-1);"/>
<input type="submit" value="��һ��(N)"<?php if(!$pass) echo ' disabled';?>/>
&nbsp;&nbsp;
<input type="button" value="ȡ��(C)" onclick="if(confirm('��ȷ��Ҫ�˳���װ����')) window.close();"/>
</form>
<?php
include IN_ROOT.'/footer.tpl.php';
?>