<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
if(!$mallid) show_menu($menus);
?>
<div class="tt">��������</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">��������</td>
<td><?php echo $item['itemid'];?> <?php if($DT['trade']) { ?>(<?php echo $DT['trade_nm'];?>��������:<a href="https://lab.alipay.com/consume/queryTradeDetail.htm?tradeNo=<?php echo $item['trade_no'];?>" target="_blank" class="t"><?php echo $item['trade_no'];?></a>)<?php } ?></td>
</tr>
<tr>
<td class="tl">��Ʒ����</td>
<td class="tr"><a href="<?php echo $item['linkurl'];?>" target="_blank" class="t"><?php echo $item['title'];?></a></td>
</tr>
<tr>
<td class="tl">��ƷͼƬ</td>
<td class="tr"><a href="<?php echo $item['linkurl'];?>" target="_blank"><img src="<?php if($item['thumb']) { ?><?php echo $item['thumb'];?><?php } else { ?><?php echo DT_SKIN;?>image/nopic60.gif<?php } ?>" width="60" height="60"/></a></td>
</tr>
<tr>
<td class="tl">����</td>
<td><?php if($DT['im_web']) { ?><?php echo im_web($item['seller']);?>&nbsp;<?php } ?><a href="javascript:_user('<?php echo $item['seller'];?>');" class="t"><?php echo $item['seller'];?></a></td>
</tr>
<tr>
<td class="tl">���</td>
<td><?php if($DT['im_web']) { ?><?php echo im_web($item['buyer']);?>&nbsp;<?php } ?><a href="javascript:_user('<?php echo $item['buyer'];?>');" class="t"><?php echo $item['buyer'];?></a></td>
</tr>
</table>
<div class="tt">������Ϣ</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">�ʱ�</td>
<td><?php echo $item['buyer_postcode'];?></td>
</tr>
<tr>
<td class="tl">��ַ</td>
<td><?php echo $item['buyer_address'];?></td>
</tr>
<tr>
<td class="tl">����</td>
<td><?php echo $item['buyer_name'];?></td>
</tr>
<tr>
<td class="tl">�绰</td>
<td><?php echo $item['buyer_phone'];?></td>
</tr>
<tr>
<td class="tl">�ֻ�</td>
<td><?php echo $item['buyer_mobile'];?></td>
</tr>
<?php if($item['send_time']>0) { ?>
<tr>
<td class="tl">��������</td>
<td><?php echo $item['send_type'];?></td>
</tr>
<tr>
<td class="tl">��������</td>
<td><?php echo $item['send_no'];?><?php if($item['send_no']) { ?> &nbsp;<a href="<?php echo DT_PATH;?>api/express.php?e=<?php echo urlencode($item['send_type']);?>&n=<?php echo $item['send_no'];?>" target="_blank" class="t">[����׷��]</a><?php } ?></td>
</tr>
<?php } ?>
<tr>
<td class="tl">��ע˵��</td>
<td><?php echo $item['note'];?></td>
</tr>
</table>
<div class="tt">�۸���Ϣ</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">����</td>
<td>��<?php echo $item['price'];?></td>
</tr>
<tr>
<td class="tl">����</td>
<td><?php echo $item['number'];?></td>
</tr>
<?php if($item['fee']>0) { ?>
<tr>
<td class="tl"><?php echo $item['fee_name'];?></td>
<td>��<?php echo $item['fee'];?></td>
</tr>
<?php } ?>
<tr>
<td class="tl">�ܶ�</td>
<td class="f_red">��<?php echo $item['money'];?></td>
</tr>
</table>
<div class="tt">����״̬</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">�µ�ʱ��</td>
<td><?php echo $item['addtime'];?></td>
</tr>
<tr>
<td class="tl">����ʱ��</td>
<td><?php echo $item['updatetime'];?></td>
</tr>
<?php if($item['send_time']>0) { ?>
<tr>
<td class="tl">����ʱ��</td>
<td><?php echo $item['send_time'];?></td>
</tr>
<?php } ?>
<tr>
<td class="tl">����״̬</td>
<td><?php echo $_status[$item['status']];?></td>
</tr>
<?php if($item['buyer_reason']) { ?>
<tr>
<td class="tl">������ɻ�֤��</td>
<td><?php echo $item['buyer_reason'];?></td>
</tr>
<?php } ?>
<?php if($item['refund_reason']) { ?>
<tr>
<td class="tl">�������ɻ�֤��</td>
<td><?php echo $item['refund_reason'];?></td>
</tr>
<tr>
<td class="tl">������</td>
<td><?php echo $item['editor'];?></td>
</tr>
<tr>
<td class="tl">����ʱ��</td>
<td><?php echo $item['updatetime'];?></td>
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