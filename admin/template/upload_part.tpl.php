<?php
defined('DT_ADMIN') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<div class="tt">�ϴ��ֱ�</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th width="60">����</th>
<th>����</th>
<th>����</th>
<th>��¼</th>
<th width="60">�鿴</th>
</tr>
<?php foreach($lists as $k=>$v) {?>
<tr align="center">
<td><?php echo $k;?></td>
<td><a href="javascript:Dwidget('?file=<?php echo $file;?>&id=<?php echo $k;?>', '�ϴ���¼[<?php echo $k;?>]');"><?php echo $v['name'];?></a></td>
<td><a href="javascript:Dwidget('?file=<?php echo $file;?>&id=<?php echo $k;?>', '�ϴ���¼[<?php echo $k;?>]');"><?php echo $v['table'];?></a></td>
<td><?php echo $v['rows'];?></td>
<td><a href="javascript:Dwidget('?file=<?php echo $file;?>&id=<?php echo $k;?>', '�ϴ���¼[<?php echo $k;?>]');" class="t"><img src="admin/image/view.png" width="16" height="16" title="����鿴" alt=""/></a></td>
</tr>
<?php }?>
</table>
<div class="tt">�����ļ�</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">�ļ���ַ�� </td>
<td><input type="text" name="url" size="70" id="url"/> &nbsp; <input type="button"  value=" ���� " class="btn" onclick="Dfind();"/> <span id="durl" class="f_red"></span>
</td>
</tr>
</table>
<div class="tt">ɾ���ϴ�</div>
<form method="post" action="?" onsubmit="return Dcheck();">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="delete_user"/>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">��Ա���� </td>
<td><input type="text" name="username" size="20" id="username"/> &nbsp; <input type="submit"  value=" ɾ�� " class="btn"/> <span id="dusername" class="f_red"></span>&nbsp;&nbsp;<span class="f_gray">ɾ����Ա�������ϴ��ļ�</span>
</td>
</tr>
</table>
</form>
<script type="text/javascript">
function Dcheck() {
	var l;
	var f;
	f = 'username';
	l = Dd(f).value.length;
	if(l < 2) {
		Dmsg('����д��Ա��', f);
		return false;
	}
	return confirm('ȷ��Ҫɾ����Ա '+Dd(f).value+' �������ϴ��ļ��𣿴˲������ɳ���');
}
function Dfind() {
	var l;
	var f;
	f = 'url';
	l = Dd(f).value.length;
	if(l < 15) {
		Dmsg('����д�ļ���ַ', f);
		return false;
	}
	Dwidget('?file=<?php echo $file;?>&action=find&kw='+Dd(f).value, '�����ļ�');
}
</script>
<script type="text/javascript">Menuon(0);</script>
<?php include tpl('footer');?>