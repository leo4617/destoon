<?php
defined('DT_ADMIN') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<div class="tt">��������</div>
<form action="?">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td>&nbsp;
<?php echo $fields_select;?>&nbsp;
<input type="text" size="60" name="kw" value="<?php echo $kw;?>" title="�ؼ���"/>&nbsp;
<input type="text" name="psize" value="<?php echo $pagesize;?>" size="2" class="t_c" title="��/ҳ"/>
<input type="submit" value="�� ��" class="btn"/>&nbsp;
<input type="button" value="�� ��" class="btn" onclick="Go('?file=<?php echo $file;?>');"/>
</td>
</tr>
</table>
</form>
<form method="post" action="?">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<div class="tt">�ƻ�����</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th>����</th>
<th>ʱ���</th>
<th width="80">�ļ���</th>
<th width="160">�ϴ�����</th>
<th width="160">�´�����</th>
<th width="80">״̬</th>
<th width="80">����</th>
</tr>
<?php foreach($lists as $k=>$v) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td title="<?php echo $v['note'];?>"><?php echo $v['title'];?></td>
<td><?php echo $v['text'];?></td>
<td title="api/cron/<?php echo $v['name'];?>.inc.php"><?php echo $v['name'];?></td>
<td class="px11"><?php echo $v['lasttime'];?></td>
<td class="px11"><?php echo $v['nexttime'];?></td>
<td><?php echo $v['status'] ? '<span class="f_red">����</span>' : '<span class="f_green">����</span>';?></td>
<td><a href="?file=<?php echo $file;?>&action=run&itemid=<?php echo $v['itemid'];?>"<?php if($v['status']) {?> onclick="return confirm('�������ѽ��ã�ȷ��Ҫ������');"<?php } ?>><img src="admin/image/new.png" width="16" height="16" title="����" alt=""/></a>&nbsp;
<a href="?file=<?php echo $file;?>&action=edit&itemid=<?php echo $v['itemid'];?>"><img src="admin/image/edit.png" width="16" height="16" title="�޸�" alt=""/></a>&nbsp;
<a href="?file=<?php echo $file;?>&action=delete&itemid=<?php echo $v['itemid'];?>" onclick="return _delete();"><img src="admin/image/delete.png" width="16" height="16" title="ɾ��" alt=""/></a></td>
</tr>
<?php }?>
</table>
</form>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">Menuon(1);</script>
<?php include tpl('footer');?>