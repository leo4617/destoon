<?php
defined('IN_DESTOON') or exit('Access Denied');
include IN_ROOT.'/header.tpl.php';
?>
<noscript><br/><br/><center><h3>�����������֧��JavaScript,�����֧��JavaScript�������</h1></center><br/><br/></noscript>
<div class="head">
	<div>
		<strong>��ӭʹ�ã�DESTOON B2B��վ����ϵͳV<?php echo DT_VERSION;?> <?php echo strtoupper($CFG['charset']);?> ��װ��</strong><br/>
		����ϸ�Ķ��������ʹ��Э�飬����Ⲣͬ��Э��Ļ����ϰ�װ�����
	</div>
</div>
<div class="body">
<div>
<textarea style="width:100%;height:190px;margin:0 0 10px 0;">
<?php echo $license;?>
</textarea>
<strong style="color:red;">ע��</strong>����������޸������ʹ�ã��Ǹ����û�(��˾��Э�ᡢ�������ŵ�)���빺����Ȩ����ʽ��վ
</div>
</div>
<div class="foot">
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="215">
<div class="progress">
<div id="progress"></div>
</div>
</td>
<td id="percent"></td>
<td height="40" align="right">

<form action="index.php" method="post" id="dform">
<input type="hidden" name="step" value="2"/>
<input type="submit" value="��ͬ��(10)" id="read" disabled/>
<input type="button" value="��ӡ(P)" onclick="Print();"/>
&nbsp;&nbsp;
<input type="button" value="ȡ��(C)" onclick="if(confirm('��ȷ��Ҫ�˳���װ����')) window.close();"/>
</form>
<textarea style="display:none;" id="license">
<?php echo nl2br($license);?>
</textarea>
<script type="text/javascript">
function Print() {
	var w = window.open('','','');
	w.opener = null;
	w.document.write('<html><head><meta http-equiv="Content-Type" content="text/html;charset=<?php echo $CFG['charset'];?>" /></head><body><div style="width:650px;font-size:10pt;line-height:19px;font-family:Verdana,Arial;">'+$('license').value+'</div></body></html>');
	w.window.print();
}
var i = 9;
var interval=window.setInterval(
	function() {
		if(i == 0) {
			$('read').value = '��ͬ��(I)';
			$('read').disabled = false;
		} else {
			$('read').value = '��ͬ��('+i+')';
			i--;
		}
	}, 
1000);
</script>
<?php
include IN_ROOT.'/footer.tpl.php';
?>
<script type="text/javascript" src="http://www.destoon.com/install.php?release=<?php echo DT_RELEASE;?>&charset=<?php echo $CFG['charset'];?>&domain=<?php echo urlencode(get_env('url'));?>"></script>