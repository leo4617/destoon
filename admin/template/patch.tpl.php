<?php
defined('DT_ADMIN') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form method="post" action="?">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<div class="tt">�ļ�����</div>
<table cellpadding="6" cellspacing="1" class="tb">
<tr>
<td class="tl">ѡ��Ŀ¼</td>
<td>
<table cellpadding="2" cellspacing="2" width="600">
<?php foreach($dirs as $k=>$d) { ?>
<?php if($k%4==0) {?><tr><?php } ?>
<td width="150"><input type="checkbox" name="filedir[]" value="<?php echo $d;?>"<?php echo in_array($d, $sys) ? ' checked' : '';?> id="dir_<?php echo $d;?>"/><label for="dir_<?php echo $d;?>">&nbsp;<img src="admin/image/folder.gif" width="16" height="14" alt="" align="absmiddle"/> <?php echo $d;?></label></td>
<?php if($k%4==3) {?></tr><?php } ?>
<?php } ?>
</table>
</td>
</tr>
<tr>
<td class="tl">�ļ�����</td>
<td>&nbsp;<input type="text" size="60" name="fileext" value="<?php echo $ext;?>" class="f_fd"/></td>
</tr>
<tr>
<td class="tl">�޸�ʱ��</td>
<td>
&nbsp;<?php echo dcalendar('fd', $fd);?>
&nbsp;<select name="fh">
<?php 
	for($i = 0; $i < 24; $i++) {
		echo '<option value="'.$i.'"'.($i == 0 ? ' selected' : '').'>'.($i > 9 ? $i : '0'.$i).'��</option>';
	}
?>
</select>
&nbsp;<select name="fm">
<?php 
	for($i = 0; $i < 60; $i++) {
		echo '<option value="'.$i.'"'.($i == 0 ? ' selected' : '').'>'.($i > 9 ? $i : '0'.$i).'��</option>';
	}
?>
</select>
&nbsp; �� 
&nbsp;<?php echo dcalendar('td', $td);?>
&nbsp;<select name="th">
<?php 
	for($i = 0; $i < 24; $i++) {
		echo '<option value="'.$i.'"'.($i == 23 ? ' selected' : '').'>'.($i > 9 ? $i : '0'.$i).'��</option>';
	}
?>
</select>
&nbsp;<select name="tm">
<?php 
	for($i = 0; $i < 60; $i++) {
		echo '<option value="'.$i.'"'.($i == 59 ? ' selected' : '').'>'.($i > 9 ? $i : '0'.$i).'��</option>';
	}
?>
</select>
</td>
</tr>
<tr>
<td></td>
<td height="30">&nbsp;<input type="submit" name="submit" value="��ʼ����" class="btn" onclick="this.value='������..';this.blur();this.className='btn f_gray';"/></td>
</tr>
</table>
</form>

<?php if($baks) { ?>
<div class="tt">�����б�</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th width="162">����ʱ��</th>
<th>Ŀ¼</th>
<th width="150">�ļ�����</th>
<th width="40">����</th>
</tr>
<?php foreach($baks as $v) { ?>
<tr align="center">
<td class="px11"><?php echo $v['time'];?></td>
<td align="left">&nbsp;&nbsp;<img src="admin/image/folder.gif" alt="" align="absmiddle"/> <a href="javascript:Dwidget('?file=<?php echo $file;?>&action=view&fid=<?php echo $v['file'];?>', '[<?php echo $v['file'];?>]�ļ��б�');" title="λ�� file/patch/<?php echo $v['file'];?> ����鿴�ļ��б�"><?php echo $v['file'];?></a></td>
<td class="px11"><?php echo $v['num'];?></td>
<td><a href="?file=<?php echo $file;?>&action=delete&fid=<?php echo $v['file'];?>" onclick="return _delete();"><img src="admin/image/delete.png" width="16" height="16" title="ɾ��" alt=""/></a></td>
</tr>
<?php } ?>
</table>
<?php } ?>
<script type="text/javascript">Menuon(0);</script>
<?php include tpl('footer');?>