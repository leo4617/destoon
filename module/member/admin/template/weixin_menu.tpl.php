<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<div class="tt">�˵�����</div>
<form method="post">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th width="200">�˵�����</th>
<th>��ַ/�¼�</th>
</tr>
<?php foreach($menu as $k=>$v) { ?>
<?php foreach($v as $kk=>$vv) { ?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';">
<td><?php echo $kk == 0 ? '' : '<img src="admin/image/tree.gif" align="absmiddle"/>';?><input name="post[<?php echo $k;?>][<?php echo $kk;?>][name]" type="text" style="width:<?php echo $kk == 0 ? 120 : 100;?>px;" value="<?php echo $vv['name'];?>" maxlength="<?php echo $kk == 0 ? 4 : 7;?>"/></td>
<td><input name="post[<?php echo $k;?>][<?php echo $kk;?>][key]" type="text" size="50" value="<?php echo $vv['key'];?>"/></td>
</tr>
<?php } ?>
<?php } ?>
</table>
<div class="btns">
<input type="submit" name="submit" value=" �� �� " class="btn"/>&nbsp;&nbsp; ��ʾ������Բ˵����岻��Ϥ�������޸� �˵�˵��<a href="http://mp.weixin.qq.com/wiki/13/43de8269be54a0a6f64413e4dfa94f39.html" target="_blank" class="t">�������</a>���˵�����<a href="https://mp.weixin.qq.com/debug/cgi-bin/apiinfo?t=index&type=%E8%87%AA%E5%AE%9A%E4%B9%89%E8%8F%9C%E5%8D%95&form=%E8%87%AA%E5%AE%9A%E4%B9%89%E8%8F%9C%E5%8D%95%E5%88%9B%E5%BB%BA%E6%8E%A5%E5%8F%A3%20/menu/create&access_token=<?php echo $access_token;?>" target="_blank" class="t">�������</a>
</div>
</form>
<br/>
<script type="text/javascript">Menuon(3);</script>
<?php include tpl('footer');?>