<?php
defined('DT_ADMIN') or exit('Access Denied');
include tpl('header');
?>
<script type="text/javascript">
var _del = 0;
</script>
<form method="post" action="?">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="item" value="<?php echo $item;?>"/>
<div class="tt">�������</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th width="40">ɾ��</th>
<th>ID</th>
<th>����</th>
<th>����</th>
<th>�ϼ�����</th>
</tr>
<?php if(is_array($lists['0'])) { foreach($lists['0'] as $k0 => $v0) { ?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td><input name="post[<?php echo $v0['typeid'];?>][delete]" type="checkbox" value="1" onclick="if(this.checked){_del++;}else{_del--;}"/></td>
<td><?php echo $v0['typeid'];?></td>
<td><input name="post[<?php echo $v0['typeid'];?>][listorder]" type="text" size="5" value="<?php echo $v0['listorder'];?>" maxlength="3"/></td>
<td align="left"><input name="post[<?php echo $v0['typeid'];?>][typename]" type="text" size="20" value="<?php echo $v0['typename'];?>" maxlength="50" style="width:140px;color:<?php echo $v0['style'];?>"/> <?php echo $v0['style_select'];?></td>
<td><?php echo $v0['parent_select'];?></td>
</tr>
<?php if(isset($lists['1'][$v0['typeid']])) { ?>
<?php if(is_array($lists['1'][$v0['typeid']])) { foreach($lists['1'][$v0['typeid']] as $k1 => $v1) { ?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td><input name="post[<?php echo $v1['typeid'];?>][delete]" type="checkbox" value="1" onclick="if(this.checked){_del++;}else{_del--;}"/></td>
<td><?php echo $v1['typeid'];?></td>
<td><input name="post[<?php echo $v1['typeid'];?>][listorder]" type="text" size="5" value="<?php echo $v1['listorder'];?>" maxlength="3"/></td>
<td align="left"><img src="admin/image/tree.gif" align="absmiddle"/><input name="post[<?php echo $v1['typeid'];?>][typename]" type="text" size="20" value="<?php echo $v1['typename'];?>" maxlength="50" style="width:120px;color:<?php echo $v1['style'];?>"/> <?php echo $v1['style_select'];?></td>
<td><?php echo $v1['parent_select'];?></td>
</tr>
<?php } } ?>
<?php } ?>
<?php } } ?>

<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td></td>
<td class="f_red">����</td>
<td><input name="post[0][listorder]" type="text" size="5" value="" maxlength="3"/></td>
<td align="left"><input name="post[0][typename]" type="text" size="20" value="" maxlength="20" style="width:140px;"/> <?php echo $new_style;?></td>
<td><?php echo $parent_select;?></td>
</tr>
<tr>
<td height="30"> </td>
<td> </td>
<td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="�� ��" onclick="if(_del && !confirm('��ʾ:��ѡ��ɾ��'+_del+'�����ࣿȷ��Ҫɾ����')) return false;" class="btn"/>&nbsp;&nbsp;
<input type="button" value=" �� �� " class="btn" onclick="window.parent.cDialog();"/>
</td>
</tr>
</table>
</form>
<?php include tpl('footer');?>