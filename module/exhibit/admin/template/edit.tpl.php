<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form method="post" action="?" id="dform" onsubmit="return check();">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<div class="tt"><?php echo $tname;?></div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> ��������</td>
<td><?php echo category_select('post[catid]', 'ѡ�����', $catid, $moduleid);?> <span id="dcatid" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> <?php echo $MOD['name'];?>����</td>
<td><input name="post[title]" type="text" id="title" size="60" value="<?php echo $title;?>"/> <?php echo level_select('post[level]', '����', $level, 'id="level"');?> <?php echo dstyle('post[style]', $style);?> <br/><span id="dtitle" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> <?php echo $MOD['name'];?>����</td>
<td><?php echo dcalendar('post[fromtime]', $fromtime);?> �� <?php echo dcalendar('post[totime]', $totime);?> <span id="dtime" class="f_red"></span></td>
</tr>

<tr>
<td class="tl"><span class="f_hid">*</span> ���ڵ���</td>
<td><?php echo ajax_area_select('post[areaid]', '��ѡ��', $areaid);?></td>
</tr>

<tr>
<td class="tl"><span class="f_hid">*</span> չ������</td>
<td><input name="post[city]" type="text" id="city" size="10" value="<?php echo $city;?>"/> <span id="dcity" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> չ����ַ</td>
<td><input name="post[address]" type="text" id="address" size="60" value="<?php echo $address;?>"/> <span id="daddress" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> չ������</td>
<td><input name="post[hallname]" type="text" id="hallname" size="40" value="<?php echo $hallname;?>"/> <span id="dhallname" class="f_red"></span></td>
</tr>
<?php if($CP) { ?>
<script type="text/javascript">
var property_catid = <?php echo $catid;?>;
var property_itemid = <?php echo $itemid;?>;
var property_admin = 1;
</script>
<script type="text/javascript" src="<?php echo DT_PATH;?>file/script/property.js"></script>
<?php if($itemid) { ?><script type="text/javascript">setTimeout("load_property()", 1000);</script><?php } ?>
<tbody id="load_property" style="display:none;">
<tr><td></td><td></td></tr>
</tbody>
<?php } ?>
<?php echo $FD ? fields_html('<td class="tl">', '<td>', $item) : '';?>
<tr>
<td class="tl"><span class="f_hid">*</span> <?php echo $MOD['name'];?>˵��</td>
<td><textarea name="post[content]" id="content" class="dsn"><?php echo $content;?></textarea>
<?php echo deditor($moduleid, 'content', $MOD['editor'], '98%', 350);?><span id="dcontent" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> <?php echo $MOD['name'];?>��ע</td>
<td><textarea name="post[remark]" style="width:90%;height:45px;"><?php echo $remark;?></textarea></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ����ͼƬ</td>
<td><input name="post[thumb]" id="thumb" type="text" size="60" value="<?php echo $thumb;?>"/>&nbsp;&nbsp;<span onclick="Dthumb(<?php echo $moduleid;?>,Dd('level').value==2 ? 300 : <?php echo $MOD['thumb_width'];?>,Dd('level').value==2 ? 225 : <?php echo $MOD['thumb_height'];?>, Dd('thumb').value);" class="jt">[�ϴ�]</span>&nbsp;&nbsp;<span onclick="_preview(Dd('thumb').value);" class="jt">[Ԥ��]</span>&nbsp;&nbsp;<span onclick="Dd('thumb').value='';" class="jt">[ɾ��]</span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> ���쵥λ</td>
<td><input name="post[sponsor]" id="sponsor" type="text" size="60" value="<?php echo $sponsor;?>"/> <span id="dsponsor" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> �а쵥λ</td>
<td><input name="post[undertaker]" type="text" size="60" value="<?php echo $undertaker;?>" /></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> �ٷ���վ</td>
<td><input name="post[homepage]" type="text" size="60" value="<?php echo $homepage;?>" /></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> ��ϵ��</td>
<td><input name="post[truename]" id="truename" type="text" size="10" value="<?php echo $truename;?>" /> <span id="dtruename" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> ��ϵ�绰</td>
<td><input name="post[telephone]" id="telephone" type="text" size="30" value="<?php echo $telephone;?>" /> <span id="dtelephone" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ��ϵ�ֻ�</td>
<td><input name="post[mobile]" id="mobile" type="text" size="30" value="<?php echo $mobile;?>" /> <span id="dmobile" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ͨѶ��ַ</td>
<td><input name="post[addr]" id="addr" type="text" size="60" value="<?php echo $addr;?>" /></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ��������</td>
<td><input name="post[postcode]" id="postcode" type="text" size="10" value="<?php echo $postcode;?>" /></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ��ϵ����</td>
<td><input name="post[fax]" id="fax" type="text" size="30" value="<?php echo $fax;?>" /></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> �����ʼ�</td>
<td><input name="post[email]" id="email" type="text" size="30" value="<?php echo $email;?>" /></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ��ϵMSN</td>
<td><input name="post[msn]" id="msn" type="text" size="30" value="<?php echo $msn;?>" /></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ��ϵQQ</td>
<td><input name="post[qq]" id="qq" type="text" size="30" value="<?php echo $qq;?>"/></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ���߱���</td>
<td>
<input type="radio" name="post[sign]" value="1" <?php if($sign == 1) echo 'checked';?>/> ����
<input type="radio" name="post[sign]" value="0" <?php if(!$sign) echo 'checked';?>/> �ر�
</td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> <?php echo $MOD['name'];?>״̬</td>
<td>
<input type="radio" name="post[status]" value="3" <?php if($status == 3) echo 'checked';?>/> ͨ��
<input type="radio" name="post[status]" value="2" <?php if($status == 2) echo 'checked';?>/> ����
<input type="radio" name="post[status]" value="1" <?php if($status == 1) echo 'checked';?> onclick="if(this.checked) Dd('note').style.display='';"/> �ܾ�
<input type="radio" name="post[status]" value="4" <?php if($status == 4) echo 'checked';?>/> ����
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
<?php load('guest.js'); ?>
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
		Dmsg('��������2�֣���ǰ������'+l+'��', f);
		return false;
	}
	if(Dd('postfromtime').value.length != 10 || Dd('posttotime').value.length != 10) {
		Dmsg('��ѡ��չ������', 'time', 1);
		return false;
	}
	f = 'address';
	l = Dd(f).value.length;
	if(l < 6) {
		Dmsg('����д��ϸ��չ����ַ', f);
		return false;
	}
	f = 'hallname';
	l = Dd(f).value.length;
	if(l < 2) {
		Dmsg('����дչ������', f);
		return false;
	}
	f = 'sponsor';
	l = Dd(f).value.length;
	if(l < 2) {
		Dmsg('����д���쵥λ', f);
		return false;
	}
	f = 'truename';
	l = Dd(f).value.length;
	if(l < 2) {
		Dmsg('����д��ϵ��', f);
		return false;
	}
	f = 'telephone';
	l = Dd(f).value.length;
	if(l < 7) {
		Dmsg('����д��ϵ�绰', f);
		return false;
	}
	<?php echo $FD ? fields_js() : '';?>
	if(Dd('property_require') != null) {
		var ptrs = Dd('property_require').getElementsByTagName('option');
		for(var i = 0; i < ptrs.length; i++) {		
			f = 'property-'+ptrs[i].value;
			if(Dd(f).value == 0 || Dd(f).value == '') {
				Dmsg('����д��ѡ��'+ptrs[i].innerHTML, f);
				return false;
			}
		}
	}
	return true;
}
</script>
<script type="text/javascript">Menuon(<?php echo $menuid;?>);</script>
<?php include tpl('footer');?>