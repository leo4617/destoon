<?php
defined('DT_ADMIN') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form method="post" action="?" id="dform" onsubmit="return check();">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<div class="tt"><?php echo $action == 'add' ? '���' : '�޸�';?>��Ȧ</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> ��������</td>
<td><?php echo $_admin == 1 ? category_select('post[catid]', 'ѡ�����', $catid, $moduleid) : ajax_category_select('post[catid]', 'ѡ�����', $catid, $moduleid);?> <span id="dcatid" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> ��Ȧ����</td>
<td><input name="post[title]" type="text" id="title" size="20" value="<?php echo $title;?>"/> <?php echo level_select('post[level]', '����', $level);?> <?php echo dstyle('post[style]', $style);?> <span id="dtitle" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> ��Ȧͼ��</td>
<td><input name="post[thumb]" id="thumb" type="text" size="60" value="<?php echo $thumb;?>"/>&nbsp;&nbsp;<span onclick="Dthumb(<?php echo $moduleid;?>,128,128, Dd('thumb').value);" class="jt">[�ϴ�]</span>&nbsp;&nbsp;<span onclick="_preview(Dd('thumb').value);" class="jt">[Ԥ��]</span>&nbsp;&nbsp;<span onclick="Dd('thumb').value='';" class="jt">[ɾ��]</span><span id="dthumb" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ��Ȧ���</td>
<td><textarea name="post[content]" id="content" style="width:90%;height:80px;"><?php echo $content;?></textarea><br/><span id="dcontent" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ��Ȧ��ʽ</td>
<td>
<input type="radio" name="post[join_type]" value="0" <?php if($join_type == 0) echo 'checked';?>/> ����
<input type="radio" name="post[join_type]" value="1" <?php if($join_type == 1) echo 'checked';?>/> ����
</td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> �����Ȧ</td>
<td>
<input type="radio" name="post[list_type]" value="0" <?php if($list_type == 0) echo 'checked';?>/> ����
<input type="radio" name="post[list_type]" value="1" <?php if($list_type == 1) echo 'checked';?>/> ��Ա
</td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> �������</td>
<td>
<input type="radio" name="post[show_type]" value="0" <?php if($show_type == 0) echo 'checked';?>/> ����
<input type="radio" name="post[show_type]" value="1" <?php if($show_type == 1) echo 'checked';?>/> ��Ա
</td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ��������</td>
<td>
<input type="radio" name="post[post_type]" value="0" <?php if($post_type == 0) echo 'checked';?>/> ����
<input type="radio" name="post[post_type]" value="1" <?php if($post_type == 1) echo 'checked';?>/> ��Ա
</td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> �ظ�����</td>
<td>
<input type="radio" name="post[reply_type]" value="0" <?php if($reply_type == 0) echo 'checked';?>/> ����
<input type="radio" name="post[reply_type]" value="1" <?php if($reply_type == 1) echo 'checked';?>/> ��Ա
</td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> ������</td>
<td><input name="post[username]" type="text"  size="20" value="<?php echo $username;?>" id="username"/> <a href="javascript:_user(Dd('username').value);" class="t">[����]</a> <span id="dusername" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ����</td>
<td><input name="post[manager]" type="text"  size="60" value="<?php echo $manager;?>" id="manager"/><?php tips('����д������Ա�ǳƣ����������|�ָ�');?> <span id="dmanager" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ��Ȧ״̬</td>
<td>
<input type="radio" name="post[status]" value="3" <?php if($status == 3) echo 'checked';?>/> ͨ��
<input type="radio" name="post[status]" value="2" <?php if($status == 2) echo 'checked';?>/> ����
<input type="radio" name="post[status]" value="1" <?php if($status == 1) echo 'checked';?> onclick="if(this.checked) Dd('note').style.display='';"/> �ܾ�
<input type="radio" name="post[status]" value="0" <?php if($status == 0) echo 'checked';?>/> ɾ��
</td>
</tr>
<tr id="note" style="display:<?php echo $status==1 ? '' : 'none';?>">
<td class="tl"><span class="f_red">*</span> �ܾ�����</td>
<td><input name="post[note]" type="text"  size="40" value="<?php echo $note;?>"/></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ����ʱ��</td>
<td><input type="text" size="22" name="post[addtime]" value="<?php echo $addtime;?>"/></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ��������</td>
<td><textarea name="post[reason]" id="reason" style="width:90%;height:80px;"><?php echo $reason;?></textarea><br/><span id="dreason" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ��Ȧģ��</td>
<td><?php echo tpl_select('group', $module, 'post[template]', 'Ĭ��ģ��', $template, 'id="template"');?></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ����ģ��</td>
<td><?php echo tpl_select('show', $module, 'post[show_template]', 'Ĭ��ģ��', $show_template, 'id="show_template"');?></td>
</tr>
<?php if($MOD['list_html'] && $action == 'edit') { ?>
<tr>
<td class="tl"><span class="f_hid">*</span> ��̬Ŀ¼</td>
<td><input type="text" size="22" name="post[filepath]" value="<?php echo $filepath;?>"/> <?php echo tips('��Ӣ�ġ����֡��л��ߡ��»��ߡ�б�ߣ�����Ȧ��ص�html�ļ��������ڴ�Ŀ¼');?></td>
</tr>
<?php } ?>
</table>
<div class="sbt"><input type="submit" name="submit" value=" ȷ �� " class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value=" �� �� " class="btn"/></div>
</form>
<?php load('clear.js'); ?>
<script type="text/javascript">
function check() {
	var l;
	var f;
	f = 'catid_1';
	if(Dd(f).value == 0) {
		Dmsg('��ѡ����������', 'catid', 1);
		return false;
	}
	f = 'title';
	l = Dd(f).value.length;
	if(l < 2) {
		Dmsg('����д��Ȧ����', f);
		return false;
	}
	f = 'thumb';
	l = Dd(f).value.length;
	if(l < 10) {
		Dmsg('���ϴ���ȦLOGO', f);
		return false;
	}
	f = 'username';
	l = Dd(f).value.length;
	if(l < 2) {
		Dmsg('����д������', f);
		return false;
	}
	return true;
}
</script>
<script type="text/javascript">Menuon(<?php echo $menuid;?>);</script>
<?php include tpl('footer');?>