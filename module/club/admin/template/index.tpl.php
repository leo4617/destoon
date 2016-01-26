<?php
defined('DT_ADMIN') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form action="?">
<div class="tt">��������</div>
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td>
&nbsp;<?php echo $fields_select;?>&nbsp;
<input type="text" size="30" name="kw" value="<?php echo $kw;?>" title="�ؼ���"/>&nbsp;
<?php echo $level_select;?>&nbsp;
<select name="ontop">
<option value="0">�ö�</option>
<option value="1"<?php if($ontop == 1) echo ' selected';?>>��Ȧ</option>
<option value="2"<?php if($ontop == 2) echo ' selected';?>>ȫ��</option>
</select>&nbsp;
<select name="style">
<option value="0">����</option>
<?php
foreach($COLOR as $k=>$v) {
?>
<option value="<?php echo $k;?>" style="color:#<?php echo $k;?>;"<?php if($style == '#'.$k) echo ' selected';?>><?php echo $v;?></option>
<?php
}
?>
</select>&nbsp;
<?php echo $order_select;?>&nbsp;
<input type="text" name="psize" value="<?php echo $pagesize;?>" size="2" class="t_c" title="��/ҳ"/>
<input type="submit" value="�� ��" class="btn"/>&nbsp;
<input type="button" value="�� ��" class="btn" onclick="Go('?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=<?php echo $action;?>&gid=<?php echo $gid;?>');"/>
</td>
</tr>
<tr>
<td>
&nbsp;<select name="datetype">
<option value="addtime" <?php if($datetype == 'addtime') echo 'selected';?>>��������</option>
<option value="replytime" <?php if($datetype == 'replytime') echo 'selected';?>>�ظ�����</option>
<option value="edittime" <?php if($datetype == 'edittime') echo 'selected';?>>�޸�����</option>
</select>&nbsp;
<?php echo dcalendar('fromdate', $fromdate, '');?> �� <?php echo dcalendar('todate', $todate, '');?>&nbsp;
<?php echo category_select('catid', '���޷���', $catid, $moduleid);?>&nbsp;
<?php echo $DT['city'] ? ajax_area_select('areaid', '���޵���', $areaid).'&nbsp;' : '';?>
��ȦID��<input type="text" name="gid" value="<?php echo $gid;?>" size="4"/>&nbsp;
����ID��<input type="text" size="4" name="itemid" value="<?php echo $itemid;?>"/>&nbsp;
<input type="checkbox" name="thumb" value="1"<?php echo $thumb ? ' checked' : '';?>/>ͼƬ&nbsp;
<input type="checkbox" name="guest" value="1"<?php echo $guest ? ' checked' : '';?>/>�ο�&nbsp;
</td>
</tr>
</table>
</form>
<form method="post">
<input type="hidden" name="gid" value="<?php echo $gid;?>"/>
<div class="tt"><?php echo $menus[$menuid][0];?></div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th width="20"><input type="checkbox" onclick="checkall(this.form);"/></th>
<th>��Ȧ</th>
<th width="25"> </th>
<th>����</th>
<th>��Ա</th>
<th width="130"><?php echo $timetype == 'add' ? '���' : '�ظ�';?>ʱ��</th>
<th>���</th>
<th>�ظ�</th>
<th width="50">����</th>
</tr>
<?php foreach($lists as $k=>$v) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td><input type="checkbox" name="itemid[]" value="<?php echo $v['itemid'];?>"/></td>
<td><a href="<?php echo $v['groupurl'];?>" target="_blank"><?php echo $v['groupname'];?></a></td>
<td>
<?php if($v['ontop']) { ?>
<img src="<?php echo DT_SKIN;?>image/club_ontop_<?php echo $v['ontop'];?>.gif" alt="" title="<?php if($v['ontop']==1) { ?>��Ȧ<?php } else { ?>ȫ��<?php } ?>
�ö�"/>
<?php } else if($v['level']) { ?>
<img src="<?php echo DT_SKIN;?>image/club_level_<?php echo $v['level'];?>.gif" alt="" title="����<?php echo $v['level'];?>"/>
<?php } else if($v['thumb']) { ?>
<img src="<?php echo DT_SKIN;?>image/club_thumb.gif" alt="" title="��ͼƬ"/>
<?php } else if($v['video']) { ?>
<img src="<?php echo DT_SKIN;?>image/club_video.gif" alt="" title="����Ƶ"/>
<?php } else { ?>
&nbsp;
<?php } ?>
</td>
<td align="left">&nbsp;<a href="<?php echo $v['linkurl'];?>" target="_blank"><?php echo $v['title'];?></a><?php if($v['thumb']) {?> <a href="javascript:_preview('<?php echo $v['thumb'];?>');"><img src="admin/image/img.gif" width="10" height="10" title="����ͼ,���Ԥ��" alt=""/></a><?php } ?></td>
<td>
<?php if($v['username']) { ?>
<a href="javascript:_user('<?php echo $v['username'];?>');"><?php echo $v['passport'];?></a>
<?php } else { ?>
	<a href="javascript:_ip('<?php echo $v['ip'];?>');" title="�ο�"><?php echo $v['ip'];?></a>
<?php } ?>
</td>
<?php if($timetype == 'add') {?>
<td class="px11" title="�ظ�ʱ��<?php echo $v['replydate'];?>"><?php echo $v['adddate'];?></td>
<?php } else { ?>
<td class="px11" title="���ʱ��<?php echo $v['adddate'];?>"><?php echo $v['replydate'];?></td>
<?php } ?>
<td class="px11"><?php echo $v['hits'];?></td>
<td class="px11"><a href="javascript:Dwidget('?moduleid=<?php echo $moduleid;?>&file=reply&tid=<?php echo $v['itemid'];?>', '[<?php echo $v['alt'];?>] �ظ�����');"><?php echo $v['reply'];?></a></td>
<td>
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=edit&itemid=<?php echo $v['itemid'];?>&gid=<?php echo $gid;?>"><img src="admin/image/edit.png" width="16" height="16" title="�޸�" alt=""/></a>&nbsp;
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete&itemid=<?php echo $v['itemid'];?>&gid=<?php echo $gid;?>" onclick="return _delete();"><img src="admin/image/delete.png" width="16" height="16" title="ɾ��" alt=""/></a>
</td>
</tr>
<?php }?>
</table>
<?php include tpl('notice_chip');?>
<div class="btns">

<?php if($action == 'check') { ?>

<input type="submit" value=" ͨ����� " class="btn" onclick="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=check';"/>&nbsp;
<input type="submit" value=" �� �� " class="btn" onclick="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=reject';"/>&nbsp;
<input type="submit" value=" ����վ " class="btn" onclick="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete&recycle=1';"/>&nbsp;
<input type="submit" value=" ����ɾ�� " class="btn" onclick="if(confirm('ȷ��Ҫɾ��ѡ��<?php echo $MOD['name'];?>�𣿴˲��������ɳ���')){this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete'}else{return false;}"/>

<?php } else if($action == 'reject') { ?>

<input type="submit" value=" ����վ " class="btn" onclick="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete&recycle=1';"/>&nbsp;
<input type="submit" value=" ����ɾ�� " class="btn" onclick="if(confirm('ȷ��Ҫɾ��ѡ��<?php echo $MOD['name'];?>�𣿴˲��������ɳ���')){this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete'}else{return false;}"/>

<?php } else if($action == 'recycle') { ?>

<input type="submit" value=" ����ɾ�� " class="btn" onclick="if(confirm('ȷ��Ҫɾ��ѡ��<?php echo $MOD['name'];?>�𣿴˲��������ɳ���')){this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete'}else{return false;}"/>&nbsp;
<input type="submit" value=" �� ԭ " class="btn" onclick="if(confirm('ȷ��Ҫ��ԭѡ��<?php echo $MOD['name'];?>��״̬��������Ϊ��ͨ��')){this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=restore'}else{return false;}"/>&nbsp;
<input type="submit" value=" �� �� " class="btn" onclick="if(confirm('ȷ��Ҫ��ջ���վ�𣿴˲��������ɳ���')){this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=clear';}else{return false;}"/>

<?php } else { ?>

<input type="submit" value=" ������Ϣ " class="btn" onclick="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=update';"/>&nbsp;
<?php if($MOD['show_html']) { ?><input type="submit" value=" ������ҳ " class="btn" onclick="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=tohtml';"/>&nbsp; <?php } ?>
<input type="submit" value=" ����վ " class="btn" onclick="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete&recycle=1';"/>&nbsp;
<input type="submit" value=" ����ɾ�� " class="btn" onclick="if(confirm('ȷ��Ҫɾ��ѡ��<?php echo $MOD['name'];?>�𣿴˲��������ɳ���')){this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete'}else{return false;}"/>&nbsp;
<input type="submit" value=" �ƶ����� " class="btn" onclick="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=move';"/>&nbsp;

<select name="level" onchange="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=level';this.form.submit();"><option value="0">�Ӿ�</option><option value="0">ȡ��</option><option value="1">����1</option><option value="2">����2</option><option value="3">����3</option></select>

<select name="ontop" onchange="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=ontop';this.form.submit();"><option value="0">�ö�</option><option value="0">ȡ��</option><option value="1">��Ȧ</option><option value="2">ȫ��</option></select>

<select name="style" onchange="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=style';this.form.submit();"><option value="0">����</option><option value="0">ȡ��</option>
<?php
foreach($COLOR as $k=>$v) {
?>
<option value="<?php echo $k;?>" style="color:#<?php echo $k;?>;"><?php echo $v;?></option>
<?php
}
?>
</select>

<?php } ?>

</div>
</form>
<div class="pages"><?php echo $pages;?></div>
<br/>
<script type="text/javascript">Menuon(<?php echo $menuid;?>);</script>
<?php include tpl('footer');?>