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
<input type="hidden" name="post[mycatid]" value="<?php echo $mycatid;?>"/>
<div class="tt"><?php echo $action == 'add' ? '���' : '�޸�';?>��Ʒ</div>
<table cellpadding="2" cellspacing="1" class="tb">

<tr>
<td class="tl"><span class="f_red">*</span> ��Ʒ����</td>
<td><div id="catesch"></div><?php echo ajax_category_select('post[catid]', 'ѡ�����', $catid, $moduleid, 'size="2" style="height:120px;width:180px;"');?>
<br/><input type="button" value="��������" onclick="schcate(<?php echo $moduleid;?>);" class="btn"/> <span id="dcatid" class="f_red"></span></td>
</tr>

<tr>
<td class="tl"><span class="f_red">*</span> ��Ʒ����</td>
<td><input name="post[title]" type="text" id="title" size="60" value="<?php echo $title;?>"/> <?php echo level_select('post[level]', '����', $level);?> <?php echo dstyle('post[style]', $style);?> <br/><span id="dtitle" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> ��Ʒ�۸�</td>
<td>
<table cellpadding="4" cellspacing="1" bgcolor="#FFFFFF">
<tr bgcolor="#EFF5FB" align="center">
<td width="90">����</td>
<td width="90">�۸�</td>
<td width="90"></td>
<td width="120">����</td>
<td width="120">�۸�</td>
</tr>
<tr bgcolor="#FFFFFF" align="center">
<td><input name="post[step][a1]" type="text" size="10" value="<?php echo $a1;?>" id="a1"/></td>
<td><input name="post[step][p1]" type="text" size="10" value="<?php echo $p1;?>" id="p1" onblur="Dstep();"/></td>
<td></td>
<td id="p_a_1"></td>
<td id="p_p_1"></td>
</tr>
<tr bgcolor="#FFFFFF" align="center">
<td><input name="post[step][a2]" type="text" size="10" value="<?php echo $a2;?>" id="a2"/></td>
<td><input name="post[step][p2]" type="text" size="10" value="<?php echo $p2;?>" id="p2" onblur="Dstep();"/></td>
<td class="jt" onclick="Dstep()">���Ԥ��</td>
<td id="p_a_2"></td>
<td id="p_p_2"></td>
</tr>
<tr bgcolor="#FFFFFF" align="center">
<td><input name="post[step][a3]" type="text" size="10" value="<?php echo $a3;?>" id="a3"/></td>
<td><input name="post[step][p3]" type="text" size="10" value="<?php echo $p3;?>" id="p3" onblur="Dstep();"/></td>
<td></td>
<td id="p_a_3"></td>
<td id="p_p_3"></td>
</tr>
</table>
<span class="f_gray">&nbsp;��дʾ����<span class="c_p" title="����ۿ�" onclick="Dd('a1').value=1;Dd('p1').value=1000;Dd('a2').value=100;Dd('p2').value=900;Dd('a3').value=500;Dd('p3').value=800;Dstep();">���ݼ۸�</span> / <span class="c_p" title="����ۿ�" onclick="Dd('a1').value=1;Dd('p1').value=1000;Dd('a2').value=Dd('p2').value=Dd('a3').value=Dd('p3').value='';Dstep();">�ǽ��ݼ۸�</span></span>
</td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> ��Ʒ���</td>
<td><input name="post[amount]" type="text" size="10" value="<?php echo $amount;?>" id="amount"/> <input name="post[unit]" type="text" size="2" value="<?php echo $unit;?>" id="unit" title="������λ"/> <span id="damount" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ��ƷƷ��</td>
<td><input name="post[brand]" type="text" size="30" value="<?php echo $brand;?>"/></td>
</tr>
<?php if($CP) { ?>
<script type="text/javascript">
var property_catid = <?php echo $catid;?>;
var property_itemid = <?php echo $itemid;?>;
var property_admin = 1;
</script>
<script type="text/javascript" src="<?php echo DT_PATH;?>file/script/property.js"></script>
<tbody id="load_property" style="display:none;">
<tr><td></td><td></td></tr>
</tbody>
<?php } ?>
<?php echo $FD ? fields_html('<td class="tl">', '<td>', $item) : '';?>
<tr>
<td class="tl"><span class="f_red">*</span> ��ƷͼƬ</td>
<td>
	<input type="hidden" name="post[thumb]" id="thumb" value="<?php echo $thumb;?>"/>
	<input type="hidden" name="post[thumb1]" id="thumb1" value="<?php echo $thumb1;?>"/>
	<input type="hidden" name="post[thumb2]" id="thumb2" value="<?php echo $thumb2;?>"/>
	<table width="360">
	<tr align="center" height="120" class="c_p">
	<td width="120"><img src="<?php echo $thumb ? $thumb : DT_SKIN.'image/waitpic.gif';?>" width="100" height="100" id="showthumb" title="Ԥ��ͼƬ" alt="" onclick="if(this.src.indexOf('waitpic.gif') == -1){_preview(Dd('showthumb').src, 1);}else{Dalbum('',<?php echo $moduleid;?>,<?php echo $MOD['thumb_width'];?>,<?php echo $MOD['thumb_height'];?>, Dd('thumb').value, true);}"/></td>
	<td width="120"><img src="<?php echo $thumb1 ? $thumb1 : DT_SKIN.'image/waitpic.gif';?>" width="100" height="100" id="showthumb1" title="Ԥ��ͼƬ" alt="" onclick="if(this.src.indexOf('waitpic.gif') == -1){_preview(Dd('showthumb1').src, 1);}else{Dalbum(1,<?php echo $moduleid;?>,<?php echo $MOD['thumb_width'];?>,<?php echo $MOD['thumb_height'];?>, Dd('thumb1').value, true);}"/></td>
	<td width="120"><img src="<?php echo $thumb2 ? $thumb2 : DT_SKIN.'image/waitpic.gif';?>" width="100" height="100" id="showthumb2" title="Ԥ��ͼƬ" alt="" onclick="if(this.src.indexOf('waitpic.gif') == -1){_preview(Dd('showthumb2').src, 1);}else{Dalbum(2,<?php echo $moduleid;?>,<?php echo $MOD['thumb_width'];?>,<?php echo $MOD['thumb_height'];?>, Dd('thumb2').value, true);}"/></td>
	</tr>
	<tr align="center" class="c_p">
	<td><span onclick="Dalbum('',<?php echo $moduleid;?>,<?php echo $MOD['thumb_width'];?>,<?php echo $MOD['thumb_height'];?>, Dd('thumb').value, true);" class="jt"><img src="<?php echo $MODULE[2]['linkurl'];?>image/img_upload.gif" width="12" height="12" title="�ϴ�"/></span>&nbsp;&nbsp;<img src="<?php echo $MODULE[2]['linkurl'];?>image/img_select.gif" width="12" height="12" title="ѡ��" onclick="selAlbum('');"/>&nbsp;&nbsp;<span onclick="delAlbum('', 'wait');" class="jt"><img src="<?php echo $MODULE[2]['linkurl'];?>image/img_delete.gif" width="12" height="12" title="ɾ��"/></span></td>
	<td><span onclick="Dalbum(1,<?php echo $moduleid;?>,<?php echo $MOD['thumb_width'];?>,<?php echo $MOD['thumb_height'];?>, Dd('thumb1').value, true);" class="jt"><img src="<?php echo $MODULE[2]['linkurl'];?>image/img_upload.gif" width="12" height="12" title="�ϴ�"/></span>&nbsp;&nbsp;<img src="<?php echo $MODULE[2]['linkurl'];?>image/img_select.gif" width="12" height="12" title="ѡ��" onclick="selAlbum(1);"/>&nbsp;&nbsp;<span onclick="delAlbum(1, 'wait');" class="jt"><img src="<?php echo $MODULE[2]['linkurl'];?>image/img_delete.gif" width="12" height="12" title="ɾ��"/></span></td>
	<td><span onclick="Dalbum(2,<?php echo $moduleid;?>,<?php echo $MOD['thumb_width'];?>,<?php echo $MOD['thumb_height'];?>, Dd('thumb2').value, true);" class="jt"><img src="<?php echo $MODULE[2]['linkurl'];?>image/img_upload.gif" width="12" height="12" title="�ϴ�"/></span>&nbsp;&nbsp;<img src="<?php echo $MODULE[2]['linkurl'];?>image/img_select.gif" width="12" height="12" title="ѡ��" onclick="selAlbum(2);"/>&nbsp;&nbsp;<span onclick="delAlbum(2, 'wait');" class="jt"><img src="<?php echo $MODULE[2]['linkurl'];?>image/img_delete.gif" width="12" height="12" title="ɾ��"/></span></td>
	</tr>
	</table>
	<span id="dthumb" class="f_red"></span>
</td>
</tr>

<tr>
<td class="tl"><span class="f_red">*</span> ��Ʒ����</td>
<td><textarea name="post[content]" id="content" class="dsn"><?php echo $content;?></textarea>
<?php echo deditor($moduleid, 'content', $MOD['editor'], '100%', 350);?><br/><span id="dcontent" class="f_red"></span>
</td>
</tr>
<?php
if($MOD['swfu'] && DT_EDITOR == 'fckeditor') { 
	include DT_ROOT.'/api/swfupload/editor.inc.php';
}
?>
<tr>
<td class="tl"><span class="f_hid">*</span> ��ѡ����</td>
<td>
<table cellpadding="4" cellspacing="1" bgcolor="#FFFFFF">
<tr bgcolor="#EFF5FB" align="center">
<td>��������</td>
<td>����ֵ</td>
</tr>
<tr bgcolor="#FFFFFF" align="center">
<td><input name="post[n1]" type="text" size="10" value="<?php echo $n1;?>" id="n1"/></td>
<td><input name="post[v1]" type="text" size="40" value="<?php echo $v1;?>" id="v1"/></td>
</tr>
<tr bgcolor="#FFFFFF" align="center">
<td><input name="post[n2]" type="text" size="10" value="<?php echo $n2;?>" id="n2"/></td>
<td><input name="post[v2]" type="text" size="40" value="<?php echo $v2;?>" id="v2"/></td>
</tr>
<tr bgcolor="#FFFFFF" align="center">
<td><input name="post[n3]" type="text" size="10" value="<?php echo $n3;?>" id="n3"/></td>
<td><input name="post[v3]" type="text" size="40" value="<?php echo $v3;?>" id="v3"/></td>
</tr>
<tr bgcolor="#FFFFFF" align="center">
<td class="f_gray">���磺��ɫ</td>
<td class="f_gray">���磺��ɫ|��ɫ|��ɫ|��ɫ ���������|�ָ�</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> �˷�����</td>
<td>
<table cellpadding="4" cellspacing="1" bgcolor="#FFFFFF">
<tr bgcolor="#EFF5FB" align="center">
<td>���</td>
<td>Ĭ���˷�</td>
<td>����һ����Ʒ����</td>
<td>ѡ��ģ�� | <a href="<?php echo $MODULE[2]['linkurl'];?>express.php" class="t" target="_blank">����ģ��</a></td>
</tr>
<tr bgcolor="#FFFFFF" align="center">
<td><input name="post[express_name_1]" type="text" id="express_name_1" size="10" value="<?php echo $express_name_1;?>" /></td>
<td><input name="post[fee_start_1]" type="text" id="fee_start_1" size="5" value="<?php echo $fee_start_1;?>" /></td>
<td><input name="post[fee_step_1]" type="text" id="fee_step_1" size="5" value="<?php echo $fee_step_1;?>" /></td>
<td>
<select name="post[express_1]" id="express_1" onchange="Dexpress(1, this.options[selectedIndex].innerHTML);">
<option value="0">ѡ��ģ��</option>
<?php if(is_array($EXP)) { foreach($EXP as $v) { ?>
<option value="<?php echo $v['itemid'];?>"<?php if($express_1==$v['itemid']) { ?> selected<?php } ?>
><?php echo $v['title'];?>[<?php echo $v['express'];?>,<?php echo $v['fee_start'];?>,<?php echo $v['fee_step'];?>,<?php echo $v['note'];?>]</option>
<?php } } ?>
</select>
</td>
</tr>
<tr bgcolor="#FFFFFF" align="center">
<td><input name="post[express_name_2]" type="text" id="express_name_2" size="10" value="<?php echo $express_name_2;?>" /></td>
<td><input name="post[fee_start_2]" type="text" id="fee_start_2" size="5" value="<?php echo $fee_start_2;?>" /></td>
<td><input name="post[fee_step_2]" type="text" id="fee_step_2" size="5" value="<?php echo $fee_step_2;?>" /></td>
<td>
<select name="post[express_2]" id="express_2" onchange="Dexpress(2, this.options[selectedIndex].innerHTML);">
<option value="0">ѡ��ģ��</option>
<?php if(is_array($EXP)) { foreach($EXP as $v) { ?>
<option value="<?php echo $v['itemid'];?>"<?php if($express_2==$v['itemid']) { ?> selected<?php } ?>
><?php echo $v['title'];?>[<?php echo $v['express'];?>,<?php echo $v['fee_start'];?>,<?php echo $v['fee_step'];?>,<?php echo $v['note'];?>]</option>
<?php } } ?>
</select>
</td>
</tr>
<tr bgcolor="#FFFFFF" align="center">
<td><input name="post[express_name_3]" type="text" id="express_name_3" size="10" value="<?php echo $express_name_3;?>" /></td>
<td><input name="post[fee_start_3]" type="text" id="fee_start_3" size="5" value="<?php echo $fee_start_3;?>" /></td>
<td><input name="post[fee_step_3]" type="text" id="fee_step_3" size="5" value="<?php echo $fee_step_3;?>" /></td>
<td>
<select name="post[express_3]" id="express_3" onchange="Dexpress(3, this.options[selectedIndex].innerHTML);">
<option value="0">ѡ��ģ��</option>
<?php if(is_array($EXP)) { foreach($EXP as $v) { ?>
<option value="<?php echo $v['itemid'];?>"<?php if($express_3==$v['itemid']) { ?> selected<?php } ?>
><?php echo $v['title'];?>[<?php echo $v['express'];?>,<?php echo $v['fee_start'];?>,<?php echo $v['fee_step'];?>,<?php echo $v['note'];?>]</option>
<?php } } ?>
</select>
</td>
</tr>
</table>
<span class="f_gray">&nbsp;��дʾ����<span class="c_p" title="����ۿ�" onclick="Nexpress('0.00', '����');">����</span> / <span class="c_p" title="����ۿ�" onclick="Nexpress('500.00', '����');">��500����</span> / <span class="c_p" title="����ۿ�" onclick="Nexpress('10.00', '���');">���10Ԫ</span> / <span class="c_p" title="����ۿ�" onclick="Nexpress('500.00', '����');Dd('express_name_2').value = '���';Dd('fee_start_2').value = '10.00';">���10Ԫ����500����</span></span>
</td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ��������</td>
<td>
<select name="post[cod]" id="cod">
<option value="0"<?php if($cod == 0) echo ' selected';?>>��֧�ֻ�������</option>
<option value="1"<?php if($cod == 1) echo ' selected';?>>֧�ֻ��������֧������֧��</option>
<option value="2"<?php if($cod == 2) echo ' selected';?>>֧�ֻ������֧������֧��</option>
</select>
</td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> ��Ա��</td>
<td><input name="post[username]" type="text"  size="20" value="<?php echo $username;?>" id="username"/> <a href="javascript:_user(Dd('username').value);" class="t">[����]</a> <span id="dusername" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ��Ա�Ƽ���Ʒ</td>
<td>
<input type="radio" name="post[elite]" value="1" <?php if($elite == 1) echo 'checked';?>/> ��&nbsp;&nbsp;&nbsp;
<input type="radio" name="post[elite]" value="0" <?php if($elite == 0) echo 'checked';?>/> ��
</td>
</tr>

<tr>
<td class="tl"><span class="f_hid">*</span> ��Ϣ״̬</td>
<td>
<input type="radio" name="post[status]" value="3" <?php if($status == 3) echo 'checked';?>/> ͨ��
<input type="radio" name="post[status]" value="2" <?php if($status == 2) echo 'checked';?>/> ����
<input type="radio" name="post[status]" value="1" <?php if($status == 1) echo 'checked';?> onclick="if(this.checked) Dd('note').style.display='';"/> �ܾ�
<input type="radio" name="post[status]" value="4" <?php if($status == 4) echo 'checked';?>/> �¼�
<input type="radio" name="post[status]" value="0" <?php if($status == 0) echo 'checked';?>/> ɾ��
</td>
</tr>
<tr id="note" style="display:<?php echo $status==1 ? '' : 'none';?>">
<td class="tl"><span class="f_red">*</span> �ܾ�����</td>
<td><input name="post[note]" type="text"  size="40" value="<?php echo $note;?>"/></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ���ʱ��</td>
<td><input type="text" size="22" name="post[addtime]" value="<?php echo $addtime;?>"/></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> �������</td>
<td><input name="post[hits]" type="text" size="10" value="<?php echo $hits;?>"/></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> �����շ�</td>
<td><input name="post[fee]" type="text" size="5" value="<?php echo $fee;?>"/><?php tips('�������0��ʾ�̳�ģ�����ü۸�-1��ʾ���շ�<br/>����0�����ֱ�ʾ�����շѼ۸�');?>
</td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ����ģ��</td>
<td><?php echo tpl_select('show', $module, 'post[template]', 'Ĭ��ģ��', $template, 'id="template"');?><?php tips('���û��������Ҫ��һ�㲻��Ҫѡ��<br/>ϵͳ���Զ��̳з����ģ������');?></td>
</tr>
<?php if($MOD['show_html']) { ?>
<tr>
<td class="tl"><span class="f_hid">*</span> �Զ����ļ�·��</td>
<td><input type="text" size="50" name="post[filepath]" value="<?php echo $filepath;?>" id="filepath"/>&nbsp;<input type="button" value="�������" onclick="ckpath(<?php echo $moduleid;?>, <?php echo $itemid;?>);" class="btn"/>&nbsp;<?php tips('���԰���Ŀ¼���ļ� ���� destoon/b2b.html<br/>��ȷ��Ŀ¼���ļ����Ϸ��ҿ�д�룬�����������ʧ��');?>&nbsp; <span id="dfilepath" class="f_red"></span></td>
</tr>
<?php } ?>
</table>
<div class="sbt"><input type="submit" name="submit" value=" ȷ �� " class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value=" �� �� " class="btn"/></div>
</form>
<?php load('clear.js'); ?>
<?php if($action == 'add') { ?>
<form method="post" action="?">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<div class="tt">��ҳ�ɱ�</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_hid">*</span> Ŀ����ַ</td>
<td><input name="url" type="text" size="80" value="<?php echo $url;?>"/>&nbsp;&nbsp;<input type="submit" value=" �� ȡ " class="btn"/>&nbsp;&nbsp;<input type="button" value=" ������� " class="btn" onclick="Dwidget('?file=fetch', '�������');"/></td>
</tr>
</table>
</form>
<?php } ?>
<script type="text/javascript">
function _p() {
	if(Dd('tag').value) {
		Ds('reccate');
	}
}
function check() {
	var l;
	var f;
	f = 'catid_1';
	if(Dd(f).value == 0) {
		Dmsg('��ѡ����Ʒ����', 'catid', 1);
		return false;
	}
	f = 'title';
	l = Dd(f).value.length;
	if(l < 2) {
		Dmsg('��Ʒ��������2�֣���ǰ������'+l+'��', f);
		return false;
	}
	f = 'amount';
	l = Dd(f).value;
	if(l < 1) {
		Dmsg('����д���', f);
		return false;
	}
	f = 'thumb';
	l = Dd(f).value.length;
	if(l < 5) {
		Dmsg('���ϴ���һ����ƷͼƬ', f, 1);
		return false;
	}
	f = 'content';
	l = FCKLen();
	if(l < 5) {
		Dmsg('��ϸ˵������5�֣���ǰ������'+l+'��', f);
		return false;
	}
	f = 'username';
	l = Dd(f).value.length;
	if(l < 2) {
		Dmsg('����д��Ա��', f);
		return false;
	}
	if(Dd('v1').value) {
		if(!Dd('n1').value) {
			alert('����д��������');
			Dd('n1').focus();
			return false;
		}
		if(Dd('v1').value.indexOf('|') == -1) {
			alert(Dd('n1').value+'������Ҫ��������');
			Dd('v1').focus();
			return false;
		}
	}
	if(Dd('v2').value) {
		if(!Dd('n2').value) {
			alert('����д��������');
			Dd('n2').focus();
			return false;
		}
		if(Dd('v2').value.indexOf('|') == -1) {
			alert(Dd('n2').value+'������Ҫ��������');
			Dd('v2').focus();
			return false;
		}
	}
	if(Dd('v3').value) {
		if(!Dd('n3').value) {
			alert('����д��������');
			Dd('n3').focus();
			return false;
		}
		if(Dd('v3').value.indexOf('|') == -1) {
			alert(Dd('n3').value+'������Ҫ��������');
			Dd('v3').focus();
			return false;
		}
	}
	if(Dd('n1').value && (Dd('n1').value == Dd('n2').value || Dd('n1').value == Dd('n3').value)) {
		alert('�������Ʋ����ظ�');
		return false;
	}
	if(Dd('n2').value && (Dd('n2').value == Dd('n1').value || Dd('n2').value == Dd('n3').value)) {
		alert('�������Ʋ����ظ�');
		return false;
	}
	if(Dd('n3').value && (Dd('n3').value == Dd('n1').value || Dd('n3').value == Dd('n2').value)) {
		alert('�������Ʋ����ظ�');
		return false;
	}
	if(Dd('express_name_1').value && (Dd('express_name_1').value == Dd('express_name_2').value || Dd('express_name_1').value == Dd('express_name_3').value)) {
		alert('������Ʋ����ظ�');
		return false;
	}
	if(Dd('express_name_2').value && (Dd('express_name_2').value == Dd('express_name_1').value || Dd('express_name_2').value == Dd('express_name_3').value)) {
		alert('������Ʋ����ظ�');
		return false;
	}
	if(Dd('express_name_3').value && (Dd('express_name_3').value == Dd('express_name_1').value || Dd('express_name_3').value == Dd('express_name_2').value)) {
		alert('������Ʋ����ظ�');
		return false;
	}	
	<?php echo $FD ? fields_js() : '';?>
	<?php echo $CP ? property_js() : '';?>
	return Dstep();
}
function Dexpress(i, s) {
	if(Dd('express_'+i).value > 0) {
		var t1 = s.split('[');
		var t2 = t1[1].split(',');
		Dd('express_name_'+i).value = t2[0];
		Dd('fee_start_'+i).value = t2[1];
		Dd('fee_step_'+i).value = t2[2];
	} else {
		Dd('express_name_'+i).value = '';
		Dd('fee_start_'+i).value = '';
		Dd('fee_step_'+i).value = '';
	}
}

function Nexpress(i, s) {
	Dd('express_name_1').value = s;
	Dd('fee_start_1').value = i;
	Dd('fee_step_1').value = '0.00';
	$('#express_1').val(0);
	Dd('express_name_2').value = '';
	Dd('fee_start_2').value = '0.00';
	Dd('fee_step_2').value = '0.00';
	$('#express_2').val(0);
	Dd('express_name_3').value = '';
	Dd('fee_start_3').value = '0.00';
	Dd('fee_step_3').value = '0.00';
	$('#express_3').val(0);
}

function Dstep() {
	Dd('p_a_1').innerHTML=Dd('p_p_1').innerHTML=Dd('p_a_2').innerHTML=Dd('p_p_2').innerHTML=Dd('p_a_3').innerHTML=Dd('p_p_3').innerHTML='';
	var a1 = parseInt(Dd('a1').value);
	var p1 = parseFloat(Dd('p1').value);
	var a2 = parseInt(Dd('a2').value);
	var p2 = parseFloat(Dd('p2').value);
	var a3 = parseInt(Dd('a3').value);
	var p3 = parseFloat(Dd('p3').value);
	var u = Dd('unit').value;
	if(u.length < 1) Dd('unit').value = u = '��';
	var m = '<?php echo $DT['money_unit'];?>';
	if(!a1 || a1 < 1) {
		alert('�����������0');
		Dd('a1').value = '1';
		Dd('a1').focus();
		return false;
	}
	if(!p1 || p1 < 0.1) {
		alert('����д��Ʒ�۸�');
		Dd('p1').value = '';
		Dd('p1').focus();
		return false;
	}
	Dd('p_a_1').innerHTML = a1+u+'����';
	Dd('p_p_1').innerHTML = p1+m+'/'+u;
	if(a2 > 1 && p2 > 0.01) {
		if(a2 <= a1) {
			alert('�����������'+a1);
			Dd('a2').value = '';
			Dd('a2').focus();
			return false;
		}
		if(p2 >= p1) {
			alert('�۸����С��'+p1);
			Dd('p2').value = '';
			Dd('p2').focus();
			return false;
		}
		Dd('p_a_1').innerHTML = a1+'-'+a2+u;
		Dd('p_p_1').innerHTML = p1+m+'/'+u;
		Dd('p_a_2').innerHTML = '>'+a2+u;
		Dd('p_p_2').innerHTML = p2+m+'/'+u;
	}
	if(a3 > 1 && p3 > 0.01) {
		if(a3 <= a2) {
			alert('�����������'+a2);
			Dd('a3').value = '';
			Dd('a3').focus();
			return false;
		}
		if(p3 >= p2) {
			alert('�۸����С��'+p2);
			Dd('p3').value = '';
			Dd('p3').focus();
			return false;
		}
		Dd('p_a_2').innerHTML = (a2+1)+'-'+a3+u;
		Dd('p_p_2').innerHTML = p2+m+'/'+u;
		Dd('p_a_3').innerHTML = '>'+a3+u;
		Dd('p_p_3').innerHTML = p3+m+'/'+u;
	}
	return true;
}
</script>
<script type="text/javascript">Menuon(<?php echo $menuid;?>);</script>
<?php include tpl('footer');?>