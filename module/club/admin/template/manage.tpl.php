<?php
defined('DT_ADMIN') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form action="?">
<div class="tt">��¼����</div>
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td>
&nbsp;<?php echo $fields_select;?>&nbsp;
<input type="text" size="30" name="kw" value="<?php echo $kw;?>" title="�ؼ���"/>&nbsp;
<select name="typeid">
<?php
foreach($MANAGE as $k=>$v) {
?>
<option value="<?php echo $k;?>" <?php echo $k == $typeid ? ' selected' : '';?>><?php echo $v;?></option>
<?php
}
?>
</select>&nbsp;
<select name="message">
<option value="-1">֪ͨ</option>
<option value="1"<?php echo $message==1 ? ' selected' : '';?>>�ѷ�</option>
<option value="0"<?php echo $message==0 ? ' selected' : '';?>>δ��</option>
</select>&nbsp;
��ȦID <input type="text" size="5" name="gid" value="<?php echo $gid;?>"/>&nbsp;
����ID <input type="text" size="5" name="tid" value="<?php echo $tid;?>"/>&nbsp;
�ظ�ID <input type="text" size="5" name="rid" value="<?php echo $rid;?>"/>&nbsp;
<input type="submit" value="�� ��" class="btn"/>&nbsp;
<input type="button" value="�� ��" class="btn" onclick="Go('?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=<?php echo $action;?>&gid=<?php echo $gid;?>');"/>
</td>
</tr>
</table>
</form>
<form method="post">
<div class="tt">�����¼</div>
<div id="content">
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th>��Ȧ</th>
<th>����/�ظ�</th>
<th width="40">����</th>
<th width="80">��������</th>
<th>������</th>
<th width="130">����ʱ��</th>
<th width="120">����ԭ��</th>
<th width="40">֪ͨ</th>
</tr>
<?php foreach($lists as $k=>$v) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td><a href="<?php echo $v['groupurl'];?>" target="_blank"><?php echo $v['groupname'];?></a></td>
<td align="left">&nbsp;<a href="<?php echo $v['linkurl'];?>" target="_blank"><?php echo $v['title'];?></a></td>
<td><?php echo $MANAGE[$v['typeid']];?></td>
<td><?php echo $v['value'];?></td>
<td><a href="javascript:_user('<?php echo $v['username'];?>');"><?php echo $v['username'];?></a></td>
<td><?php echo $v['adddate'];?></td>
<td><textarea style="width:100px;height:16px;" title="<?php echo $v['reason'];?>"><?php echo $v['reason'];?></textarea></td>
<td><?php echo $v['message'] ? '<span class="f_green">�ѷ�</span>' : '<span class="f_red">δ��</span>';?></td>
</tr>
<?php }?>
</table>
</div>
</form>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">Menuon(<?php echo $menuid;?>);</script>
<?php include tpl('footer');?>