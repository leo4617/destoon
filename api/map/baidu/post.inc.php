<?php
defined('IN_DESTOON') or exit('Access Denied');
preg_match("/^[0-9\.\,]{17,21}$/", $map) or $map = '';
?>
<tr>
<td class="tl">��˾��ͼ��ע</td>
<td class="tr">
<input type="text" name="setting[map]" id="map" value="<?php echo $map;?>" readonly size="50" onclick="MapMark();"/>&nbsp;&nbsp;
<a href="javascript:MapMark();" class="t">��ע</a>&nbsp;|&nbsp;<a href="javascript:DelMark();" class="t">���</a>
<script type="text/javascript">
function MapMark() {
	Dwidget(DTPath+'api/map/baidu/mark.php?map='+Dd('map').value, '�ٶȵ�ͼ - �ڵ�ͼ��˫�������ɱ�ע');
}
function DelMark() {
	Dd('map').value='';
}
</script>
</td>
</tr>