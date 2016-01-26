<?php
defined('DT_ADMIN') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form action="?">
<div class="tt">������</div>
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td>
&nbsp;<?php echo $fields_select;?>&nbsp;
<input type="text" size="50" name="kw" value="<?php echo $kw;?>" title="�ؼ���"/>&nbsp;
<?php echo $order_select;?>&nbsp;
����ID <input type="text" size="5" name="qid" value="<?php echo $qid;?>"/>&nbsp;
<input type="checkbox" name="expert" value="1"<?php echo $expert ? ' checked' : '';?>/>ר��&nbsp;
<input type="submit" value="�� ��" class="btn"/>&nbsp;
<input type="button" value="�� ��" class="btn" onclick="Go('?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=<?php echo $action;?>&qid=<?php echo $qid;?>');"/>
</td>
</tr>
</table>
</form>
<form method="post">
<div class="tt">�����</div>
<div id="content">
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th width="25"><input type="checkbox" onclick="checkall(this.form);"/></th>
<th>������</th>
<th width="60">����</th>
</tr>
<?php foreach($lists as $k=>$v) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td><input type="checkbox" name="itemid[]" value="<?php echo $v['itemid'];?>"/></td>
<td align="left" style="padding:10px;">
<div>
<span class="f_r f_gray">
<?php if($v['expert']) {?><span class="f_red">ר��</span>&nbsp;|&nbsp;<?php } ?>Ʊ�� (<?php echo $v['vote'];?>)
</span>
<span class="px11 f_blue">
<?php echo $v['adddate'];?>
</span>
&nbsp;
<?php if($v['username']) { ?>
<a href="javascript:_user('<?php echo $v['username'];?>');"><?php echo $v['passport'];?></a> 
<?php } else { ?>
Guest
<?php } ?>
<?php if($v['hidden']) { ?>
(����)
<?php } ?>
</div>
<div class="b5 c_b"> </div>
<div>
<?php echo $v['content'];?>
</div>

<div class="b5 c_b"> </div>
<div><a href="<?php echo DT_PATH;?>api/redirect.php?mid=<?php echo $moduleid;?>&itemid=<?php echo $v['qid'];?>" target="_blank"><img src="admin/image/link.gif" width="16" height="16" title="�����ԭ����" alt="" align="absmiddle"/></a> IP:<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=<?php echo $action;?>&ip=<?php echo $v['ip'];?>"><?php echo $v['ip'];?></a> - <?php echo ip2area($v['ip']);?></div>

<?php if($v['linkurl']) { ?>
<div class="b5 c_b"> </div>
<div>�ο����ϣ�<a href="<?php echo DT_PATH;?>api/redirect.php?url=<?php echo urlencode($v['linkurl']);?>" target="_blank"><?php echo $v['linkurl'];?></a></div>
<?php } ?>
</td>
<td>
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=edit&itemid=<?php echo $v['itemid'];?>"><img src="admin/image/edit.png" width="16" height="16" title="�޸�" alt=""/></a>&nbsp;
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete&itemid=<?php echo $v['itemid'];?>" onclick="return _delete();"><img src="admin/image/delete.png" width="16" height="16" title="ɾ��" alt=""/></a>
</td>
</tr>
<?php }?>
</table>
</div>
<div class="btns">
<input type="submit" value=" ɾ �� " class="btn" onclick="if(confirm('ȷ��Ҫɾ��ѡ�д��𣿴˲��������ɳ���')){this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete'}else{return false;}"/>&nbsp;
<?php if($action == 'check') { ?>
<input type="submit" value=" ͨ����� " class="btn" onclick="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=check&status=3';"/>&nbsp;
<?php } else { ?>
<input type="submit" value=" ȡ����� " class="btn" onclick="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=check&status=2';"/>&nbsp;
<?php } ?>
</div>
</form>
<div class="pages"><?php echo $pages;?></div>
<br/>
<script type="text/javascript">
var content_id = 'content';
var img_max_width = <?php echo $MOD['max_width'];?>;
</script>
<script type="text/javascript" src="<?php echo DT_PATH;?>file/script/content.js"></script>
<script type="text/javascript">Menuon(<?php echo $menuid;?>);</script>
<?php include tpl('footer');?>