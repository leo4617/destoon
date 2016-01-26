<?php
defined('DT_ADMIN') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form method="post" action="?" id="dform" onsubmit="return check();">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<input type="hidden" name="post[type]" value="<?php echo $type;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<div class="tt"><?php echo $itemid ? '�޸�' : '���';?>����</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> ��������</td>
<td><input name="post[title]" type="text" id="title" size="50" value="<?php echo $title;?>"/><span id="dtitle" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> �ű��ļ�</td>
<td>
<select name="post[name]" id="name">
<?php
$F = glob(DT_ROOT.'/api/cron/*.inc.php');
foreach($F as $f) {
	$f = substr(basename($f), 0, -8);
	if(check_name($f)) echo '<option value="'.$f.'"'.($name == $f ? ' selected' : '').'>api/cron/'.$f.'.inc.php</option>';
}
?>
</select>
<span id="dname" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ִ�з�ʽ</td>
<td>
<input type="radio" name="post[run]" value="0"  <?php if(!$run){ ?>checked <?php } ?> onclick="Ds('run_0');Dh('run_1');"/> ���ִ��&nbsp;&nbsp;
<input type="radio" name="post[run]" value="1"  <?php if($run){ ?>checked <?php } ?> onclick="Dh('run_0');Ds('run_1');"/> ÿ��ִ��
</td>
</tr>
<tr id="run_0" style="display:<?php if($run) echo 'none';?>">
<td class="tl"><span class="f_hid">*</span> ���ʱ��</td>
<td><input name="post[minute]" type="text" id="minute" size="5" value="<?php echo $minute;?>"/> ���� &nbsp;
<select onchange="Dd('minute').value=this.value;">
<option value="">���ѡ��</option>
<option value="10">10����</option>
<option value="30">��Сʱ</option>
<option value="60">һСʱ</option>
<option value="360">��Сʱ</option>
<option value="720">ʮ��Сʱ</option>
<option value="1440">һ��</option>
<option value="10080">һ��</option>
<option value="43200">һ��</option>
</select>&nbsp;<span id="dminute" class="f_red"></span>
</td>
</tr>
<tr id="run_1" style="display:<?php if(!$run) echo 'none';?>">
<td class="tl"><span class="f_hid">*</span> ִ��ʱ��</td>
<td>
<select name="post[hour]" id="hour">
<?php
for($i = 0; $i < 24; $i++) {
	echo '<option value="'.$i.'"'.($hour == $i ? ' selected' : '').'>'.($i < 10 ? '0'.$i : $i).'��</option>';
}
?>
</select>
<select name="post[mint]" id="mint">
<?php
for($i = 0; $i < 60; $i++) {
	echo '<option value="'.$i.'"'.($mint == $i ? ' selected' : '').'>'.($i < 10 ? '0'.$i : $i).'��</option>';
}
?>
</select>
<span id="dhour" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ����״̬</td>
<td>
<input type="radio" name="post[status]" value="0"  <?php if(!$status){ ?>checked <?php } ?>/> ����&nbsp;&nbsp;
<input type="radio" name="post[status]" value="1"  <?php if($status){ ?>checked <?php } ?>/> ����
</td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ��ע˵��</td>
<td><textarea name="post[note]" style="width:300px;height:40px;"><?php echo $note;?></textarea></td>
</tr>
</table>
<div class="sbt"><input type="submit" name="submit" value="ȷ ��" class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="�� ��" class="btn"/></div>
</form>
<script type="text/javascript">
function check() {
	if(Dd('title').value.length < 2) {
		Dmsg('����д��������', 'domain');
		return false;
	}
	return true;
}
</script>
<script type="text/javascript">Menuon(0);</script>
<?php include tpl('footer');?>