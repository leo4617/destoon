<?php
defined('DT_ADMIN') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<div class="tt">��Ա��Ϣ</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">��Ա��</td>
<td>&nbsp;<a href="javascript:_user('<?php echo $U['username'];?>');"><?php echo $U['username'];?></a></td>
<td class="tl">��˾��</td>
<td>&nbsp;<a href="<?php echo $U['linkurl'];?>" target="_blank"><?php echo $U['company'];?></a></td>
</tr>
</table>
<form method="post" action="?">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="username" value="<?php echo $username;?>"/>
<div class="tt">�޸�����</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th width="25">ͨ��</th>
<th width="120">��Ŀ</th>
<th width="40%">�޸�ǰ</th>
<th width="40%">�޸�Ϊ</th>
</tr>
<?php if(isset($E['thumb'])) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';">
<td align="center"><input type="checkbox" name="pass[]" value="thumb" checked/></td>
<td align="center">����ͼƬ</td>
<td><img src="<?php echo imgurl($U['thumb']);?>" width="80"/></td>
<td><img src="<?php echo imgurl($E['thumb']);?>" width="80"/></td>
</tr>
<?php }?>
<?php if(isset($E['areaid'])) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';">
<td align="center"><input type="checkbox" name="pass[]" value="areaid" checked/></td>
<td align="center">���ڵ���</td>
<td><?php echo area_pos($U['areaid'], ' / ');?></td>
<td><?php echo area_pos($E['areaid'], ' / ');?></td>
</tr>
<?php }?> 
<?php if(isset($E['type'])) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';">
<td align="center"><input type="checkbox" name="pass[]" value="type" checked/></td>
<td align="center">��˾����</td>
<td><?php echo $U['type'];?></td>
<td><?php echo $E['type'];?></td>
</tr>
<?php }?>
<?php if(isset($E['business'])) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';">
<td align="center"><input type="checkbox" name="pass[]" value="business" checked/></td>
<td align="center">��Ӫ��Χ</td>
<td><?php echo $U['business'];?></td>
<td><?php echo $E['business'];?></td>
</tr>
<?php }?>
<?php if(isset($E['regyear'])) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';">
<td align="center"><input type="checkbox" name="pass[]" value="regyear" checked/></td>
<td align="center">�������</td>
<td><?php echo $U['regyear'];?></td>
<td><?php echo $E['regyear'];?></td>
</tr>
<?php }?>
<?php if(isset($E['capital']) || isset($E['regunit'])) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';">
<td align="center"><input type="checkbox" name="pass[]" value="capital" checked/></td>
<td align="center">ע���ʱ�</td>
<td><?php echo $U['capital'];?> <?php echo isset($E['regunit']) ? $U['regunit'] : '';?></td>
<td><?php echo $E['capital'];?> <?php echo isset($E['regunit']) ? $E['regunit'] : '';?></td>
</tr>
<?php }?>
<?php if(isset($E['address'])) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';">
<td align="center"><input type="checkbox" name="pass[]" value="address" checked/></td>
<td align="center">��˾��ַ</td>
<td><?php echo $U['address'];?></td>
<td><?php echo $E['address'];?></td>
</tr>
<?php }?>
<?php if(isset($E['telephone'])) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';">
<td align="center"><input type="checkbox" name="pass[]" value="telephone" checked/></td>
<td align="center">��ϵ�绰</td>
<td><?php echo $U['telephone'];?></td>
<td><?php echo $E['telephone'];?></td>
</tr>
<?php }?>
<?php if(isset($E['content'])) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';">
<td align="center"><input type="checkbox" name="pass[]" value="content" checked/></td>
<td align="center">��˾����</td>
<td valign="top"><?php echo $U['content'];?></td>
<td valign="top"><?php echo $E['content'];?></td>
</tr>
<?php }?>
</table>
<table>
<tr>
<td>
&nbsp;<textarea style="width:300px;height:16px;" name="reason" id="reason" onfocus="if(this.value=='����ԭ��')this.value='';"/>����ԭ��</textarea> 
</td>
<td>
<input type="checkbox" name="msg" id="msg" value="1" onclick="Dn();" checked/><label for="msg"> վ��֪ͨ</label>
<input type="checkbox" name="eml" id="eml" value="1" onclick="Dn();"/><label for="eml"> �ʼ�֪ͨ</label>
<input type="checkbox" name="sms" id="sms" value="1" onclick="Dn();"/><label for="sms"> ����֪ͨ</label>
<input type="checkbox" name="wec" id="wec" value="1" onclick="Dn();"/><label for="wec"> ΢��֪ͨ</label>
</td>
</tr>
</table>
<div class="btns">
<input type="submit" name="submit" value=" ȷ �� " class="btn"/>
</div>
</form>
<script type="text/javascript">Menuon(0);</script>
<?php include tpl('footer');?>