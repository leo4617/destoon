<?php
defined('DT_ADMIN') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<div class="tt">����ʼ�</div>
<form method="post" action="?" id="dform" onsubmit="return check();">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> �ʼ�����</td>
<td><span id="type_box"><?php echo type_select('mail', 1, 'typeid', '��ѡ�����', 0, 'id="typeid"');?></span> <a href="javascript:var type_item='mail',type_name='typeid',type_default='��ѡ�����',type_id=0,type_interval=setInterval('type_reload()',500);Dwidget('?file=type&item=mail', '���ķ���');"><img src="<?php echo $MODULE[2]['linkurl'];?>image/img_add.gif" width="12" height="12" title="�������"/></a> <span id="dtypeid" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> �ʼ�����</td>
<td><input type="text" size="60" name="title" id="title"/> <span id="dtitle" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> �ʼ�����</td>
<td><textarea name="content" id="content" class="dsn"></textarea><?php echo deditor($moduleid, 'content', 'Destoon', '100%', 350);?><br/><span id="dcontent" class="f_red"></span>
</td>
</tr>
</table>
<div class="sbt"><input type="submit" name="submit" value=" ȷ �� " class="btn">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value=" �� �� " class="btn"/></div>
</form>
<?php load('clear.js'); ?>
<script type="text/javascript">
function check() {
	var l;
	var f;
	f = 'typeid';
	l = Dd(f).value;
	if(l == 0) {
		Dmsg('��ѡ���ʼ�����', f);
		return false;
	}
	f = 'title';
	l = Dd(f).value.length;
	if(l < 2) {
		Dmsg('��������2�֣���ǰ������'+l+'��', f);
		return false;
	}
	f = 'content';
	l = FCKLen();
	if(l < 5 ) {
		Dmsg('��������5�֣���ǰ������'+l+'��', f);
		return false;
	}
	return true;
}
</script>
<script type="text/javascript">Menuon(0);</script>
<?php include tpl('footer');?>