<?php
defined('DT_ADMIN') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<div id="tips_update" style="display:none;">
<div class="tt">ϵͳ������ʾ</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td><div style="padding:20px 30px 20px 20px;" title="��ǰ�汾V<?php echo DT_VERSION; ?> ����ʱ��<?php echo DT_RELEASE;?>"><img src="admin/image/tips_update.gif" width="32" height="32" align="absmiddle"/>&nbsp;&nbsp; <span class="f_red">���ĵ�ǰ����汾���µĸ��£���ע������</span>&nbsp;&nbsp;���°汾��V<span id="last_v"><?php echo DT_VERSION; ?></span> ����ʱ�䣺<span id="last_r"><?php echo DT_RELEASE; ?></span>&nbsp;&nbsp;
<input type="button" value="������" class="btn" onclick="Go('?file=cloud&action=update');"/></div></td>
</tr>
</table>
</div>
<div class="tt"><span class="f_r">IP:<?php echo $user['loginip']; ?> <?php echo ip2area($user['loginip']);?>&nbsp;&nbsp;</span>��ӭ����Ա��<?php echo $_username;?></div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">������</td>
<td width="30%">&nbsp;<?php echo $_admin == 1 ? ($CFG['founderid'] == $_userid ? '��վ��ʼ��' : '��������Ա') : ($_aid ? '<span class="f_blue">'.$AREA[$_aid]['areaname'].'վ</span>����Ա' : '��ͨ����Ա'); ?></td>
<td class="tl">��¼����</td>
<td width="30%">&nbsp;<?php echo $user['logintimes']; ?> ��</td>
</tr>
<tr>
<td class="tl">վ���ż�</td>
<td>&nbsp;<a href="<?php echo $MODULE[2]['linkurl'].'message.php';?>" target="_blank">�ռ���[<?php echo $_message ? '<strong class="f_red">'.$_message.'</strong>' : $_message;?>]</a></td>
<td class="tl">��¼ʱ��</td>
<td>&nbsp;<?php echo timetodate($user['logintime'], 5); ?> </td>
</tr>
<tr>
<td class="tl">�˻����</td>
<td>&nbsp;<?php echo $_money; ?></td>
<td class="tl">��Ա<?php echo $DT['credit_name'];?></td>
<td>&nbsp;<?php echo $_credit; ?> </td>
</tr>
<?php if($_admin == 1) { ?>
<form action="?">
<tr>
<td class="tl">��̨����</td>
<td colspan="2">
<input type="hidden" name="file" value="search"/>
<input type="text" style="width:98%;color:#444444;" name="kw" value="������ؼ���" onfocus="if(this.value=='������ؼ���')this.value='';"/></td>
<td>&nbsp;<input type="submit" name="submit" value="�� ��" class="btn"/>
</td>
</tr>
</form>
<?php } ?>
<form method="post" action="?">
<tr>
<td class="tl">�������</td>
<td colspan="2">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<textarea name="note" style="width:98%;height:50px;overflow:visible;color:#444444;"><?php echo $note;?></textarea></td>
<td>&nbsp;<input type="submit" name="submit" value="�� ��" class="btn"/>
</td>
</tr>
</form>
</table>
<?php if($_founder) {?>
<div id="destoon"></div>
<div class="tt">ϵͳ��Ϣ</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">������Ϣ</td>
<td>&nbsp;<a href="?file=cloud&action=update" class="t">DESTOON B2B Version <?php echo DT_VERSION;?> Release <?php echo DT_RELEASE;?> <?php echo DT_CHARSET;?> <?php echo strtoupper(DT_LANG);?> [������]</a></td>
</tr>
<tr>
<td class="tl">����汾</td>
<?php if($edition == '&#20010;&#20154;&#29256;') { ?>
<td id="destoon_edition">&nbsp;<span class="f_blue"><?php echo $edition;?></span> <span class="f_red">(δ��Ȩ)</span>&nbsp;&nbsp;<a href="?file=cloud&action=buy" target="_blank" class="t">[������Ȩ]</a></td>
<?php } else { ?>
<td id="destoon_edition">&nbsp;<span class="f_blue">��ҵ<?php echo $edition;?></span>&nbsp;&nbsp;<a href="?file=cloud&action=biz" target="_blank" class="t" title="����֧��">[����֧��]</a></td>
<?php } ?>
</tr>
<tr>
<td class="tl">��װʱ��</td>
<td>&nbsp;<?php echo $install;?></td>
</tr>
<tr>
<td class="tl">�ٷ���վ</td>
<td>&nbsp;<a href="http://www.destoon.com/?tracert=AdminMain" target="_blank">http://www.destoon.com</a></td>
</tr>
<tr>
<td class="tl">֧����̳</td>
<td>&nbsp;<a href="http://bbs.destoon.com/?tracert=AdminMain" target="_blank">http://bbs.destoon.com</a></td>
</tr>
<tr>
<td class="tl">ʹ�ð���</td>
<td>&nbsp;<a href="http://help.destoon.com/?tracert=AdminMain" target="_blank">http://help.destoon.com</a></td>
</tr>
<tr>
<td class="tl">������ʱ��</td>
<td>&nbsp;<?php echo timetodate($DT_TIME, 'Y-m-d H:i:s l');?></td>
</tr>
<tr>
<td class="tl">��������Ϣ</td>
<td>&nbsp;<?php echo PHP_OS.'&nbsp;'.$_SERVER["SERVER_SOFTWARE"];?> [<?php echo gethostbyname($_SERVER['SERVER_NAME']);?>:<?php echo $_SERVER["SERVER_PORT"];?>] <a href="?file=doctor" class="t">[ϵͳ���]</a></td>
</tr>
<tr>
<td class="tl">���ݿ�汾</td>
<td>&nbsp;MySQL <?php echo $db->version();?></td>
</tr>
<tr>
<td class="tl">վ��·��</td>
<td>&nbsp;<?php echo DT_ROOT;?></td>
</tr>
<tr>
<td class="tl">�ϴα���</td>
<td>&nbsp;<a href="?file=database" title="����������ݿ�"><?php echo $backtime;?><?php if($backdays > 5) { ?> (<span class="f_red"><?php echo $backdays;?></span>����ǰ)<?php } ?></a></td>
</tr>
</table>
<div class="tt">ʹ��Э��</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td style="padding:10px;"><textarea style="width:100%;height:100px;" onmouseover="this.style.height='600px';" onmouseout="this.style.height='100px';"><?php echo file_get(DT_ROOT.'/license.txt');?></textarea></td>
</tr>
</table>
<script type="text/javascript" src="<?php echo $notice_url;?>"></script>
<script type="text/javascript">
var destoon_release = <?php echo DT_RELEASE;?>;
var destoon_version = <?php echo DT_VERSION;?>;
if(typeof destoon_lastrelease != 'undefined') {
	var lastrelease = parseInt(destoon_lastrelease.replace('-', '').replace('-', ''));
	if(destoon_lastversion == destoon_version && destoon_release < lastrelease) {
		Dd('tips_update').style.display = '';
		Dd('last_v').innerHTML = destoon_lastversion;
		Dd('last_r').innerHTML = destoon_lastrelease;
	}
}
</script>
<?php } ?>
<script type="text/javascript">Menuon(0);</script>
<?php include tpl('footer');?>