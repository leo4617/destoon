<?php
defined('DT_ADMIN') or exit('Access Denied');
include tpl('header');
if(!$id) show_menu($menus);
?>
<div class="tt">��Ʒ��Ϣ</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">��������</td>
<td><?php echo $td['itemid'];?> <?php if($DT['trade']) { ?>(<?php echo $DT['trade_nm'];?>��������:<a href="https://lab.alipay.com/consume/queryTradeDetail.htm?tradeNo=<?php echo $td['trade_no'];?>" target="_blank" class="t"><?php echo $td['trade_no'];?></a>)<?php } ?></td>
</tr>
<tr>
<td class="tl">��Ʒ����</td>
<td class="tr"><a href="<?php echo $td['linkurl'];?>" target="_blank" class="t"><?php echo $td['title'];?></a></td>
</tr>
<tr>
<td class="tl">��ƷͼƬ</td>
<td class="tr"><a href="<?php echo $td['linkurl'];?>" target="_blank"><img src="<?php if($td['thumb']) { ?><?php echo $td['thumb'];?><?php } else { ?><?php echo DT_SKIN;?>image/nopic60.gif<?php } ?>" width="60" height="60"/></a></td>
</tr>
<?php if($td['par']) { ?>
<tr>
<td class="tl">������</td>
<td><?php echo $td['par'];?></td>
</tr>
<?php } ?>
<tr>
<td class="tl">����</td>
<td><?php if($DT['im_web']) { ?><?php echo im_web($td['seller']);?>&nbsp;<?php } ?><a href="javascript:_user('<?php echo $td['seller'];?>');" class="t"><?php echo $td['seller'];?></a></td>
</tr>
<tr>
<td class="tl">���</td>
<td><?php if($DT['im_web']) { ?><?php echo im_web($td['buyer']);?>&nbsp;<?php } ?><a href="javascript:_user('<?php echo $td['buyer'];?>');" class="t"><?php echo $td['buyer'];?></a></td>
</tr>
</table>
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
<td class="tl">�绰</td>
<td><?php echo $td['buyer_phone'];?></td>
</tr>
<tr>
<td class="tl">�ֻ�</td>
<td><?php echo $td['buyer_mobile'];?></td>
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
	$('#express').load(AJPath+'?action=express&moduleid=2&auth=<?php echo encrypt('mall|'.$td['send_type'].'|'.$td['send_no'].'|'.$td['send_status'].'|'.$td['itemid']);?>');
});
</script>
</td>
</tr>
<?php } ?>
<?php } ?>
<tr>
<td class="tl">�������</td>
<td><?php echo $td['note'];?></td>
</tr>
</table>
<div class="tt">�۸���Ϣ</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">����</td>
<td><?php echo $DT['money_sign'];?><?php echo $td['price'];?></td>
</tr>
<tr>
<td class="tl">����</td>
<td><?php echo $td['number'];?></td>
</tr>
<?php if($td['fee']>0) { ?>
<tr>
<td class="tl"><?php echo $td['fee_name'];?></td>
<td><?php echo $DT['money_sign'];?><?php echo $td['fee'];?></td>
</tr>
<?php } ?>
<tr>
<td class="tl">�ܶ�</td>
<td class="f_red"><?php echo $DT['money_sign'];?><?php echo $td['money'];?></td>
</tr>
</table>
<div class="tt">����״̬</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">�µ�ʱ��</td>
<td><?php echo $td['adddate'];?></td>
</tr>
<tr>
<td class="tl">����ʱ��</td>
<td><?php echo $td['updatedate'];?></td>
</tr>
<?php if($td['send_time']>0) { ?>
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

<div class="tt">�������<a name="comment1"></a></div>
<table cellpadding="2" cellspacing="1" class="tb">
<?php if($cm['seller_star']) { ?>
<tr>
<td class="tl">�������</td>
<td>
<span class="f_r"><a href="#comment" onclick="Ds('c_edit');" class="t">[�޸�]</a></span>
<img src="<?php echo DT_PATH;?>file/image/star<?php echo $cm['seller_star'];?>.gif" width="36" height="12" alt="" align="absmiddle"/> <?php echo $STARS[$cm['seller_star']];?>
</td>
</tr>
<tr>
<td class="tl">�������</td>
<td><?php echo nl2br($cm['seller_comment']);?></td>
</tr>
<tr>
<td class="tl">����ʱ��</td>
<td class="px11"><?php echo timetodate($cm['seller_ctime'], 6);?></td>
</tr>
<?php if($cm['buyer_reply']) { ?>
<tr>
<td class="tl">���ҽ���</td>
<td style="color:#D9251D;"><?php echo nl2br($cm['buyer_reply']);?></td>
</tr>
<tr>
<td class="tl">����ʱ��</td>
<td class="px11"><?php echo timetodate($cm['buyer_rtime'], 6);?></td>
</tr>
<?php } ?>
<?php } else { ?>
<tr>
<td class="tl">�������</td>
<td>��δ����</td>
</tr>
<?php } ?>
</table>

<div class="tt">��������<a name="comment2"></a></div>
<table cellpadding="2" cellspacing="1" class="tb">
<?php if($cm['buyer_star']) { ?>
<tr>
<td class="tl">��������</td>
<td>
<span class="f_r"><a href="#comment" onclick="Ds('c_edit');" class="t">[�޸�]</a></span>
<img src="<?php echo DT_PATH;?>file/image/star<?php echo $cm['buyer_star'];?>.gif" width="36" height="12" alt="" align="absmiddle"/> <?php echo $STARS[$cm['buyer_star']];?>
</td>
</tr>
<tr>
<td class="tl">��������</td>
<td><?php echo nl2br($cm['buyer_comment']);?></td>
</tr>
<tr>
<td class="tl">����ʱ��</td>
<td class="px11"><?php echo timetodate($cm['buyer_ctime'], 6);?></td>
</tr>
<?php if($cm['seller_reply']) { ?>
<tr>
<td class="tl">��ҽ���</td>
<td style="color:#D9251D;"><?php echo nl2br($cm['seller_reply']);?></td>
</tr>
<tr>
<td class="tl">����ʱ��</td>
<td class="px11"><?php echo timetodate($cm['seller_rtime'], 6);?></td>
</tr>
<?php } ?>
<?php } else { ?>
<tr>
<td class="tl">��������</td>
<td>��δ����</td>
</tr>
<?php } ?>
</table>

<div id="c_edit" style="display:none;">
<div class="tt">�޸�����<a name="comment"></a></div>
<form method="post" action="?" id="dform" onsubmit="return check();">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="comment"/>
<input type="hidden" name="mallid" value="<?php echo $mallid;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">�������</td>
<td>
<input type="radio" name="post[seller_star]" value="3"<?php echo $cm['seller_star'] == 3 ? ' checked' : '';?>/> ���� 
<input type="radio" name="post[seller_star]" value="2"<?php echo $cm['seller_star'] == 2 ? ' checked' : '';?>/> ���� 
<input type="radio" name="post[seller_star]" value="1"<?php echo $cm['seller_star'] == 1 ? ' checked' : '';?>/> ���� 
<input type="radio" name="post[seller_star]" value="0"<?php echo $cm['seller_star'] == 0 ? ' checked' : '';?>/> ����
</td>
</tr>
<tr>
<td class="tl">�������</td>
<td><textarea name="post[seller_comment]" style="width:300px;height:60px;"><?php echo $cm['seller_comment'];?></textarea></td>
</tr>
<tr>
<td class="tl">����ʱ��</td>
<td><input type="text" style="width:150px;" name="post[seller_ctime]" value="<?php echo $cm['seller_ctime'] ? timetodate($cm['seller_ctime'], 6) : '';?>"/></td>
</tr>
<tr>
<td class="tl">���ҽ���</td>
<td><textarea name="post[buyer_reply]" style="width:300px;height:60px;"><?php echo $cm['buyer_reply'];?></textarea></td>
</tr>
<tr>
<td class="tl">����ʱ��</td>
<td><input type="text" style="width:150px;" name="post[buyer_rtime]" value="<?php echo $cm['buyer_rtime'] ? timetodate($cm['buyer_rtime'], 6) : '';?>"/></td>
</tr>

<tr>
<td class="tl">��������</td>
<td>
<input type="radio" name="post[buyer_star]" value="3"<?php echo $cm['buyer_star'] == 3 ? ' checked' : '';?>/> ���� 
<input type="radio" name="post[buyer_star]" value="2"<?php echo $cm['buyer_star'] == 2 ? ' checked' : '';?>/> ���� 
<input type="radio" name="post[buyer_star]" value="1"<?php echo $cm['buyer_star'] == 1 ? ' checked' : '';?>/> ���� 
<input type="radio" name="post[buyer_star]" value="0"<?php echo $cm['buyer_star'] == 0 ? ' checked' : '';?>/> ����
</td>
</tr>
<tr>
<td class="tl">��������</td>
<td><textarea name="post[buyer_comment]" style="width:300px;height:60px;"><?php echo $cm['buyer_comment'];?></textarea></td>
</tr>
<tr>
<td class="tl">����ʱ��</td>
<td><input type="text" style="width:150px;" name="post[buyer_ctime]" value="<?php echo $cm['buyer_ctime'] ? timetodate($cm['buyer_ctime'], 6) : '';?>"/></td>
</tr>
<tr>
<td class="tl">��ҽ���</td>
<td><textarea name="post[seller_reply]" style="width:300px;height:60px;"><?php echo $cm['seller_reply'];?></textarea></td>
</tr>
<tr>
<td class="tl">����ʱ��</td>
<td><input type="text" style="width:150px;" name="post[seller_rtime]" value="<?php echo $cm['seller_rtime'] ? timetodate($cm['seller_rtime'], 6) : '';?>"/></td>
</tr>
</table>
<div class="sbt"><input type="submit" name="submit" value=" ȷ �� " class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" �� �� " class="btn" onclick="history.back(-1);"/></div>
</form>
</div>
<script type="text/javascript">
function check() {
	return confirm('ȷ��Ҫ�޸ĸö�����������');
}
</script>
<script type="text/javascript">Menuon(1);</script>
<?php include tpl('footer');?>