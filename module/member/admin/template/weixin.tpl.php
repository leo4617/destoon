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
<input type="hidden" name="openid" value="<?php echo $openid;?>"/>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td>&nbsp;
<?php echo $openid ? '' : $fields_select.'&nbsp;';?>
<input type="text" size="30" name="kw" value="<?php echo $kw;?>" title="�ؼ���"/>&nbsp;
<select name="type">
<option value="">��Ϣ����</option>
<?php
foreach($TYPE as $k=>$v) {
	echo '<option value="'.$k.'" '.($type == $k ? 'selected' : '').'>'.$v.'</option>';
}
?>
</select>&nbsp;
<input type="text" name="psize" value="<?php echo $pagesize;?>" size="2" class="t_c" title="��/ҳ"/>
<input type="submit" value="�� ��" class="btn"/>&nbsp;
<input type="button" value="�� ��" class="btn" onclick="Go('?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=<?php echo $action;?>&openid=<?php echo $openid;?>');"/>
</td>
</tr>
</table>
</form>
<div class="tt"><?php echo $action == 'event' ? '�¼�' : '��Ϣ';?>��¼</div>
<form method="post">
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<?php if(!$openid) { ?>
<th width="25"><input type="checkbox" onclick="checkall(this.form);"/></th>
<th width="70">ͷ��</th>
<th>�ǳ�</th>
<th>��Ա��</th>
<?php } ?>
<th width="100">��Ϣ����</th>
<th width="130">����ʱ��</th>
<th>��Ϣ����</th>
</tr>
<?php foreach($lists as $k=>$v) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<?php if(!$openid) { ?>
<td><input type="checkbox" name="itemid[]" value="<?php echo $v['itemid'];?>"/></td>
<td><a href="javascript:Dwidget('?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&openid=<?php echo $v['openid'];?>&action=chat', '��[<?php echo $v['nickname'];?>]��̸��...', 550, 490);"><img src="<?php echo $v['headimgurl'];?>" width="46" style="margin:5px 0 5px 0;"/></a></td>
<td><a href="javascript:Dwidget('?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&openid=<?php echo $v['openid'];?>&action=chat', '��[<?php echo $v['nickname'];?>]��̸��...', 550, 490);"><?php echo $v['nickname'];?></a></td>
<td><a href="javascript:_user('<?php echo $v['username'];?>')"><?php echo $v['username'];?></a></td>
<?php } ?>
<td><?php echo $TYPE[$v['type']];?></td>
<td class="px11"><?php echo $v['adddate'];?></td>
<td align="left"><div style="padding:5px;"><?php echo $v['msg'];?></div></td>
</tr>
<?php }?>
</table>
<?php if(!$openid) { ?>
<div class="btns">
<input type="submit" value=" ɾ����¼ " class="btn" onclick="if(confirm('ȷ��Ҫɾ��ѡ�м�¼�𣿴˲��������ɳ���')){this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&openid=<?php echo $openid;?>&action=delete'}else{return false;}"/>&nbsp;
</div>
<?php } ?>
</form>
<div class="pages"><?php echo $pages;?></div>
<br/>
<script type="text/javascript">Menuon(<?php echo $action == 'event' ? 1 : 0;?>);</script>
<?php include tpl('footer');?>