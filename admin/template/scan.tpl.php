<?php
defined('DT_ADMIN') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<?php if($submit) { ?>
<div class="tt">ɨ����</div>
<table cellpadding="2" cellspacing="1" class="tb">
<?php if($lists) { ?>
<tr>
<th>�ļ�</th>
<th width="300">������</th>
<th width="100">ƥ�����</th>
<th width="100">��С</th>
<th width="150">�޸�ʱ��</th>
</tr>
	<?php foreach($lists as $v) { ?>
	<tr align="center">
	<td align="left" class="f_fd">&nbsp;<?php echo $v['file'];?></td>
	<td><input type="text" size="30" value="<?php echo $v['code'];?>" class="f_fd f_red"/></td>
	<td class="px11<?php echo $v['num'] > 2 ? ' f_red' : '';?>"><?php echo $v['num'];?></td>
	<td class="px11"><?php echo dround(filesize(DT_ROOT.'/'.$v['file'])/1024);?> Kb</td>
	<td class="px11"><?php echo timetodate(filemtime(DT_ROOT.'/'.$v['file']), 6);?></td>
	</tr>
	<?php } ?>
	<tr>
	<td colspan="5" height="30" class="f_blue">&nbsp; - ������<strong><?php echo $find;?></strong>�������ļ����������ֶ�����ļ������Ƿ�ȫ&nbsp;&nbsp;&nbsp;&nbsp;<a href="?file=<?php echo $file;?>" class="t">[����ɨ��]</a></td>
	</tr>
<?php } else { ?>
<tr>
<td class="f_green" height="40">&nbsp; - ָ����Χû��ɨ�赽�����ļ�&nbsp;&nbsp;&nbsp;&nbsp;<a href="?file=<?php echo $file;?>" class="t">[����ɨ��]</a></td>
</tr>
<?php } ?>
</table>

<?php } else { ?>
<form method="post" action="?" id="dform">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<div class="tt">ľ��ɨ��</div>
<table cellpadding="6" cellspacing="1" class="tb">
<tr>
<td class="tl">ѡ��Ŀ¼</td>
<td>
<table cellpadding="2" cellspacing="2" width="600">
<?php foreach($dirs as $k=>$d) { ?>
<?php if($k%4==0) {?><tr><?php } ?>
<td width="150"><input type="checkbox" name="filedir[]" value="<?php echo $d;?>" checked id="dir_<?php echo $d;?>"/><label for="dir_<?php echo $d;?>">&nbsp;<img src="admin/image/folder.gif" width="16" height="14" alt="" align="absmiddle"/> <?php echo $d;?></label></td>
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
<td class="tl">�ļ�����</td>
<td>&nbsp;<input type="text" size="60" name="fileext" value="<?php echo $fileext;?>" class="f_fd"/></td>
</tr>
<tr>
<td class="tl">�ļ�����</td>
<td>
&nbsp;<input type="radio" name="charset" value="gbk" checked/> GBK&nbsp;&nbsp;
<input type="radio" name="charset" value="utf-8"/> UTF-8
</td>
</tr>
<tr>
<td class="tl">��������</td>
<td>&nbsp;<textarea name="code" id="code" style="width:600px;height:50px;overflow:visible;font-family:Fixedsys,verdana;"><?php echo $code;?></textarea></td>
</tr>
<tr>
<td class="tl">ƥ�����</td>
<td>&nbsp;<input type="text" size="1" name="codenum" value="1" class="f_fd"/> ������</td>
</tr>
<tr>
<td></td>
<td height="30">&nbsp;<input type="submit" name="submit" value="��ʼɨ��" class="btn" onclick="this.value='ɨ����..';this.blur();this.className='btn f_gray';"/>
</td>
</tr>
</table>
</form>
<?php } ?>
<script type="text/javascript">Menuon(1);</script>
<?php include tpl('footer');?>