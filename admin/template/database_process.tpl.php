<?php
defined('DT_ADMIN') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form method="post">
<div class="tt">�����б�</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th width="25"><input type="checkbox" onclick="checkall(this.form);"/></th>
<th>�û�</th>
<th>����</th>
<th>���ݿ�</th>
<th>����</th>
<th>ʱ��</th>
<th>״̬</th>
<th>SQL��ѯ</th>
<th width="50">����</th>
</tr>
<?php foreach($lists as $k=>$v) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td><input type="checkbox" name="itemid[]" value="<?php echo $v['Id'];?>"<?php echo $v['Command'] == 'Sleep' ? ' checked' : '';?>/></td>
<td><?php echo $v['User'];?></td>
<td><?php echo $v['Host'];?></td>
<td><?php echo $v['db'];?></td>
<td><?php echo $v['Command'];?></td>
<td><?php echo $v['Time'];?></td>
<td><?php echo $v['State'];?></td>
<td><textarea style="width:200px;height:15px;" title="<?php echo $v['Info'];?>" onmouseover="this.select();"><?php echo $v['Info'];?></textarea></td>
<td><a href="?file=<?php echo $file;?>&action=kill&itemid=<?php echo $v['Id'];?>"><img src="admin/image/delete.png" width="16" height="16" title="��������" alt=""/></a></td>
</tr>
<?php }?>
</table>
<div class="btns">
<input type="submit" value=" �������� " class="btn" onclick="if(confirm('ȷ��Ҫ����ѡ�н����𣿴˲��������ɳ���')){this.form.action='?file=<?php echo $file;?>&action=kill'}else{return false;}"/>
</div>
</form>
<script type="text/javascript">Menuon(4);</script>
<?php include tpl('footer');?>