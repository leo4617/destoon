<?php
defined('DT_ADMIN') or exit('Access Denied');
include tpl('header');
if(!$itemid) show_menu($menus);
?>
<div class="tt">ͳ�Ƹſ�</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl"><a href="?moduleid=2&file=charge&status=0" class="t">���������߳�ֵ</a></td>
<td>&nbsp;<a href="?moduleid=2&file=charge&status=0"><span id="charge"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
<td class="tl"><a href="?moduleid=2&file=cash&status=0" class="t">�������ʽ�����</a></td>
<td>&nbsp;<a href="?moduleid=2&file=cash&status=0"><span id="cash"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
<td class="tl"><a href="?moduleid=16&file=order&status=5" class="t">��������Ʒ����</a></td>
<td>&nbsp;<a href="?moduleid=16&file=order&status=5"><span id="trade"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
<td class="tl"><a href="?moduleid=17&file=order&status=4" class="t">�������Ź�����</a></td>
<td>&nbsp;<a href="?moduleid=17&file=order&status=4"><span id="group"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
</tr>

<tr>
<td class="tl"><a href="?moduleid=2&file=ask&status=0" class="t">������ͷ�����</a></td>
<td>&nbsp;<a href="?moduleid=2&file=ask&status=0"><span id="ask"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
<td class="tl"><a href="?moduleid=3&file=guestbook" class="t">���ظ���վ����</a></td>
<td>&nbsp;<a href="?moduleid=3&file=guestbook"><span id="guestbook"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
<td class="tl"><a href="?moduleid=3&file=comment&action=check" class="t">���������</a></td>
<td>&nbsp;<a href="?moduleid=3&file=comment&action=check"><span id="comment"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
<td class="tl"><a href="?moduleid=3&file=link&action=check" class="t">�������������</a></td>
<td>&nbsp;<a href="?moduleid=3&file=link&action=check"><span id="link"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
</tr>

<tr>
<td class="tl"><a href="?moduleid=2&file=news&action=check" class="t">����˹�˾����</a></td>
<td>&nbsp;<a href="?moduleid=2&file=news&action=check"><span id="news"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
<td class="tl"><a href="?moduleid=2&file=honor&action=check" class="t">�������������</a></td>
<td>&nbsp;<a href="?moduleid=2&file=honor&action=check"><span id="honor"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
<td class="tl"><a href="?moduleid=2&file=link&action=check" class="t">����˹�˾����</a></td>
<td>&nbsp;<a href="?moduleid=2&file=link&action=check"><span id="comlink"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
<td class="tl"><a href="?file=keyword&status=2" class="t">����������ؼ���</a></td>
<td>&nbsp;<a href="?file=keyword&status=2"><span id="keyword"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
</tr>


<tr>
<td class="tl"><a href="?moduleid=2&file=grade&action=check" class="t">��Ա��������</a></td>
<td>&nbsp;<a href="?moduleid=2&file=grade&action=check"><span id="member_upgrade"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
<td class="tl"><a href="?moduleid=2&file=validate&action=member" class="t">����������޸�</a></td>
<td>&nbsp;<a href="?moduleid=2&file=validate&action=member"><span id="edit_check"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
<td class="tl"><a href="?moduleid=3&file=ad&action=list&job=check" class="t">�����湺��</a></td>
<td>&nbsp;<a href="?moduleid=3&file=ad&action=list&job=check"><span id="ad"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
<td class="tl"><a href="?moduleid=3&file=spread&action=check" class="t">����������ƹ�</a></td>
<td>&nbsp;<a href="?moduleid=3&file=spread&action=check"><span id="spread"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
</tr>

<tr>
<td class="tl"><a href="?moduleid=2&file=validate&action=company&status=2" class="t">����˾��֤</a></td>
<td>&nbsp;<a href="?moduleid=2&file=validate&action=company&status=2"><span id="vcompany"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
<td class="tl"><a href="?moduleid=2&file=validate&action=truename&status=2" class="t">����ʵ����֤</a></td>
<td>&nbsp;<a href="?moduleid=2&file=validate&action=truename&status=2"><span id="vtruename"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
<td class="tl"><a href="?moduleid=2&file=validate&action=mobile&status=2" class="t">�����ֻ���֤</a></td>
<td>&nbsp;<a href="?moduleid=2&file=validate&action=mobile&status=2"><span id="vmobile"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
<td class="tl"><a href="?moduleid=2&file=validate&action=email&status=2" class="t">�����ʼ���֤</a></td>
<td>&nbsp;<a href="?moduleid=2&file=validate&action=email&status=2"><span id="vemail"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
</tr>

<tr>
<td class="tl"><a href="?moduleid=18&file=group&action=check" class="t">������Ȧ����</a></td>
<td>&nbsp;<a href="?moduleid=18&file=group&action=check"><span id="club_group"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
<td class="tl"><a href="?moduleid=18&file=reply&action=check" class="t">������Ȧ�ظ�</a></td>
<td>&nbsp;<a href="?moduleid=18&file=reply&action=check"><span id="club_reply"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
<td class="tl"><a href="?moduleid=18&file=fans&action=check" class="t">������Ȧ��˿</a></td>
<td>&nbsp;<a href="?moduleid=18&file=fans&action=check"><span id="club_fans"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
<td class="tl"><a href="?moduleid=10&file=answer&action=check" class="t">�����֪���ش�</a></td>
<td>&nbsp;<a href="?moduleid=10&file=answer&action=check"><span id="answer"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
</tr>

<tr>
<td class="tl"><a href="?moduleid=7&file=price&action=check" class="t">�����Ʒ����</a></td>
<td>&nbsp;<a href="?moduleid=7&file=price&action=check"><span id="quote_price"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
<td class="tl"><a href="?moduleid=2&file=alert&action=check" class="t">�����ó������</a></td>
<td>&nbsp;<a href="?moduleid=2&file=alert&action=check"><span id="alert"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
<td class="tl"></td>
<td>&nbsp;</td>
<td class="tl"></td>
<td>&nbsp;</td>
</tr>

<tr>
<td class="tl"><a href="?moduleid=2" class="t">��Ա</a></td>

<td width="10%">&nbsp;<a href="?moduleid=2"><span id="member"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>

<td class="tl"><a href="?moduleid=4&file=vip" class="t"><?php echo VIP;?>��Ա</a></td>

<td width="10%">&nbsp;<a href="?moduleid=4&file=vip"><span id="member_vip"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>

<td class="tl"><a href="?moduleid=2&action=check" class="t">�����</a></td>

<td width="10%">&nbsp;<a href="?moduleid=2&action=check"><span id="member_check"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>


<td class="tl"><a href="?moduleid=2&action=add" class="t">��������</a></td>

<td width="10%">&nbsp;<a href="?moduleid=2"><span id="member_new"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
</tr>


<?php
foreach ($MODULE as $m) {
	if($m['moduleid'] < 5 || $m['islink']) continue;
?>

<?php 
if($m['moduleid'] == 9) $m['name'] = '��Ƹ';
?>

<tr>
<td class="tl"><a href="<?php echo $m['linkurl'];?>" class="t" target="_blank"><?php echo $m['name'];?></a></td>

<td>&nbsp;<a href="?moduleid=<?php echo $m['moduleid'];?>"><span id="m_<?php echo $m['moduleid'];?>"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>

<td class="tl"><a href="?moduleid=<?php echo $m['moduleid'];?>" class="t">�ѷ���</a></td>

<td>&nbsp;<a href="?moduleid=<?php echo $m['moduleid'];?>"><span id="m_<?php echo $m['moduleid'];?>_1"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>

<td class="tl"><a href="?moduleid=<?php echo $m['moduleid'];?>&action=check" class="t">�����</a></td>

<td>&nbsp;<a href="?moduleid=<?php echo $m['moduleid'];?>&action=check"><span id="m_<?php echo $m['moduleid'];?>_2"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>

<td class="tl"><a href="?moduleid=<?php echo $m['moduleid'];?>&action=add" class="t">��������</a></td>

<td>&nbsp;<a href="?moduleid=<?php echo $m['moduleid'];?>"><span id="m_<?php echo $m['moduleid'];?>_3"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
</tr>


<?php
if($m['moduleid'] == 9) {
	$m['name'] = '����';
?>
<tr>
<td class="tl"><a href="<?php echo $m['linkurl'];?>" class="t" target="_blank"><?php echo $m['name'];?></a></td>

<td>&nbsp;<a href="?moduleid=<?php echo $m['moduleid'];?>&file=resume"><span id="m_resume"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>

<td class="tl"><a href="?moduleid=<?php echo $m['moduleid'];?>&file=resume" class="t">�ѷ���</a></td>

<td>&nbsp;<a href="?moduleid=<?php echo $m['moduleid'];?>&file=resume"><span id="m_resume_1"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>

<td class="tl"><a href="?moduleid=<?php echo $m['moduleid'];?>&file=resume&action=check" class="t">�����</a></td>

<td>&nbsp;<a href="?moduleid=<?php echo $m['moduleid'];?>&file=resume&action=check"><span id="m_resume_2"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>

<td class="tl"><a href="?moduleid=<?php echo $m['moduleid'];?>&file=resume&action=add" class="t">��������</a></td>

<td>&nbsp;<a href="?moduleid=<?php echo $m['moduleid'];?>"><span id="m_resume_3"><img src="admin/image/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
</tr>

<?php } ?>

<?php
}
?>
</table>
<script type="text/javascript">Menuon(0);</script>
<script type="text/javascript" src="?file=<?php echo $file;?>&action=js"></script>
<?php include tpl('footer');?>