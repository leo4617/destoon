<?php
defined('DT_ADMIN') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form action="?">
<div class="tt">�Ի�����</div>
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td>&nbsp;
<?php echo $fields_select;?>&nbsp;
<input type="text" size="50" name="kw" value="<?php echo $kw;?>" title="�ؼ���"/>&nbsp;
&nbsp;
<input type="text" name="psize" value="<?php echo $pagesize;?>" size="2" class="t_c" title="��/ҳ"/>
<input type="submit" value="�� ��" class="btn"/>&nbsp;
<input type="button" value="�� ��" class="btn" onclick="Go('?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>');"/>
</td>
</tr>
</table>
</form>
<form method="post">
<div class="tt">���߶Ի�</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th width="25"><input type="checkbox" onclick="checkall(this.form);"/></th>
<th width="60">ͷ��</th>
<th>������</th>
<th>δ����Ϣ</th>
<th>���Ự</th>
<th width="60">ͷ��</th>
<th>������</th>
<th>δ����Ϣ</th>
<th>���Ự</th>
<th width="40"></th>
<th width="40">�鿴</th>
</tr>
<?php foreach($lists as $k=>$v) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td><input type="checkbox" name="chatid[]" value="<?php echo $v['chatid'];?>"/></td>
<td><img src="<?php echo useravatar($v['fromuser']);?>" style="padding:5px;" width="48" height="48"/></td>
<td>
<?php if(check_name($v['fromuser'])) { ?>
<a href="javascript:_user('<?php echo $v['fromuser'];?>')"><?php echo $v['fromuser'];?></a>
<?php } else { ?>
<a href="javascript:_ip('<?php echo $v['fromuser'];?>')" title="IP:<?php echo $v['fromuser'];?> - <?php echo ip2area($v['fromuser']);?>"><span class="f_gray">�ο�</span></a>
<?php } ?>
</td>
<td class="px11"><?php echo $v['fnew'];?></td>
<td class="px11"><?php echo timetodate($v['freadtime'], 6);?></td>
<td><img src="<?php echo useravatar($v['touser']);?>" style="padding:5px;" width="48" height="48"/></td>
<td><a href="javascript:_user('<?php echo $v['touser'];?>')"><?php echo $v['touser'];?></a></td>
<td class="px11"><?php echo $v['tnew'];?></td>
<td class="px11"><?php echo timetodate($v['treadtime'], 6);?></td>
<td>
<?php if($v['forward']) { ?>
<a href="<?php echo $v['forward'];?>" target="_blank"><img src="admin/image/link.gif" width="16" height="16" title="�������Դ��ַ" alt=""/></a>
<?php } else { ?>
&nbsp;
<?php } ?>
</td>
<td><a href="javascript:Dwidget('?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=view&chatid=<?php echo $v['chatid'];?>', '�����¼');"><img src="admin/image/view.png" width="16" height="16" title="����鿴" alt=""/></a></td>
</tr>
<?php }?>
</table>
<div class="btns">
<input type="submit" value=" ɾ���Ի� " class="btn" onclick="if(confirm('ȷ��Ҫɾ��ѡ�жԻ��𣿴˲��������ɳ���')){this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete'}else{return false;}"/>
</div>
</form>
<div class="pages"><?php echo $pages;?></div>
<br/>
<script type="text/javascript">Menuon(0);</script>
<?php include tpl('footer');?>