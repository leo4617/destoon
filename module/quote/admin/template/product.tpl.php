<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form action="?">
<div class="tt">��Ʒ����</div>
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td>
&nbsp;<?php echo $fields_select;?>&nbsp;
<input type="text" size="30" name="kw" value="<?php echo $kw;?>" title="�ؼ���"/>&nbsp;
<?php echo category_select('catid', '���޷���', $catid, $moduleid);?>&nbsp;
<?php echo $level_select;?>&nbsp;
<?php echo $order_select;?>&nbsp;
ID��<input type="text" size="4" name="itemid" value="<?php echo $itemid;?>"/>&nbsp;
<input type="text" name="psize" value="<?php echo $pagesize;?>" size="2" class="t_c" title="��/ҳ"/>
<input type="submit" value="�� ��" class="btn"/>&nbsp;
<input type="button" value="�� ��" class="btn" onclick="Go('?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=<?php echo $action;?>');"/>
</td>
</tr>
</table>
</form>
<form method="post">
<div class="tt">��Ʒ����</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th width="25"><input type="checkbox" onclick="checkall(this.form);"/></th>

<th>����</th>
<th width="14"> </th>
<th>��Ʒ</th>
<th>���Բ���</th>
<th width="120">���ʱ��</th>
<th>���¼۸�</th>
<th>������</th>
<th width="120">����ʱ��</th>
<th>���</th>
<th width="100">����</th>
</tr>
<?php foreach($lists as $k=>$v) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td><input type="checkbox" name="itemid[]" value="<?php echo $v['itemid'];?>"/></td>

<td><a href="<?php echo $v['caturl'];?>" target="_blank"><?php echo $v['catname'];?></a></td>

<td><?php if($v['level']) {?><a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=<?php echo $action;?>&level=<?php echo $v['level'];?>"><img src="admin/image/level_<?php echo $v['level'];?>.gif" title="<?php echo $v['level'];?>��" alt=""/></a><?php } ?></td>

<td align="left">
&nbsp;<a href="<?php echo $v['linkurl'];?>" target="_blank"><?php echo $v['title'];?></a></td>
<td align="left" class="f_gray">
<?php if(($v['n1'] && $v['v1']) || ($v['n2'] && $v['v2']) || ($v['n3'] && $v['v3'])) { ?>
<?php if(($v['n1'] && $v['v1'])) echo '&nbsp;'.$v['n1'].':'.$v['v1'];?>
<?php if(($v['n2'] && $v['v2'])) echo '&nbsp;'.$v['n2'].':'.$v['v2'];?>
<?php if(($v['n3'] && $v['v3'])) echo '&nbsp;'.$v['n3'].':'.$v['v3'];?>
<?php } ?>
</td>

<td class="px11"><?php echo $v['adddate'];?></td>
<td><?php echo $v['price'];?>/<?php echo $v['unit'];?></td>
<td><a href="javascript:Dwidget('?moduleid=<?php echo $moduleid;?>&file=price&pid=<?php echo $v['itemid'];?>', '[<?php echo $v['alt'];?>] ���ۼ�¼');"><?php echo $v['item'];?></a></td>
<td class="px11"><?php echo $v['editdate'];?></td>
<td><?php echo $v['hits'];?></td>
<td>
<a href="javascript:Dwidget('?moduleid=<?php echo $moduleid;?>&file=price&action=add&pid=<?php echo $v['itemid'];?>', '[<?php echo $v['alt'];?>] ���ۼ�¼');"><img src="admin/image/add.png" width="16" height="16" title="��ӱ���" alt=""/></a>&nbsp;
<a href="javascript:Dwidget('?moduleid=<?php echo $moduleid;?>&file=price&pid=<?php echo $v['itemid'];?>', '[<?php echo $v['alt'];?>] ���ۼ�¼');"><img src="admin/image/poll.png" width="16" height="16" title="���ۼ�¼" alt=""/></a>&nbsp;
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=edit&itemid=<?php echo $v['itemid'];?>"><img src="admin/image/edit.png" width="16" height="16" title="�޸�" alt=""/></a>&nbsp;
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete&itemid=<?php echo $v['itemid'];?>" onclick="return _delete();"><img src="admin/image/delete.png" width="16" height="16" title="ɾ��" alt=""/></a>
</td>
</tr>
<?php }?>
</table>
<div class="btns">
<input type="submit" value=" ɾ �� " class="btn" onclick="if(confirm('ȷ��Ҫɾ��ѡ�в�Ʒ�𣿴˲��������ɳ���')){this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete'}else{return false;}"/>&nbsp;
</div>
</form>
<div class="pages"><?php echo $pages;?></div>
<br/>
<script type="text/javascript">Menuon(1);</script>
<?php include tpl('footer');?>