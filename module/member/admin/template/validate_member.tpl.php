<?php
defined('DT_ADMIN') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<div class="tt">��¼����</div>
<form action="?">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td>
<?php echo $fields_select;?>
&nbsp;
<input type="text" size="20" name="kw" value="<?php echo $kw;?>"/>&nbsp;
<?php echo dcalendar('fromtime', $fromtime);?> �� <?php echo dcalendar('totime', $totime);?>&nbsp;
<input type="text" name="psize" value="<?php echo $pagesize;?>" size="2" class="t_c" title="��/ҳ"/>&nbsp;
<input type="submit" value="�� ��" class="btn"/>&nbsp;
<input type="button" value="�� ��" class="btn" onclick="Go('?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=<?php echo $action;?>');"/>
</td>
</tr>
</table>
</form>
<div class="tt">�����¼</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th>��Ա</th>
<th>�ύʱ��</th>
<th width="50">�鿴</th>
</tr>
<?php foreach($lists as $k=>$v) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td><a href="javascript:_user('<?php echo $v['username'];?>');"><?php echo $v['username'];?></a></td>
<td class="px11"><?php echo $v['addtime'];?></td>
<td><a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=show&username=<?php echo $v['username'];?>"><img src="admin/image/view.png" width="16" height="16" title="�鿴����" alt=""/></a></td>
</tr>
<?php }?>
</table>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">Menuon(0);</script>
<br/>
<?php include tpl('footer');?>