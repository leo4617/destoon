<?php
defined('DT_ADMIN') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<div class="tt">�����굥</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">��Ա��</td>
<td><a href="javascript:_user('<?php echo $item['username'];?>');" class="t"><?php echo $item['username'];?></a></td>
</tr>
<tr>
<td class="tl">ʵ�����</td>
<td class="f_red"><?php echo $item['amount'];?></td>
</tr>
<tr>
<td class="tl">������</td>
<td class="f_blue"><?php echo $item['fee'];?></td>
</tr>
<tr class="on">
<td class="tl">��������</td>
<td><?php echo $item['bank'];?></td>
</tr>
<tr>
<td class="tl">�ʻ�����</td>
<td><?php echo $item['banktype'] ? '�Թ�' : '��˽';?></td>
</tr>
<tr>
<td class="tl">��������</td>
<td><?php echo $item['branch'];?></td>
</tr>
<tr>
<td class="tl">�տ��</td>
<td><?php echo $item['truename'];?></td>
</tr>
<tr>
<td class="tl">�տ��ʺ�</td>
<td><?php echo $item['account'];?></td>
</tr>
<tr>
<td class="tl">����ʱ��</td>
<td><?php echo $item['addtime'];?></td>
</tr>
<tr>
<td class="tl">����IP</td>
<td><?php echo $item['ip'];?> ���� <?php echo ip2area($item['ip']);?></td>
</tr>
<tr class="on">
<td class="tl">������</td>
<td><?php echo $_status[$item['status']];?></td>
</tr>
<tr>
<td class="tl">ԭ�򼰱�ע</td>
<td><?php echo $item['note'];?></td>
</tr>
<tr>
<td class="tl">������</td>
<td><?php echo $item['editor'];?></td>
</tr>
<tr>
<td class="tl">����ʱ��</td>
<td><?php echo $item['edittime'];?></td>
</tr>
</table>
<div class="sbt"><input type="button" value=" �� �� " class="btn" onclick="history.back(-1);"/></div>
<script type="text/javascript">Menuon(0);</script>
<?php include tpl('footer');?>