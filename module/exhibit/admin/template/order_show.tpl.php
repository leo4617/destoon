<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
if(!$id) show_menu($menus);
?>
<div class="tt">��������</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">չ������</td>
<td class="tr"><a href="<?php echo $item['linkurl'];?>" target="_blank" class="t f_b"><?php echo $item['title'];?></a></td>
</tr>
<tr>
<td class="tl">��Ա</td>
<td><a href="javascript:_user('<?php echo $item['username'];?>');" class="t"><?php echo $item['username'];?></a></td>
</tr>
<tr>
<td class="tl">��˾</td>
<td><?php echo $item['company'];?></td>
</tr>
<tr>
<td class="tl">����</td>
<td><?php echo $item['amount'];?></td>
</tr>
<tr>
<td class="tl">����</td>
<td><?php echo $item['truename'];?></td>
</tr>
<tr>
<td class="tl">�ֻ�</td>
<td><?php echo $item['mobile'];?></td>
</tr>
<tr>
<td class="tl">��ַ</td>
<td><?php echo area_pos($item['areaid'], '');?><?php echo $item['address'];?></td>
</tr>
<tr>
<td class="tl">�ʱ�</td>
<td><?php echo $item['postcode'];?></td>
</tr>
<tr>
<td class="tl">�ʼ�</td>
<td><?php echo $item['email'];?></td>
</tr>
<tr>
<td class="tl">QQ</td>
<td><?php echo $item['qq'];?></td>
</tr>
<tr>
<td class="tl">����ʱ��</td>
<td><?php echo $item['addtime'];?></td>
</tr>
<tr>
<td class="tl">��ע˵��</td>
<td><?php echo nl2br($item['content']);?></td>
</tr>
<tr>
<td class="tl"></td>
<td><input type="button" value="�� ��" class="btn" onclick="window.history.back(-1);"/></td>
</tr>
</table>
<script type="text/javascript">Menuon(1);</script>
<?php include tpl('footer');?>