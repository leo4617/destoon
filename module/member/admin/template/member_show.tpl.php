<?php
defined('DT_ADMIN') or exit('Access Denied');
include tpl('header');
if(!isset($dialog)) show_menu($menus);
?>
<div class="tt">��Ա����</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td rowspan="9" align="center" width="160" class="f_gray">
<img src="<?php echo useravatar($username, 'large');?>"/>
<div style="padding:5px 0 0 0;">
<a href="?moduleid=<?php echo $moduleid;?>&action=login&userid=<?php echo $userid;?>" class="t" target="_blank" title="��������Ա��������">��Աǰ̨</a> | 
<a href="?moduleid=<?php echo $moduleid;?>&action=edit&userid=<?php echo $userid;?>" class="t"<?php if(isset($dialog)) {?> target="_blank"<?php } ?>>�޸�����</a>
</div>
<div style="padding:2px 0 2px 0;">
<a href="?moduleid=<?php echo $moduleid;?>&action=move&groupids=2&userid=<?php echo $userid;?>" class="t"<?php if(isset($dialog)) {?> target="_blank"<?php } ?> onclick="return confirm('ȷ��Ҫ��ֹ�˻�Ա������');">��ֹ����</a> | 
<a href="?moduleid=<?php echo $moduleid;?>&action=delete&userid=<?php echo $userid;?>&forward=<?php echo urlencode('?moduleid='.$moduleid);?>" class="t"<?php if(isset($dialog)) {?> target="_blank"<?php } ?> onclick="return confirm('ȷ��Ҫɾ���˻�Ա��ϵͳ��ɾ��ѡ���û�������Ϣ���˲��������ɳ���');">ɾ����Ա</a><br/>
</div>

<?php if($DT['im_web']) { ?><?php echo im_web($username);?> <?php } ?>
<a href="javascript:Dwidget('?moduleid=2&file=sendmail&email=<?php echo $email;?>', '�����ʼ�');"><img width="16" height="16" src="<?php echo DT_SKIN;?>image/email.gif" title="�����ʼ� <?php echo $email;?>" align="absmiddle"/></a> 
<?php if($mobile) { ?><a href="javascript:Dwidget('?moduleid=2&file=sendsms&mobile=<?php echo $mobile;?>', '���Ͷ���');"><img src="<?php echo DT_SKIN;?>image/mobile.gif" title="���Ͷ���" align="absmiddle"/></a> <?php } ?>
<a href="javascript:Dwidget('?moduleid=2&file=message&action=send&touser=<?php echo $username;?>', '������Ϣ');"><img width="16" height="16" src="<?php echo DT_SKIN;?>image/msg.gif" title="������Ϣ" align="absmiddle"/></a>
<?php echo im_qq($qq);?>
<?php echo im_ali($ali);?>
<?php echo im_msn($msn);?>
<?php echo im_skype($skype);?>
</td>
<td class="tl">��Ա��</td>
<td>&nbsp;<a href="<?php echo $linkurl;?>" target="_blank"><?php echo $username;?></a>
[<?php $ol = online($userid);if($ol == 1) { ?><span class="f_red">����</span><?php } else if($ol == -1) { ?><span class="f_blue">����</span><?php } else { ?><span class="f_gray">����</span><?php } ?>]
</td>
<td class="tl">��ԱID</td>
<td>&nbsp;<?php echo $userid;?>&nbsp;&nbsp;

</tr>
<tr>
<td class="tl">�ǳ�</td>
<td>&nbsp;<?php echo $passport;?></td>
<td class="tl">��Ա��</td>
<td class="f_red">&nbsp;<?php echo $GROUP[$groupid]['groupname'];?></td>
</tr>

<tr>
<td class="tl">�� ��</td>
<td>&nbsp;<?php echo $truename;?></td>
<td class="tl">�� ��</td>
<td>&nbsp;<?php echo $gender == 1 ? '����' : 'Ůʿ';?></td>
</tr>
<tr>
<td class="tl"><?php echo VIP;?>ָ��</td>
<td>&nbsp;<img src="<?php echo DT_SKIN;?>image/vip_<?php echo $vip;?>.gif"/></td>
<td class="tl">��¼����</td>
<td>&nbsp;<?php echo $logintimes;?></td>
</tr>
<?php if($totime) { ?>
<tr>
<td class="tl">����ʼ����</td>
<td>&nbsp;<?php echo timetodate($fromtime, 3);?></td>
<td class="tl">�����������</td>
<td>&nbsp;<?php echo timetodate($totime, 3);?><?php echo $totime < $DT_TIME ? ' <span class="f_red">[�ѹ���]</span>' : '';?></td>
</tr>
<?php } ?>
<tr>
<td class="tl">�ϴε�¼</td>
<td>&nbsp;<?php echo timetodate($logintime, 6);?></td>
<td class="tl">��¼IP</td>
<td>&nbsp;<?php echo $loginip;?> - <?php echo ip2area($loginip);?></td>
</tr>
<tr>
<td class="tl">ע��ʱ��</td>
<td>&nbsp;<?php echo timetodate($regtime, 6);?></td>
<td class="tl">ע��IP</td>
<td>&nbsp;<?php echo $regip;?> - <?php echo ip2area($regip);?></td>
</tr>
<tr>
<td class="tl"><?php echo $DT['money_name'];?>���</td>
<td>&nbsp;<a href="javascript:Dwidget('?moduleid=<?php echo $moduleid;?>&file=record&username=<?php echo $username;?>', '<?php echo $DT['money_name'];?>��ˮ');"><strong class="f_red"><?php echo $money;?></strong></a> <?php echo $DT['money_unit'];?></td>
<td class="tl">��֤��</td>
<td>&nbsp;<a href="javascript:Dwidget('?moduleid=<?php echo $moduleid;?>&file=deposit&username=<?php echo $username;?>', '��֤����ˮ');"><strong class="f_blue"><?php echo $deposit;?></strong></a> <?php echo $DT['money_unit'];?></td>
</tr>
<tr>
<td class="tl">�������</td>
<td>&nbsp;<a href="javascript:Dwidget('?moduleid=<?php echo $moduleid;?>&file=sms&action=record&username=<?php echo $username;?>', '���ż�¼');"><strong class="f_red"><?php echo $sms;?></strong></a> ��</td>
<td class="tl">��Ա<?php echo $DT['credit_name'];?></td>
<td>&nbsp;<a href="javascript:Dwidget('?moduleid=<?php echo $moduleid;?>&file=credit&username=<?php echo $username;?>', '<?php echo $DT['credit_name'];?>��ˮ');"><strong class="f_blue"><?php echo $credit;?></strong></a> <?php echo $DT['credit_unit'];?></td>
</tr>
</table>
<div class="tt">��ע��Ϣ</div>
<table cellpadding="2" cellspacing="1" class="tb">
<?php
	if($note) {
		echo '<tr><th>ʱ��</th><th>����</th><th width="150">����Ա</th></tr>';
		$N = explode('--------------------', $note);
		foreach($N as $n) {
			if(strpos($n, '|') === false) continue;
			list($_time, $_name, $_note) = explode('|', $n);
			if(strlen(trim($_time)) == 16 && check_name($_name) && $_note) echo '<tr><td align="center">'.trim($_time).'</td><td style="padding:6px 10px;line-height:24px;">'.nl2br(trim($_note)).'</td><td align="center"><a href="javascript:_user(\''.$_name.'\')">'.$_name.'</a></td></tr>';
		}
	}
?>
<form method="post" action="?">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="note_add"/>
<input type="hidden" name="userid" value="<?php echo $userid;?>"/>
<tr>
<td class="tl">׷�ӱ�ע</td>
<td align="center">
<textarea name="note" style="width:99%;height:20px;overflow:visible;padding:0;"></textarea></td>
<td align="center" width="130"><input type="submit" name="submit" value="׷��" class="btn"/><?php if($_admin == 1) {?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:$('#edit_note').toggle();" class="t">�޸�</a><?php } ?></td>
</tr>
</form>
<form method="post" action="?">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="note_edit"/>
<input type="hidden" name="userid" value="<?php echo $userid;?>"/>
<tr id="edit_note" style="display:none;">
<td class="tl">�޸ı�ע</td>
<td align="center" class="f_gray">
<textarea name="note" style="width:99%;height:100px;overflow:visible;padding:0;"><?php echo $note;?></textarea><br/>��ֻ�޸ı�ע���֣���Ҫ�Ķ� | �� - �����Լ�ʱ��͹���Ա</td>
<td align="center"><input type="submit" name="submit" value="�޸�" class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<a href="?moduleid=<?php echo $moduleid;?>&action=note_edit&userid=<?php echo $userid;?>&note=" class="t" onclick="return confirm('ȷ��Ҫ��մ˻�Ա�ı�ע��Ϣ�𣿴˲��������ɳ���');">���</a></td>
</tr>
</form>
</table>
<div class="tt">��˾����</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">��˾��ҳ</td>
<td colspan="3">&nbsp;<a href="<?php echo $linkurl;?>" target="_blank" class="t"><?php echo $linkurl;?></a></td>
</tr>
<tr>
<td class="tl">��˾��</td>
<td>&nbsp;<?php echo $company;?></td>
<td class="tl">��˾����</td>
<td>&nbsp;<?php echo $type;?></td>
</tr>
<td class="tl">��Ӫģʽ</td>
<td>&nbsp;<?php echo $mode;?></td>
<td class="tl">��Ӫ��Χ</td>
<td>&nbsp;<?php echo $business;?></td>
</tr>
<tr>
<td class="tl">ע���ʱ�</td>
<td>&nbsp;<?php echo $capital;?>��<?php echo $regunit;?></td>
<td class="tl">��˾��ģ</td>
<td>&nbsp;<?php echo $size;?></td>
</tr>
<tr>
<td class="tl">�������</td>
<td>&nbsp;<?php echo $regyear;?></td>
<td class="tl">��˾���ڵ�</td>
<td>&nbsp;<?php echo area_pos($areaid, '/');?></td>
</tr>
<tr>
<td class="tl">���۵Ĳ�Ʒ (�ṩ�ķ���)</td>
<td>&nbsp;<?php echo $sell;?></td>
<td class="tl">�ɹ��Ĳ�Ʒ (��Ҫ�ķ���)</td>
<td>&nbsp;<?php echo $buy;?></td>
</tr>
<?php if($catid) { ?>
<?php $MOD['linkurl'] = $MODULE[4]['linkurl'];?>
<tr>
<td class="tl">��Ӫ��ҵ��</td>
<td colspan="3">
	<?php $catids = explode(',', substr($catid, 1, -1));?>
	<table cellpadding="2" cellspacing="2" width="100%">
	<?php foreach($catids as $i=>$c) { ?>
	<?php if($i%3==0) echo '<tr>';?>
	<td width="33%"><?php echo cat_pos(get_cat($c), ' / ', '_blank');?></td>
	<?php if($i%3==2) echo '</tr>';?>
	<?php } ?>
	</table>
</td>
</tr>
<?php } ?>
</table>

<div class="tt">��ϵ��ʽ</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">�� ��</td>
<td>&nbsp;<?php echo $truename;?></td>
<td class="tl">�� ��</td>
<td>&nbsp;<?php if($mobile) { ?><a href="javascript:Dwidget('?moduleid=2&file=sendsms&mobile=<?php echo $mobile;?>', '���Ͷ���');"><img src="<?php echo DT_SKIN;?>image/mobile.gif" title="���Ͷ���" align="absmiddle"/></a> <?php } ?><a href="javascript:_mobile('<?php echo $mobile;?>');" title="�����ز�ѯ"><?php echo $mobile;?></a></td>
</tr>
<tr>
<td class="tl">�� ��</td>
<td>&nbsp;<?php echo $department;?></td>
<td class="tl">ְ λ</td>
<td>&nbsp;<?php echo $career;?></td>
</tr>
<tr>
<td class="tl">�� ��</td>
<td>&nbsp;<?php echo $telephone;?></td>
<td class="tl">�� ��</td>
<td>&nbsp;<?php echo $fax;?></td>
</tr>
<tr>
<td class="tl">Email (������)</td>
<td>&nbsp;<a href="javascript:Dwidget('?moduleid=2&file=sendmail&email=<?php echo $email;?>', '�����ʼ�');"><img width="16" height="16" src="<?php echo DT_SKIN;?>image/email.gif" title="����Email <?php echo $email;?>" alt="" align="absmiddle"/></a> <?php echo $email;?></td>
<td class="tl">Email (����)</td>
<td>&nbsp;<?php if($mail) { ?><a href="javascript:Dwidget('?moduleid=2&file=sendmail&email=<?php echo $mail;?>', '�����ʼ�');"><img width="16" height="16" src="<?php echo DT_SKIN;?>image/email.gif" title="����Email <?php echo $mail;?>" alt="" align="absmiddle"/></a> <?php } ?><?php echo $mail;?></td>
</tr>
<tr>
<td class="tl">QQ</td>
<td>&nbsp;<?php echo im_qq($qq);?> <?php echo $qq;?></td>
<td class="tl">��������</td>
<td>&nbsp;<?php echo im_ali($ali);?> <?php echo $ali;?></td>
</tr>
<tr>
<td class="tl">MSN</td>
<td>&nbsp;<?php echo im_msn($msn);?> <?php echo $msn;?></td>
<td class="tl">Skype</td>
<td>&nbsp;<?php echo im_skype($skype);?> <?php echo $skype;?></td>
</tr>
<tr>
<td class="tl">�� ַ</td>
<td>&nbsp;<a href="<?php echo DT_PATH;?>api/redirect.php?url=<?php echo $homepage;?>" target="_blank"><?php echo $homepage;?></a></td>
<td class="tl">�� ��</td>
<td>&nbsp;<?php echo $postcode;?></td>
</tr>
<tr>
<td class="tl">��˾��Ӫ��ַ</td>
<td colspan="3">&nbsp;<?php echo $address;?></td>
</tr>
</table>

<div class="tt">������Ϣ</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">��������</td>
<td>&nbsp;<?php echo $bank;?></td>
</tr>
<tr>
<td class="tl">��������</td>
<td>&nbsp;<?php echo $branch;?></td>
</tr>
<tr>
<td class="tl">�˻�����</td>
<td>&nbsp;<?php echo $banktype ? '�Թ�' : '��˽';?></td>
</tr>
<tr>
<td class="tl">�տ��</td>
<td>&nbsp;<?php echo $banktype ? $company : $truename;?></td>
</tr>
<tr>
<td class="tl">�տ��ʺ�</td>
<td>&nbsp;<?php echo $account;?></td>
</tr>
<tr>
<td class="tl"><?php echo $DT['trade_nm'];?></td>
<td>&nbsp;<?php echo $trade;?></td>
</tr>
</table>

<div class="tt">������Ϣ</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">�Ƽ�ע����</td>
<td>&nbsp;<a href="?moduleid=<?php echo $moduleid;?>&action=show&username=<?php echo $inviter;?>" target="_blank"><?php echo $inviter;?></a></td>
</tr>
<tr>
<td class="tl">��ҵ�����Ƿ�ͨ����֤</td>
<td>&nbsp;<?php echo $validated ? '��' : '��';?></td>
</tr>
<tr>
<td class="tl">��֤���ƻ����</td>
<td>&nbsp;<?php echo $validator;?></td>
</tr>
<tr>
<td class="tl">��֤����</td>
<td>&nbsp;<?php echo $validtime ? timetodate($validtime, 3) : '';?></td>
</tr>
<tr>
<td class="tl">��ҳ���Ŀ¼ </td>
<td>&nbsp;<?php echo $skin;?></td>
</tr>
<tr>
<td class="tl">��ҳģ��Ŀ¼ </td>
<td>&nbsp;<?php echo $template;?></td>
</tr>
<tr>
<td class="tl">��������</td>
<td>&nbsp;<?php echo $domain;?></td>
</tr>
<tr>
<td class="tl">ICP������</td>
<td>&nbsp;<?php echo $icp;?></td>
</tr>
<tr>
<td class="tl">������</td>
<td>&nbsp;<?php echo $black;?></td>
</tr>
<tr>
<td class="tl">���ϸ���ʱ��</td>
<td>&nbsp;<?php echo $edittime ? timetodate($edittime, 6) : '';?></td>
</tr>
<?php if(!isset($dialog)) { ?>
<tr>
<td class="tl"> </td>
<td colspan="3" height="30"><input type="button" value=" �� �� " class="btn" onclick="Go('?moduleid=<?php echo $moduleid;?>&action=edit&userid=<?php echo $userid;?>&forward=<?php echo urlencode($DT_URL);?>');"/>&nbsp;&nbsp;<input type="button" value=" ǰ ̨ " class="btn" onclick="window.open('?moduleid=<?php echo $moduleid;?>&action=login&userid=<?php echo $userid;?>');"/>&nbsp;&nbsp;<input type="button" value=" �� �� " class="btn" onclick="history.back(-1);"/></td>
</tr>
<?php } ?>
</table>
<br/>
<script type="text/javascript">Menuon(1);</script>
<?php include tpl('footer');?>