<?php
defined('DT_ADMIN') or exit('Access Denied');
include tpl('header');
if(!$id) show_menu($menus);
?>
<div class="tt">��Ʒ��Ϣ</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">��������</td>
<td><?php echo $td['itemid'];?></td>
</tr>
<tr>
<td class="tl">��Ʒ����</td>
<td><a href="<?php echo $td['linkurl'];?>" target="_blank" class="t"><?php echo $td['title'];?></a></td>
</tr>
<tr>
<td class="tl">��ƷͼƬ</td>
<td><a href="<?php echo $td['linkurl'];?>" target="_blank"><img src="<?php if($td['thumb']) { ?><?php echo $td['thumb'];?><?php } else { ?><?php echo DT_SKIN;?>image/nopic60.gif<?php } ?>
" width="60" height="60"/></a></td>
</tr>
<?php if($td['seller'] == $_username) { ?>
<tr>
<td class="tl">��� </td>
<td><?php if($DT['im_web']) { ?><?php echo im_web($td['buyer']);?>&nbsp;<?php } ?>
<a href="message.php?action=send&touser=<?php echo $td['buyer'];?>" target="_blank"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/ico_message.gif" title="����վ����" align="absmiddle"/></a> <a href="<?php echo userurl($td['buyer'], 'file=contact');?>" target="_blank" class="t"><?php echo $td['buyer'];?></a></td>
</tr>
<?php } else if($td['buyer'] == $_username) { ?>
<tr>
<td class="tl">����</td>
<td><?php if($DT['im_web']) { ?><?php echo im_web($td['seller']);?>&nbsp;<?php } ?>
<a href="message.php?action=send&touser=<?php echo $td['seller'];?>" target="_blank"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/ico_message.gif" title="����վ����" align="absmiddle"/></a> <a href="<?php echo userurl($td['seller'], 'file=contact');?>" target="_blank" class="t"><?php echo $td['seller'];?></a></td>
</tr>
<?php } ?>
</table>
<?php if($td['logistic']) { ?>
<div class="tt">�����Ϣ</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">�ʱ�</td>
<td><?php echo $td['buyer_postcode'];?></td>
</tr>
<tr>
<td class="tl">��ַ</td>
<td><?php echo $td['buyer_address'];?></td>
</tr>
<tr>
<td class="tl">����</td>
<td><?php echo $td['buyer_name'];?></td>
</tr>
<tr>
<td class="tl">�ֻ�</td>
<td><?php echo $td['buyer_mobile'];?></td>
</tr>
<tr>
<td class="tl">�绰</td>
<td><?php echo $td['buyer_phone'];?></td>
</tr>
<tr>
<td class="tl">��ұ�ע</td>
<td><?php if($td['note']) { ?><?php echo $td['note'];?><?php } else { ?>��<?php } ?>
</td>
</tr>
<?php if($td['send_time'] > 0) { ?>
<tr>
<td class="tl">�������</td>
<td><a href="<?php echo DT_PATH;?>api/express/home.php?e=<?php echo urlencode($td['send_type']);?>&n=<?php echo $td['send_no'];?>" target="_blank"><?php echo $td['send_type'];?></a></td>
</tr>
<tr>
<td class="tl">��ݵ���</td>
<td><a href="<?php echo DT_PATH;?>api/express.php?e=<?php echo urlencode($td['send_type']);?>&n=<?php echo $td['send_no'];?>" target="_blank"><?php echo $td['send_no'];?></a></td>
</tr>
<?php if($td['send_type'] && $td['send_no']) { ?>
<tr>
<td class="tl">׷�ٽ��</td>
<td style="line-height:200%;"><div id="express"><img src="<?php echo DT_SKIN;?>image/loading.gif" align="absmiddle"/> ���ڲ�ѯ...</div>
<script type="text/javascript">
$(document).ready(function(){
	$('#express').load(AJPath+'?action=express&moduleid=2&auth=<?php echo encrypt('group|'.$td['send_type'].'|'.$td['send_no'].'|'.$td['send_status'].'|'.$td['itemid']);?>');
});
</script>
</td>
</tr>
<?php } ?>
<?php } ?>
</table>
<?php } else { ?>
<div class="tt">��֤��Ϣ</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">����</td>
<td><?php echo $td['password'];?></td>
</tr>
<tr>
<td class="tl">�ֻ�</td>
<td><?php echo $td['buyer_mobile'];?></td>
</tr>
</table>
<?php } ?>
<div class="tt">�۸���Ϣ</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">��Ʒ����</td>
<td><?php echo $DT['money_sign'];?><?php echo $td['price'];?></td>
</tr>
<tr>
<td class="tl">��������</td>
<td><?php echo $td['number'];?></td>
</tr>
<tr>
<td class="tl">�����ܶ�</td>
<td class="tr f_red"><?php echo $DT['money_sign'];?><?php echo $td['money'];?></td>
</tr>
</table>
<div class="tt">����״̬</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">�µ�ʱ��</td>
<td><?php echo $td['adddate'];?></td>
</tr>
<tr>
<td class="tl">������</td>
<td><?php echo $td['updatedate'];?></td>
</tr>
<?php if($td['send_time']) { ?>
<tr>
<td class="tl">����ʱ��</td>
<td><?php echo $td['send_time'];?></td>
</tr>
<?php } ?>
<tr>
<td class="tl">����״̬</td>
<td><?php echo $_status[$td['status']];?></td>
</tr>
<?php if($td['buyer_reason']) { ?>
<tr>
<td class="tl">�˿�ԭ��</td>
<td><?php echo $td['buyer_reason'];?></td>
</tr>
<?php } ?>
<?php if($td['refund_reason']) { ?>
<tr>
<td class="tl">����ԭ��</td>
<td><?php echo $td['refund_reason'];?></td>
</tr>
<tr>
<td class="tl">������</td>
<td><?php echo $td['editor'];?></td>
</tr>
<tr>
<td class="tl">����ʱ��</td>
<td><?php echo $td['updatetime'];?></td>
</tr>
<?php } ?>
</table>
<script type="text/javascript">Menuon(1);</script>
<?php include tpl('footer');?>