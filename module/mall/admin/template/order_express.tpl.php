<?php
defined('DT_ADMIN') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<div class="tt">��¼����</div>
<form action="?">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td>&nbsp;
<?php echo $fields_select;?>&nbsp;
<input type="text" size="30" name="kw" value="<?php echo $kw;?>"/>&nbsp;
<?php echo $status_select;?>&nbsp;
<input type="text" name="psize" value="<?php echo $pagesize;?>" size="2" class="t_c" title="��/ҳ"/>&nbsp;
<input type="submit" value="�� ��" class="btn"/>&nbsp;
<input type="button" value="�� ��" class="btn" onclick="Go('?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=<?php echo $action;?>');"/>
</td>
</tr>
<tr>
<td>&nbsp;
��ݵ��ţ�<input type="text" name="send_no" value="<?php echo $send_no;?>" size="15"/>&nbsp;
�������ţ�<input type="text" name="itemid" value="<?php echo $itemid;?>" size="5"/>&nbsp;
���ң�<input type="text" name="seller" value="<?php echo $seller;?>" size="10"/>&nbsp;
��ң�<input type="text" name="buyer" value="<?php echo $buyer;?>" size="10"/>&nbsp;

</td>
</tr>
</table>
</form>
<div class="tt">��ݼ�¼</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th>��������</th>
<th>��ݹ�˾</th>
<th>��ݵ���</th>
<th>���״̬</th>
<th>����</th>
<th>���</th>
<th width="150">�µ�ʱ��</th>
<th width="150">����ʱ��</th>
</tr>
<?php foreach($lists as $k=>$v) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td title="��������"><a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=show&mallid=<?php echo $mallid;?>&itemid=<?php echo $v['itemid'];?>"><?php echo $v['itemid'];?></a></td>
<td title="��ݹ���"><a href="<?php echo DT_PATH;?>api/express/home.php?e=<?php echo urlencode($v['send_type']);?>&n=<?php echo $v['send_no'];?>" target="_blank"><?php echo $v['send_type'];?></a>
</td>
<td title="���׷��"><a href="javascript:Dwidget('?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=show&id=<?php echo $v['mallid'];?>&itemid=<?php echo $v['itemid'];?>', '���׷��');"><?php echo $v['send_no'];?></a></td>
<td><?php echo $_send_status[$v['send_status']];?></td>
<td class="px11"><a href="javascript:_user('<?php echo $v['seller'];?>');"><?php echo $v['seller'];?></a></td>
<td class="px11"><a href="javascript:_user('<?php echo $v['buyer'];?>');"><?php echo $v['buyer'];?></a></td>
<td class="px11"><?php echo $v['addtime'];?></td>
<td class="px11"><?php echo $v['updatetime'];?></td>
</tr>
<?php }?>
</table>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">Menuon(2);</script>
<br/>
<?php include tpl('footer');?>