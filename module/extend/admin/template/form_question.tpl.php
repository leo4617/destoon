<?php
defined('DT_ADMIN') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form method="post">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="job" value="order"/>
<input type="hidden" name="fid" value="<?php echo $fid;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<div class="tt">ѡ���б�</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th width="40">����</th>
<th>ID</th>
<th>ѡ������</th>
<th>��ӷ�ʽ</th>
<th>����</th>
<th>��������</th>
<th>Ĭ��(��ѡ)ֵ</th>
<th width="70" colspan="2">����</th>
</tr>
<?php foreach($lists as $k=>$v) { ?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td><input type="text" size="2" name="listorder[<?php echo $v['qid'];?>]" value="<?php echo $v['listorder'];?>"/></td>
<td><?php echo $v['qid'];?></td>
<td><?php echo $v['name'];?></td>
<td><?php echo $TYPE[$v['type']];?></td>
<td><?php echo $v['required'] ? '<span class="f_red">��</span>' : '��';?></td>
<td><?php echo $v['required'];?></td>
<td><input type="text" style="width:300px;" value="<?php echo $v['value'];?>"/></td>
<?php if($v['type'] > 1) { ?>
<td><a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=answer&fid=<?php echo $fid;?>&job=stats&qid=<?php echo $v['qid'];?>"><img src="admin/image/poll.png" width="16" height="16" title="ͳ�Ʊ���" alt=""/></a></td>
<?php } else { ?>
<td></td>
<?php } ?>
<td>
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=question&job=edit&fid=<?php echo $fid;?>&qid=<?php echo $v['qid'];?>"><img src="admin/image/edit.png" width="16" height="16" title="�޸�" alt=""/></a>&nbsp;
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=question&job=delete&fid=<?php echo $fid;?>&qid=<?php echo $v['qid'];?>" onclick="return _delete();"><img src="admin/image/delete.png" width="16" height="16" title="ɾ��" alt=""/></a>
</td>
</tr>
<?php } ?>
</table>
<div class="btns">
<input type="submit" value=" �������� " class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" value=" �� �� " class="btn" onclick="window.parent.location.reload();"/>
</div>
</form>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">Menuon(1);</script>
<?php include tpl('footer');?>