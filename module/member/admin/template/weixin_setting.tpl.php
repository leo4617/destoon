<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<div class="tt">�ʺ�����</div>
<form method="post">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">APPID</td>
<td><input name="setting[appid]" type="text" size="30" value="<?php echo $appid;?>"/></td>
</tr>
<tr>
<td class="tl">APPSECRET</td>
<td><input name="setting[appsecret]" type="text" size="60" value="<?php echo $appsecret;?>"/></td>
</tr>
<tr>
<td class="tl">URL</td>
<td><?php echo DT_PATH;?>api/weixin/index.php</td>
</tr>
<tr>
<td class="tl">TOKEN</td>
<td><input name="setting[apptoken]" type="text" size="30" value="<?php echo $apptoken;?>" id="apptoken"/> <a href="javascript:Dd('apptoken').value=RandStr();void(0);" class="t">[���]</a></td>
</tr>
<tr>
<td class="tl">EncodingAESKey</td>
<td><input name="setting[aeskey]" type="text" size="30" value="<?php echo $aeskey;?>" id="aeskey"/></td>
</tr>
<tr>
<td class="tl">��ע</td>
<td>������Ϣ��΢�Ź���ƽ̨��ȡ������</td>
</tr>
<tr>
<td class="tl">����΢�ź�</td>
<td><input name="setting[weixin]" type="text" size="20" value="<?php echo $weixin;?>"/><?php tips('һ��Ϊ��ĸ�����ֵ���ϣ�������������ϵͳ�����APPID�Զ����ɶ�Ӧ�Ķ�ά��(����LOGO)�������Ҫ�Զ��壬���ϴ���api/weixin/image/qrcode.png��ϵͳ���Զ���ȡ');?></td>
</tr>
<tr>
<td class="tl">�û���ע��ӭ��Ϣ</td>
<td><textarea name="setting[welcome]" style="width:400px;height:50px;"><?php echo $welcome;?></textarea>
</td>
</tr>
<tr>
<td class="tl">�󶨻�Ա������Ϣ</td>
<td><textarea name="setting[bind]" style="width:400px;height:50px;"><?php echo $bind;?></textarea>
</td>
</tr>
<tr>
<td class="tl">ÿ��ǩ�����ͻ���</td>
<td><input name="setting[credit]" type="text" size="5" value="<?php echo $credit;?>"/><?php tips('ÿ��ֻ��һ�Σ����������Ա�����û������򿪣�����û�48Сʱû�д򿪹�΢�ţ�ϵͳ���޷�������Ϣ����Ա');?></td>
</tr>
</table>
<div class="sbt">
<input type="submit" name="submit" value=" �� �� " class="btn"/>
</div>
</form>
<br/>
<script type="text/javascript">Menuon(4);</script>
<?php include tpl('footer');?>