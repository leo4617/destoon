<?php
defined('DT_ADMIN') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<?php if($submit) { ?>

<div class="tt">У����</div>
<table cellpadding="2" cellspacing="1" class="tb">
<?php if($lists) { ?>
<tr>
<th>�ļ�</th>
<th width="150">��С</th>
<th width="150">�޸�ʱ��</th>
</tr>
	<?php foreach($lists as $f) { ?>
	<tr align="center">
	<td align="left" class="f_fd">&nbsp;<?php echo $f;?></td>
	<td class="px11"><?php echo dround(filesize(DT_ROOT.'/'.$f)/1024);?> Kb</td>
	<td class="px11"><?php echo timetodate(filemtime(DT_ROOT.'/'.$f), 6);?></td>
	</tr>
	<?php } ?>
	<tr>
	<td colspan="3" height="30" class="f_blue">&nbsp; - �����ļ������޸Ļ򴴽����������ֶ�����ļ������Ƿ�ȫ&nbsp;&nbsp;&nbsp;&nbsp;<a href="?file=<?php echo $file;?>" class="t">[����У��]</a></td>
	</tr>
<?php } else { ?>
<tr>
<td class="f_green" height="40">&nbsp; - û���ļ����޸Ļ򴴽�&nbsp;&nbsp;&nbsp;&nbsp;<a href="?file=<?php echo $file;?>" class="t">[����У��]</a></td>
</tr>
<?php } ?>
</table>

<?php } else { ?>
<form method="post" id="dform">
<div class="tt">�ļ�У��</div>
<table cellpadding="6" cellspacing="1" class="tb">
<tr>
<td class="tl">&nbsp;ѡ��Ŀ¼</td>
<td>
<table cellpadding="2" cellspacing="2" width="600">
<?php foreach($dirs as $k=>$d) { ?>
<?php if($k%4==0) {?><tr><?php } ?>
<td width="150"><input type="checkbox" name="filedir[]" value="<?php echo $d;?>"<?php echo in_array($d, $sys) ? ' checked' : '';?><?php echo in_array($d, $fbs) ? ' disabled' : '';?> id="cdir_<?php echo $d;?>"/><label for="cdir_<?php echo $d;?>">&nbsp;<img src="admin/image/folder.gif" width="16" height="14" alt="" align="absmiddle"/> <?php echo $d;?></label></td>
<?php if($k%4==3) {?></tr><?php } ?>
<?php } ?>
</table>
<div>&nbsp;
<a href="javascript:" onclick="checkall(Dd('dform'), 1);" class="t">��ѡ</a>&nbsp;&nbsp;
<a href="javascript:" onclick="checkall(Dd('dform'), 2);" class="t">ȫѡ</a>&nbsp;&nbsp;
<a href="javascript:" onclick="checkall(Dd('dform'), 3);" class="t">ȫ��ѡ</a>&nbsp;&nbsp;
</div>
</td>
</tr>
<tr>
<td class="tl">&nbsp;�ļ�����</td>
<td>&nbsp;<input type="text" size="40" name="fileext" value="php|js|htm" class="f_fd"/></td>
</tr>
<tr>
<td class="tl">&nbsp;�����ļ�</td>
<td>&nbsp;<select name="mirror" id="mirror">
<option value="">ϵͳĬ��</option>
<?php 
	foreach($mfiles as $f) {
	$n = basename($f, '.php');
	if(strlen($n) < 16) continue;
?>
<option value="<?php echo $n;?>"><?php echo $n.' '.dround(filesize($f)/1024, 2);?> K</option>
<?php } ?>
</select>
&nbsp;<input type="submit" name="submit" value="��ʼУ��" class="btn" onclick="this.form.action='?file=<?php echo $file;?>';this.value='У����..';this.blur();this.className='btn f_gray';"/>
&nbsp;<input type="submit" name="submit" value="ɾ������" class="btn" onclick="if(Dd('mirror').value==''){alert('��ѡ����Ҫɾ���ľ����ļ�');Dd('mirror').focus();return false;}if(confirm('ȷ��Ҫɾ���𣿴˲��������ɻָ�')){this.form.action='?file=<?php echo $file;?>&action=delete';}else{return false;}"/>
</td>
</tr>
</table>
</form>
<form method="post" action="?" id="dmd5">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="add"/>
<div class="tt">��������</div>
<table cellpadding="6" cellspacing="1" class="tb">
<tr>
<td class="tl">&nbsp;ѡ��Ŀ¼</td>
<td>
<table cellpadding="2" cellspacing="2" width="600">
<?php foreach($dirs as $k=>$d) { ?>
<?php if($k%4==0) {?><tr><?php } ?>
<td width="150"><input type="checkbox" name="filedir[]" value="<?php echo $d;?>"<?php echo in_array($d, $sys) ? ' checked' : '';?><?php echo in_array($d, $fbs) ? ' disabled' : '';?> id="adir_<?php echo $d;?>"/><label for="adir_<?php echo $d;?>">&nbsp;<img src="admin/image/folder.gif" width="16" height="14" alt="" align="absmiddle"/> <?php echo $d;?></label></td>
<?php if($k%4==3) {?></tr><?php } ?>
<?php } ?>
</table>
<div>&nbsp;
<a href="javascript:" onclick="checkall(Dd('dmd5'), 1);" class="t">��ѡ</a>&nbsp;&nbsp;
<a href="javascript:" onclick="checkall(Dd('dmd5'), 2);" class="t">ȫѡ</a>&nbsp;&nbsp;
<a href="javascript:" onclick="checkall(Dd('dmd5'), 3);" class="t">ȫ��ѡ</a>&nbsp;&nbsp;
</div>
</td>
</tr>
<tr>
<td class="tl">&nbsp;�ļ�����</td>
<td>&nbsp;<input type="text" size="40" name="fileext" value="php|js|htm" class="f_fd"/></td>
</tr>
<tr>
<td></td>
<td height="30">&nbsp;<input type="submit" name="submit" value="��������" class="btn" onclick="this.value='������..';this.blur();this.className='btn f_gray';"/></td>
</tr>
</table>
</form>
<?php } ?>
<script type="text/javascript">Menuon(2);</script>
<?php include tpl('footer');?>