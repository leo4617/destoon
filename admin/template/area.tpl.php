<?php
defined('DT_ADMIN') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form action="?">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<div class="tt">��������</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td>&nbsp;
<input type="text" size="30" name="kw" value="<?php echo $kw;?>" title="�ؼ���"/>&nbsp;
<input type="submit" name="submit" value="�� ��" class="btn"/>&nbsp;
<input type="button" value="�� ��" class="btn" onclick="Go('?file=<?php echo $file;?>');"/>&nbsp;
</td>
</tr>
</table>
</div>
</form>
<div class="tt"><?php if($parentid) echo $AREA[$parentid]['areaname'];?>��������</div>
<form method="post">
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th width="25"><input type="checkbox" onclick="checkall(this.form);"/></th>
<th width="100">����</th>
<th width="100">ID</th>
<th>�ϼ�ID</th>
<th>������</th>
<th width="80">�ӵ���</th>
<th width="80">����</th>
</tr>
<?php foreach($DAREA as $k=>$v) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td><input type="checkbox" name="areaids[]" value="<?php echo $v['areaid'];?>"/></td>
<td><input name="area[<?php echo $v['areaid'];?>][listorder]" type="text" size="5" value="<?php echo $v['listorder'];?>"/></td>
<td>&nbsp;<?php echo $v['areaid'];?></td>
<td><input name="area[<?php echo $v['areaid'];?>][parentid]" type="text" size="10" value="<?php echo $v['parentid'];?>"/></td>
<td><input name="area[<?php echo $v['areaid'];?>][areaname]" type="text" size="20" value="<?php echo $v['areaname'];?>"/></td>
<td>&nbsp;<a href="?file=<?php echo $file;?>&parentid=<?php echo $v['areaid'];?>"><?php echo $v['childs'];?></a></td>
<td>
<a href="?file=<?php echo $file;?>&parentid=<?php echo $v['areaid'];?>"><img src="admin/image/child.png" width="16" height="16" title="�����ӵ�������ǰ��<?php echo $v['childs'];?>���ӵ���" alt=""/></a>&nbsp;
<a href="?file=<?php echo $file;?>&action=add&parentid=<?php echo $v['areaid'];?>"><img src="admin/image/new.png" width="16" height="16" title="����ӵ���" alt=""/></a>&nbsp;
<a href="?file=<?php echo $file;?>&action=delete&areaid=<?php echo $v['areaid'];?>&parentid=<?php echo $parentid;?>" onclick="return _delete();"><img src="admin/image/delete.png" width="16" height="16" title="ɾ��" alt=""/></a></td>
</tr>
<?php }?>
</table>
<div class="btns">
<span class="f_r">
��������:<strong class="f_red"><?php echo count($AREA);?></strong>&nbsp;&nbsp;
��ǰĿ¼:<strong class="f_blue"><?php echo count($DAREA);?></strong>&nbsp;&nbsp;
</span>
<input type="submit" name="submit" value="���µ���" class="btn" onclick="this.form.action='?file=<?php echo $file;?>&parentid=<?php echo $parentid;?>&action=update'"/>&nbsp;&nbsp;
<input type="submit" value="ɾ��ѡ��" class="btn" onclick="if(confirm('ȷ��Ҫɾ��ѡ�е����𣿴˲��������ɳ���')){this.form.action='?file=<?php echo $file;?>&parentid=<?php echo $parentid;?>&action=delete'}else{return false;}"/>&nbsp;&nbsp;
<?php if($parentid) {?>
<input type="button" value="�ϼ�����" class="btn" onclick="Go('?file=<?php echo $file;?>&parentid=<?php echo $AREA[$parentid]['parentid'];?>');"/>
<?php }?>
</div>
</form>
<form method="post" action="?">
<div class="tt">��ݲ���</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr align="center">
<td>
<div style="float:left;padding:10px;">
<?php echo ajax_area_select('aid', '�����ṹ', $parentid, 'size="2" style="width:200px;height:130px;" id="aid"');?></div>
<div style="float:left;padding:10px;">
	<table>
	<tr>
	<td><input type="submit" value="�������" class="btn" onclick="this.form.action='?file=<?php echo $file;?>&parentid='+Dd('aid').value;"/></td>
	</tr>
	<tr>
	<td><input type="submit" value="��ӵ���" class="btn" onclick="this.form.action='?file=<?php echo $file;?>&action=add&parentid='+Dd('aid').value;"/></td>
	</tr>
	<tr>
	<td><input type="submit" value="ɾ������" class="btn" onclick="if(confirm('ȷ��Ҫɾ��ѡ�е����𣿴˲��������ɳ���')){this.form.action='?file=<?php echo $file;?>&action=delete&areaid='+Dd('aid').value;}else{return false;}"/></td>
	</tr>
	</table>
</div>
</td>
</tr>
</table>
</div>
</form>
<br/>
<br/>
<br/>
<script type="text/javascript">Menuon(1);</script>
<?php include tpl('footer');?>