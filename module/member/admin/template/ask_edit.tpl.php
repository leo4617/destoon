<?php
defined('DT_ADMIN') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<div class="tt">��������</div>
<form method="post" action="?">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_hid">*</span> �������</td>
<td><?php echo $TYPE[$typeid]['typename'];?></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> �������</td>
<td><?php echo $title;?></td>
</tr>
<?php if($qid) { ?>
<tr>
<td class="tl"><span class="f_hid">*</span> ��Դ����</td>
<td><a href="javascript:Dwidget('?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=edit&itemid=<?php echo $qid;?>', '��Դ����');" class="t">����鿴</a></td>
</tr>
<?php } ?>
<tr class="on">
<td class="tl"><span class="f_hid">*</span> ��������</td>
<td><?php echo $content;?></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ��Ա��</td>
<td><a href="javascript:_user('<?php echo $username;?>');"><?php echo $username;?></a></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> �ύʱ��</td>
<td><?php echo $addtime;?></td>
</tr>
<?php if($status < 2) { ?>
<tr>
<td class="tl"><span class="f_hid">*</span> ����ظ�</td>
<td><textarea name="reply" id="reply" class="dsn"><?php echo $reply;?></textarea><?php echo deditor($moduleid, 'reply', 'Destoon', '100%', 300);?></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ����״̬</td>
<td>
<input type="radio" name="status" value="0" id="status_0" onclick="Dh('notice');"<?php echo $status == 0 ? ' checked' : '';?>/><label for="status_0"> ������</label>
<input type="radio" name="status" value="1" id="status_1" onclick="Dh('notice');"<?php echo $status == 1 ? ' checked' : '';?>/><label for="status_1"> ������</label>
<input type="radio" name="status" value="2" id="status_2" onclick="Ds('notice');"<?php echo $status == 2 ? ' checked' : '';?>/><label for="status_2"> �ѽ��</label>
<input type="radio" name="status" value="3" id="status_3" onclick="Ds('notice');"<?php echo $status == 3 ? ' checked' : '';?>/><label for="status_3"> δ���</label>
</td>
</tr>
<tr style="display:none;" id="notice">
<td class="tl"><span class="f_hid">*</span> ֪ͨ��Ա</td>
<td>
<input type="checkbox" name="msg" id="msg" value="1" onclick="Dn();" checked/><label for="msg"> վ��֪ͨ</label>
<input type="checkbox" name="eml" id="eml" value="1" onclick="Dn();"/><label for="eml"> �ʼ�֪ͨ</label>
<input type="checkbox" name="sms" id="sms" value="1" onclick="Dn();"/><label for="sms"> ����֪ͨ</label>
<input type="checkbox" name="wec" id="wec" value="1" onclick="Dn();"/><label for="wec"> ΢��֪ͨ</label>
</td>
</tr>
<?php } else { ?><tr>
<td class="tl"><span class="f_hid">*</span> ����ظ�</td>
<td><?php echo $reply;?></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ����״̬</td>
<td><?php echo $_status[$status];?></td>
</tr>
<?php } ?>
<tr>
<td class="tl"><span class="f_hid">*</span> ������</td>
<td><?php echo $editor;?></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ����ʱ��</td>
<td><?php echo $edittime;?></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> ��Ա����</td>
<td><?php echo $stars[$star];?></td>
</tr>
</table>
<?php if($status < 2) { ?>
<div class="sbt"><input type="submit" name="submit" value=" ȷ �� " class="btn">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value=" �� �� " class="btn"/></div>
<?php } ?>
</form>
<script type="text/javascript">Menuon(<?php echo $status;?>);</script>
<?php include tpl('footer');?>