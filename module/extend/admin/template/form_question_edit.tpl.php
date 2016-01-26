<?php
defined('DT_ADMIN') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form method="post" action="?" id="dform" onsubmit="return check();">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="job" value="<?php echo $job;?>"/>
<input type="hidden" name="fid" value="<?php echo $fid;?>"/>
<input type="hidden" name="qid" value="<?php echo $qid;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<div class="tt"><?php echo $job=='add' ? '���' : '�޸�';?>ѡ��</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> ѡ������</td>
<td><input name="post[name]" type="text"  size="30" id="name" value="<?php echo $name;?>"/> <span id="dname" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> ��ӷ�ʽ</td>
<td>
<?php
foreach($TYPE as $k=>$v) { 
?>
<input type="radio" name="post[type]" value="<?php echo $k;?>" id="t_<?php echo $k;?>" onclick="c(<?php echo $k;?>)" <?php echo $k == $type ? 'checked' : '';?>/><label for="t_<?php echo $k;?>"> <?php echo $v;?></label>
<?php }?>
</td>
</tr>
<tr style="display:">
<td class="tl" id="v_l"><span class="f_hid">*</span> Ĭ��ֵ</td>
<td><textarea name="post[value]" style="width:98%;height:30px;overflow:visible;" id="value"><?php echo $value;?></textarea><br/><span id="v_r"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ��������</td>
<td><input type="text" name="post[required]" id="required" size="20" value="<?php echo $required;?>"/><br/>
ֱ�������ֱ�ʾ������С����,���Ҫ���Ƴ��ȷ�Χ����6��20֮��,����д 6-20<br/>
�����б�ѡ��(select) �͵�ѡ��(radio),���0���ֱ�ʾ��ѡ<br/>
���ڶ�ѡ��(checkbox),���0���ֱ�ʾ��ѡ���� ��ȷ�Χ��ʾ��ѡ������Χ<br/>
</td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ��չ����</td>
<td><textarea name="post[extend]" style="width:98%;height:30px;overflow:visible;"><?php echo $extend;?></textarea></td>
</tr>
</table>
<div class="sbt"><input type="submit" name="submit" value=" ȷ �� " class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" value=" �� �� " class="btn" onclick="window.parent.location.reload();"/></div>
</form>
<script type="text/javascript">
function c(id) {
	if(id == 2 || id == 3 || id == 4) {
		Dd('v_l').innerHTML = '<span class="f_red">*</span> ��ѡֵ';
		Dd('v_r').innerHTML = '���ѡ���� | �ָ������� ��ɫ|��ɫ(*)|��ɫ (*)��ʾĬ��ѡ��<br/>���ڸ�ѡ�͵�ѡ�����ѡ����Ϊ������������ʾһ�������';
	} else if(id == 0 || id == 1) {
		Dd('v_l').innerHTML = '<span class="f_hid">*</span> Ĭ��ֵ';
		Dd('v_r').innerHTML = '';
	}
}
c(<?php echo $type;?>);
function r(id) {
	if(id == 'notnull') {
		Dd('required').value = '1';
	} else if(id == 'numeric') {
		Dd('required').value = '[0-9]{1,}';
	} else if(id == 'letter') {
		Dd('required').value = '[a-z]{1,}';
	} else if(id == 'nl') {
		Dd('required').value = '[a-z0-9]{1,}';
	} else if(id == 'email') {
		Dd('required').value = 'is_email';
	} else if(id == 'date') {
		Dd('required').value = 'is_date';
	} else {
		Dd('required').value = '';
	}
}
function check() {
	var l;
	var f;
	f = 'name';
	l = Dd(f).value.length;
	if(l < 1) {
		Dmsg('����дѡ������', f);
		return false;
	}
	return true;
}
</script>
<script type="text/javascript">Menuon(<?php echo $menuid;?>);</script>
<?php include tpl('footer');?>