<?php
defined('DT_ADMIN') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form method="post" action="?">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<div class="tt"><?php echo $menus[$menuid][0];?></div>
<table cellpadding="5" cellspacing="1" class="tb">
<tr>
<td>
<input type="radio" name="fromtype" value="gid" <?php echo $itemid ? '' : 'checked';?> id="f_1"/><label for="f_1">��ָ����ȦID</label>&nbsp;&nbsp;
<input type="radio" name="fromtype" value="itemid" <?php echo $itemid ? 'checked' : '';?> id="f_2"/><label for="f_2">��ָ������ID</label>
</td>
</tr>
<tr>
<td>
<textarea style="height:50px;width:300px;" name="fromids"><?php echo $itemid;?></textarea><br/>
<span class="f_gray">���ID��,�ֿ� ��β�Ϳ�ͷ������,</span>
</td>
</tr>
<tr>
<td><input name="tocatid" type="text" id="tocatid" size="30" value="Ŀ����Ȧ,���ѡ��" onfocus="Dwidget('?moduleid=<?php echo $moduleid;?>&file=group&itemid=1', 'ѡ����Ȧ');"/></td>
</tr>
<tr>
<td><input type="submit" name="submit" value=" �� �� " class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value=" �� �� " class="btn"/></td>
</tr>
</table>
</div>
</form>
<script type="text/javascript">Menuon(<?php echo $menuid;?>);</script>
<?php include tpl('footer');?>