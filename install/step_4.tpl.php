<?php
defined('IN_DESTOON') or exit('Access Denied');
include IN_ROOT.'/header.tpl.php';
?>
<div class="head">
	<div>
		<strong>�����ʼ������</strong><br/>
		�������ݿ����Ӳ�������������Ա�˺ż���������
	</div>
</div>
<div class="body">
<div>
<iframe id="db_tester" name="db_tester" style="display:none;"></iframe>
<form action="index.php" method="post" id="db_form" target="db_tester">
<input type="hidden" name="step" value="db_test"/>
<input type="hidden" name="tdb_host" id="tdb_host"/>
<input type="hidden" name="tdb_user" id="tdb_user"/>
<input type="hidden" name="tdb_pass" id="tdb_pass"/>
<input type="hidden" name="tdb_name" id="tdb_name"/>
<input type="hidden" name="ttb_pre" id="ttb_pre"/>
<input type="hidden" name="ttb_test" id="ttb_test"/>
</form>
<script type="text/javascript">
function test() {
	if($('db_host').value == '') {
		alert('����д���ݿ������');
		$('db_host').focus();
		return;
	}
	$('tdb_host').value = $('db_host').value;

	if($('db_user').value == '') {
		alert('����д���ݿ��û���');
		$('db_user').focus();
		return;
	}
	$('tdb_user').value = $('db_user').value;
	$('tdb_pass').value = $('db_pass').value;

	if($('db_name').value == '') {
		alert('����д���ݿ���');
		$('db_name').focus();
		return;
	}
	$('tdb_name').value = $('db_name').value;

	if($('tb_pre').value == '') {
		alert('����д���ݱ�ǰ׺');
		$('tb_pre').focus();
		return;
	}
	$('ttb_pre').value = $('tb_pre').value;
	$('db_form').submit();
}
function check() {
	if($('db_host').value == '') {
		alert('����д���ݿ������');
		$('db_host').focus();
		return false;
	}

	if($('db_user').value == '') {
		alert('����д���ݿ��û���');
		$('db_user').focus();
		return false;
	}

	if($('db_name').value == '') {
		alert('����д���ݿ���');
		$('db_name').focus();
		return false;
	}

	if($('tb_pre').value == '') {
		alert('����д���ݱ�ǰ׺');
		$('tb_pre').focus();
		return false;
	}

	if($('username').value.length < 4) {
		alert('��������Ա��������4λ');
		$('username').focus();
		return false;
	}

	if(!$('username').value.match(/^[a-z0-9]+$/)) {
		alert('��������Ա����ֻ��ʹ��Сд��ĸ(a-z)������(0-9)');
		$('username').focus();
		return false;
	}

	if($('password').value.length < 6) {
		alert('��������Ա��������6λ');
		$('password').focus();
		return false;
	}

	if($('email').value.length < 6) {
		alert('����д��������ԱEmail[��Ҫ]');
		$('email').focus();
		return false;
	}
	var dt_url = '<?php echo $DT_URL;?>';
	if($('url').value == '') {
		alert('��վ���ʵ�ַ����Ϊ�գ�����д��ǰ��վ���ʵ�ַ');
		$('url').focus();
		return false;
	}
	if(dt_url && $('url').value != dt_url) {
		if(!confirm('ȷ��Ҫ�ı���վ���ʵ�ַ?')) {
			$('url').value = dt_url;
		}
	}
	$('tip').style.display = '';
	$('submit').disabled = true;
	return true;
}
</script>
<form action="index.php" method="post" id="dform" onsubmit="return check();">
<input type="hidden" name="step" value="5"/>
<table cellpadding="2" cellspacing="1" width="100%">
<tr>
<td>���ݿ������</td>
<td><input name="db_host" type="text" id="db_host" value="<?php echo $CFG['db_host'];?>" style="width:150px"/></td>
<td colspan="2">ͨ��Ϊlocalhost�������IP��ַ</td>
</tr>
<tr>
<td>���ݿ��û���</td>
<td><input name="db_user" type="text" id="db_user" value="<?php echo $CFG['db_user'];?>" style="width:150px"/></td>
<td>���ݿ�����</td>
<td><input name="db_pass" type="text" id="db_pass" value="" style="width:150px"/></td>
</tr>
<tr>
<td>���ݿ���</td>
<td><input name="db_name" type="text" id="db_name" value="<?php echo $CFG['db_name'];?>" style="width:150px" onblur="$('ttb_test').value=0;test();void(0);"/></td>
<td>���ݱ�ǰ׺</td>
<td><input name="tb_pre" type="text" id="tb_pre" value="<?php echo $CFG['tb_pre'];?>" style="width:150px"/></td>
</tr>
<tr>
<td colspan="2"><span id="tip" style="color:blue;display:none;"><img src="load.gif" width="10" height="10" align="absmiddle"/> ��װ���ڽ��У����Ժ�...</span></td>
<td> </td>
<td><input type="button" value="�������ݿ�����" onclick="$('ttb_test').value=1;test();void(0);"/></td>
</tr>

<tr>
<td>��������Ա����</td>
<td><input name="username" type="text" id="username" value="destoon" style="width:150px"/></td>
<td colspan="2">ֻ��ʹ��Сд��ĸ(a-z)������(0-9)</td>
</tr>
<tr>
<td>��������Ա����</td>
<td><input name="password" type="text" id="password" value="" style="width:150px"/></td>
<td colspan="2">����ʹ��6λ�������֡���ĸ������������</td>
</tr>

<tr>
<td>��������Ա�ʼ�</td>
<td><input name="email" type="text" id="email" value="mail@yourdomain.com" style="width:150px"/></td>
<td colspan="2">����д��������Ա�ĵ����ʼ�</td>
</tr>
<tr>
<td>��վ���ʵ�ַ</td>
<td><input name="url" type="text" id="url" value="<?php echo $DT_URL;?>" style="width:150px"/></td>
<td colspan="2">ϵͳ�Զ�ʶ�����޴��������޸�</td>
</tr>

</table>

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
<input type="button" value="��һ��(P)" onclick="history.back(-1);"/>
<input type="submit" value="��һ��(N)" id="submit"/>
&nbsp;&nbsp;
<input type="button" value="ȡ��(C)" onclick="if(confirm('��ȷ��Ҫ�˳���װ����')) window.close();"/>
</form>
<?php
include IN_ROOT.'/footer.tpl.php';
?>