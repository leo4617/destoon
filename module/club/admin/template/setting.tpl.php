<?php
defined('DT_ADMIN') or exit('Access Denied');
include tpl('header');
$menus = array (
    array('��������'),
    array('SEO�Ż�'),
    array('Ȩ���շ�'),
    array('�����ֶ�', 'javascript:Dwidget(\'?file=fields&tb='.$table.'\', \'['.$MOD['name'].']�����ֶ�\');'),
    array('ģ�����', 'javascript:Dwidget(\'?file=template&dir='.$module.'\', \'['.$MOD['name'].']ģ�����\');'),
);
show_menu($menus);
?>
<form method="post" action="?">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="tab" id="tab" value="<?php echo $tab;?>"/>
<div id="Tabs0" style="display:">
<div class="tt">��������</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">Ĭ������ͼ[��X��]</td>
<td>
<input type="text" size="3" name="setting[thumb_width]" value="<?php echo $thumb_width;?>"/>
X
<input type="text" size="3" name="setting[thumb_height]" value="<?php echo $thumb_height;?>"/> px
</td>
</tr>

<tr>
<td class="tl">�Զ���ȡ���������</td>
<td><input type="text" size="3" name="setting[introduce_length]" value="<?php echo $introduce_length;?>"/> �ַ�</td>
</tr>
<tr>
<td class="tl">�༭�����߰�ť</td>
<td>
<select name="setting[editor]">
<option value="Default"<?php if($editor == 'Default') echo ' selected';?>>ȫ��</option>
<option value="Destoon"<?php if($editor == 'Destoon') echo ' selected';?>>����</option>
<option value="Simple"<?php if($editor == 'Simple') echo ' selected';?>>���</option>
<option value="Basic"<?php if($editor == 'Basic') echo ' selected';?>>����</option>
</select>
</td>
</tr>
<tr>
<td class="tl">��Ϣ����ʽ</td>
<td>
<input type="text" size="50" name="setting[order]" value="<?php echo $order;?>" id="order"/>
<select onchange="if(this.value) Dd('order').value=this.value;">
<option value="">��ѡ��</option>
<option value="addtime desc"<?php if($order == 'addtime desc') echo ' selected';?>>���ʱ��</option>
<option value="replytime desc"<?php if($order == 'replytime desc') echo ' selected';?>>�ظ�ʱ��</option>
<option value="itemid desc"<?php if($order == 'itemid desc') echo ' selected';?>>��ϢID</option>
</select>
</td>
</tr>
<tr>
<td class="tl">�б���������ֶ�</td>
<td><input type="text" size="80" name="setting[fields]" value="<?php echo $fields;?>"/><?php tips('�������һ���̶�������б������Ч�ʣ����������޸����⵼��SQL����');?></td>
</tr>
<tr>
<td class="tl">�������Բ���</td>
<td>
<input type="radio" name="setting[cat_property]" value="1"  <?php if($cat_property) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[cat_property]" value="0"  <?php if(!$cat_property) echo 'checked';?>/> �ر�
</td>
</tr>
<tr>
<td class="tl">��������Զ��ͼƬ</td>
<td>
<input type="radio" name="setting[save_remotepic]" value="1"  <?php if($save_remotepic) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[save_remotepic]" value="0"  <?php if(!$save_remotepic) echo 'checked';?>/> �ر�
</td>
</tr>
<tr>
<td class="tl">�����������</td>
<td>
<input type="radio" name="setting[clear_link]" value="1"  <?php if($clear_link) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[clear_link]" value="0"  <?php if(!$clear_link) echo 'checked';?>/> �ر�
</td>
</tr>
<tr>
<td class="tl">����ظ�����</td>
<td>
<input type="radio" name="setting[clear_alink]" value="1"  <?php if($clear_alink) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[clear_alink]" value="0"  <?php if(!$clear_alink) echo 'checked';?>/> �ر�
</td>
</tr>
<tr>
<td class="tl">���ݹ�������</td>
<td>
<input type="radio" name="setting[keylink]" value="1"  <?php if($keylink) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[keylink]" value="0"  <?php if(!$keylink) echo 'checked';?>/> �ر�
&nbsp;&nbsp;
<a href="javascript:Dwidget('?file=keylink&item=<?php echo $moduleid;?>', '[<?php echo $MOD['name'];?>]�������ӹ���');" class="t">[��������]</a>
</td>
</tr>
<tr>
<td class="tl">���ݷֱ�</td>
<td>
<input type="radio" name="setting[split]" value="1"  <?php if($split) echo 'checked';?> onclick="Ds('split_b');Dh('split_a');confirm('��ʾ:����֮ǰ�����Ȳ������\n\n�����ñȽϹؼ����������鲻Ҫ�ٹر�');"/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[split]" value="0"  <?php if(!$split) echo 'checked';?> onclick="Ds('split_a');Dh('split_b');confirm('��ʾ:�ر�֮ǰ�����Ⱥϲ�����');"/> �ر�
&nbsp;&nbsp;
<span style="display:none;" id="split_a">
<a href="?file=split&mid=<?php echo $moduleid;?>&action=merge" target="_blank" class="t" onclick="return confirm('ȷ��Ҫ�ϲ������𣿺ϲ��ɹ�֮���������ر����ݷֱ�\n\n�����ںϲ�֮ǰ����һ�����ݿ�');">[�ϲ�����]</a>
</span>
<span style="display:none;" id="split_b">
<a href="?file=split&mid=<?php echo $moduleid;?>" target="_blank" class="t" onclick="return confirm('ȷ��Ҫ��������𣿲�ֳɹ�֮���������������ݷֱ�\n\n�����ڲ��֮ǰ����һ�����ݿ�');">[�������]</a>
</span>
&nbsp;<?php tips('����������ݷֱ����ݱ�����id��10�����ݴ���һ������<br/>��������������10������Ҫ��������ǰ���idΪ'.$maxid.'��'.($maxid > 100000 ? '���鿪��' : '���迪��').'<br/>�����Ҫ���������ȵ������ݣ�Ȼ�󱣴�����<br/>�����Ҫ�رգ����ȵ�ϲ����ݣ�Ȼ�󱣴�����<br/>����һ���������벻Ҫ����رգ��������δ֪����ͬʱȫ���������ر�');?>
<input type="hidden" name="maxid" value="<?php echo $maxid;?>"/>
</td>
</tr>
<tr>
<td class="tl">ȫ������</td>
<td>
<input type="radio" name="setting[fulltext]" value="1" <?php if($fulltext==1){ ?>checked <?php } ?>/> LIKE&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[fulltext]" value="2" <?php if($fulltext==2){ ?>checked <?php } ?>/> MATCH&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[fulltext]" value="0" <?php if($fulltext==0){ ?>checked <?php } ?>/> �ر�
<?php tips('��������ӷ������������������Ҫ�ͷ��������þ����Ƿ�����MATCHģʽ��ҪMySQL 4���ϰ汾������Ҫ��MySQL��my.ini���ft_min_word_len=1����֧��2�����ֵ���������������������ÿ���ʹ��LIKEģʽ������Ч�ʻ����MATCHģʽ��<br/>����MATCHģʽ�������ݿ�ά����ִ������SQL���ȫ������<br/>ALTER TABLE `'.$table_data.'` ADD FULLTEXT (`content`);<br/>ȫ������ռ��һ�����ݿռ䣬���������MATCHģʽ����ִ���������ɾ������<br/>ALTER TABLE `'.$table_data.'` DROP INDEX `content`;');?></td>
</tr>
<tr>
<td class="tl">�������ı���</td>
<td>
<input type="text" name="setting[level]" style="width:98%;" value="<?php echo $level;?>"/>
<br/>�� | �ָ���ͬ���� ���ζ�Ӧ 1|2|3|4|5|6|7|8|9 �� <?php echo level_select('post[level]', '�ύ����Ԥ��Ч��');?>
</td>
</tr>
<tr style="display:<?php echo DT_EDITOR == 'fckeditor' ? '' : 'none';?>">
<td class="tl">�༭��������ͼ</td>
<td>
<input type="radio" name="setting[swfu]" value="0"  <?php if($swfu==0) echo 'checked';?>/> �ر�&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[swfu]" value="1"  <?php if($swfu==1) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[swfu]" value="2"  <?php if($swfu==2) echo 'checked';?>/> ��̨���� <?php tips('�����󣬱༭���½�����������ͼ���ܣ��������ݲ���ͼƬ');?>
</td>
</tr>
<tr>
<td class="tl">ǰ̨������ԭ��</td>
<td>
<textarea name="setting[manage_reasons]" style="width:98%;height:30px;overflow:visible;"><?php echo $manage_reasons;?></textarea>
</td>
</tr>
<tr>
<td class="tl">ǰ̨�������ԭ��</td>
<td>
<input type="radio" name="setting[manage_reason]" value="0" <?php if($manage_reason==0) echo 'checked';?>/> ѡ��&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[manage_reason]" value="1" <?php if($manage_reason==1) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
</td>
</tr>
<tr>
<td class="tl">ǰ̨����֪ͨ����</td>
<td>
<input type="radio" name="setting[manage_message]" value="0" <?php if($manage_message==0) echo 'checked';?>/> Ĭ��&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[manage_message]" value="1" <?php if($manage_message==1) echo 'checked';?>/> ѡ��&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[manage_message]" value="2" <?php if($manage_message==2) echo 'checked';?>/> ǿ�� <?php tips('Ĭ�� - Ĭ�ϲ�ѡ��֪ͨѡ�Ȧ�ӻ������������ѡ��<br/>ѡ�� - Ĭ��ѡ��֪ͨѡ�Ȧ�ӻ������������ȡ��<br/>ǿ�� - Ĭ��ѡ��֪ͨѡ�Ȧ�ӻ������������ȡ��');?>
</td>
</tr>
<tr>
<td class="tl">¥�����ı���</td>
<td>
<input type="text" name="setting[floor]" style="width:98%;" value="<?php echo $floor;?>"/></td>
</tr>

<tr>
<td class="tl">��ҳ�õ���Ϣ����</td>
<td><input type="text" size="3" name="setting[page_islide]" value="<?php echo $page_islide;?>"/></td>
</tr>

<tr>
<td class="tl">��ҳ������Ȧ����</td>
<td><input type="text" size="3" name="setting[page_icat]" value="<?php echo $page_icat;?>"/></td>
</tr>

<tr>
<td class="tl">�б��ö���������</td>
<td><input type="text" size="3" name="setting[maxontop]" value="<?php echo $maxontop;?>"/></td>
</tr>

<tr>
<td class="tl">�б���Ϣ��ҳ����</td>
<td><input type="text" size="3" name="setting[pagesize]" value="<?php echo $pagesize;?>"/></td>
</tr>

<tr>
<td class="tl">����ÿҳ��ʾ�ظ�</td>
<td><input type="text" size="3" name="setting[reply_pagesize]" value="<?php echo $reply_pagesize;?>"/></td>
</tr>

<tr>
<td class="tl">����ͼƬ�����</td>
<td><input type="text" size="3" name="setting[max_width]" value="<?php echo $max_width;?>"/> px</td>
</tr>

</table>
</div>

<div id="Tabs1" style="display:none">
<div class="tt">SEO�Ż�</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">��ҳ�Ƿ�����html</td>
<td>
<input type="radio" name="setting[index_html]" value="1"  <?php if($index_html){ ?>checked <?php } ?>/> ��&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[index_html]" value="0"  <?php if(!$index_html){ ?>checked <?php } ?>/> ��
</td>
</tr>
<tr>
<td class="tl">�б�ҳ�Ƿ�����html</td>
<td>
<input type="radio" name="setting[list_html]" value="1"  <?php if($list_html){ ?>checked <?php } ?> onclick="Dd('list_html').style.display='';Dd('list_php').style.display='none';"/> ��&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[list_html]" value="0"  <?php if(!$list_html){ ?>checked <?php } ?> onclick="Dd('list_html').style.display='none';Dd('list_php').style.display='';"/> ��
</td>
</tr>
<tbody id="list_html" style="display:<?php echo $list_html ? '' : 'none'; ?>">
<tr>
<td class="tl">HTML�б�ҳ�ļ���ǰ׺</td>
<td><input name="setting[htm_list_prefix]" type="text" id="htm_list_prefix" value="<?php echo $htm_list_prefix;?>" size="10"></td>
</tr>
<tr>
<td class="tl">HTML�б�ҳ��ַ����</td>
<td><?php echo url_select('setting[htm_list_urlid]', 'htm', 'list', $htm_list_urlid);?><?php tips('��ʾ:�����б����./api/url.inc.php�ļ����Զ���');?></td>
</tr>
</tbody>
<tr id="list_php" style="display:<?php echo $list_html ? 'none' : ''; ?>">
<td class="tl">PHP�б�ҳ��ַ����</td>
<td><?php echo url_select('setting[php_list_urlid]', 'php', 'list', $php_list_urlid);?></td>
</tr>
<tr>
<td class="tl">����ҳ�Ƿ�����html</td>
<td>
<input type="radio" name="setting[show_html]" value="1"  <?php if($show_html){ ?>checked <?php } ?> onclick="Dd('show_html').style.display='';Dd('show_php').style.display='none';"/> ��&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[show_html]" value="0"  <?php if(!$show_html){ ?>checked <?php } ?> onclick="Dd('show_html').style.display='none';Dd('show_php').style.display='';"/> ��
</td>
</tr>
<tbody id="show_html" style="display:<?php echo $show_html ? '' : 'none'; ?>">
<tr>
<td class="tl">HTML����ҳ�ļ���ǰ׺</td>
<td><input name="setting[htm_item_prefix]" type="text" id="htm_item_prefix" value="<?php echo $htm_item_prefix;?>" size="10"></td>
</tr>
<tr>
<td class="tl">HTML����ҳ��ַ����</td>
<td><?php echo url_select('setting[htm_item_urlid]', 'htm', 'item', $htm_item_urlid);?></td>
</tr>
</tbody>
<tr id="show_php" style="display:<?php echo $show_html ? 'none' : ''; ?>">
<td class="tl">PHP����ҳ��ַ����</td>
<td><?php echo url_select('setting[php_item_urlid]', 'php', 'item', $php_item_urlid);?></td>
</tr>
<tr>
<td class="tl">��Ȧ����׺</td>
<td><input name="setting[seo_name]" type="text" id="seo_name" value="<?php echo $seo_name;?>" size="5"/></td>
</tr>

<tr>
<td class="tl">ģ����ҳTitle<br/>(��ҳ����)</td>
<td><input name="setting[seo_title_index]" type="text" id="seo_title_index" value="<?php echo $seo_title_index;?>" style="width:90%;"/><br/> 
���ñ�����<?php echo seo_title('seo_title_index', array('modulename', 'sitename', 'sitetitle', 'page', 'delimiter'));?><br/>
֧��ҳ��PHP����������{$MOD[name]}��ʾģ������
</td>
</tr>
<tr>
<td class="tl">ģ����ҳKeywords<br/>(��ҳ�ؼ���)</td>
<td><input name="setting[seo_keywords_index]" type="text" id="seo_keywords_index" value="<?php echo $seo_keywords_index;?>" style="width:90%;"/><br/> 
<?php echo seo_title('seo_keywords_index', array('modulename', 'sitename', 'sitetitle'));?>
</td>
</tr>
<tr>
<td class="tl">ģ����ҳDescription<br/>(��ҳ����)</td>
<td><input name="setting[seo_description_index]" type="text" id="seo_description_index" value="<?php echo $seo_description_index;?>" style="width:90%;"/><br/> 
<?php echo seo_title('seo_description_index', array('modulename', 'sitename', 'sitetitle'));?>
</td>
</tr>

<tr>
<td class="tl">�б�ҳTitle<br/>(��ҳ����)</td>
<td><input name="setting[seo_title_list]" type="text" id="seo_title_list" value="<?php echo $seo_title_list;?>" style="width:90%;"/><br/> 
<?php echo seo_title('seo_title_list', array('catname', 'cattitle', 'modulename', 'sitename', 'sitetitle', 'page', 'delimiter'));?>
</td>
</tr>
<tr>
<td class="tl">�б�ҳKeywords<br/>(��ҳ�ؼ���)</td>
<td><input name="setting[seo_keywords_list]" type="text" id="seo_keywords_list" value="<?php echo $seo_keywords_list;?>" style="width:90%;"/><br/> 
<?php echo seo_title('seo_keywords_list', array('catname', 'catkeywords', 'modulename', 'sitename', 'sitekeywords'));?></td>
</tr>
<tr>
<td class="tl">�б�ҳDescription<br/>(��ҳ����)</td>
<td><input name="setting[seo_description_list]" type="text" id="seo_description_list" value="<?php echo $seo_description_list;?>" style="width:90%;"/><br/> 
<?php echo seo_title('seo_description_list', array('catname', 'catdescription', 'modulename', 'sitename', 'sitedescription'));?></td>
</tr>

<tr>
<td class="tl">����ҳTitle<br/>(��ҳ����)</td>
<td><input name="setting[seo_title_show]" type="text" id="seo_title_show" value="<?php echo $seo_title_show;?>" style="width:90%;"/><br/>
<?php echo seo_title('seo_title_show', array('showtitle', 'catname', 'cattitle', 'modulename', 'sitename', 'sitetitle', 'delimiter'));?>
</td>
</tr>
<tr>
<td class="tl">����ҳKeywords<br/>(��ҳ�ؼ���)</td>
<td><input name="setting[seo_keywords_show]" type="text" id="seo_keywords_show" value="<?php echo $seo_keywords_show;?>" style="width:90%;"/><br/>
<?php echo seo_title('seo_keywords_show', array('showtitle', 'catname', 'catkeywords', 'modulename', 'sitename', 'sitekeywords'));?>
</td>
</tr>
<tr>
<td class="tl">����ҳDescription<br/>(��ҳ����)</td>
<td><input name="setting[seo_description_show]" type="text" id="seo_description_show" value="<?php echo $seo_description_show;?>" style="width:90%;"/><br/>
<?php echo seo_title('seo_description_show', array('showtitle', 'showintroduce', 'catname', 'catdescription', 'modulename', 'sitename', 'sitedescription'));?>
</td>
</tr>
</table>
</div>

<div id="Tabs2" style="display:none">
<div class="tt">Ȩ���շ�</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">�������ģ����ҳ</td>
<td><?php echo group_checkbox('setting[group_index][]', $group_index);?></td>
</tr>
<tr>
<td class="tl">������������б�</td>
<td><?php echo group_checkbox('setting[group_list][]', $group_list);?></td>
</tr>
<tr>
<td class="tl">����鿴��������</td>
<td><?php echo group_checkbox('setting[group_show][]', $group_show);?></td>
</tr>
<tr>
<td class="tl">����������Ϣ</td>
<td><?php echo group_checkbox('setting[group_search][]', $group_search);?></td>
</tr>
<tr>
<td class="tl">����ظ�����</td>
<td><?php echo group_checkbox('setting[group_reply][]', $group_reply);?></td>
</tr>
<tr>
<td class="tl">��˴�����Ȧ</td>
<td>
<input type="radio" name="setting[check_group]" value="2"  <?php if($check_group == 2) echo 'checked';?>> �̳л�Ա������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[check_group]" value="1"  <?php if($check_group == 1) echo 'checked';?>> ȫ������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[check_group]" value="0"  <?php if($check_group == 0) echo 'checked';?>> ȫ���ر�
</td>
</tr>
<tr>
<td class="tl">������Ȧ��֤��</td>
<td>
<input type="radio" name="setting[captcha_group]" value="2"  <?php if($captcha_group == 2) echo 'checked';?>> �̳л�Ա������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[captcha_group]" value="1"  <?php if($captcha_group == 1) echo 'checked';?>> ȫ������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[captcha_group]" value="0"  <?php if($captcha_group == 0) echo 'checked';?>> ȫ���ر�
</td>
</tr>
<tr>
<td class="tl">������Ȧ��֤����</td>
<td>
<input type="radio" name="setting[question_group]" value="2"  <?php if($question_group == 2) echo 'checked';?>> �̳л�Ա������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[question_group]" value="1"  <?php if($question_group == 1) echo 'checked';?>> ȫ������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[question_group]" value="0"  <?php if($question_group == 0) echo 'checked';?>> ȫ���ر�
</td>
</tr>

<tr>
<td class="tl">�����Ȧ����</td>
<td>
<input type="radio" name="setting[check_add]" value="2"  <?php if($check_add == 2) echo 'checked';?>> �̳л�Ա������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[check_add]" value="1"  <?php if($check_add == 1) echo 'checked';?>> ȫ������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[check_add]" value="0"  <?php if($check_add == 0) echo 'checked';?>> ȫ���ر�
</td>
</tr>
<tr>
<td class="tl">��Ȧ������֤��</td>
<td>
<input type="radio" name="setting[captcha_add]" value="2"  <?php if($captcha_add == 2) echo 'checked';?>> �̳л�Ա������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[captcha_add]" value="1"  <?php if($captcha_add == 1) echo 'checked';?>> ȫ������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[captcha_add]" value="0"  <?php if($captcha_add == 0) echo 'checked';?>> ȫ���ر�
</td>
</tr>
<tr>
<td class="tl">��Ȧ������֤����</td>
<td>
<input type="radio" name="setting[question_add]" value="2"  <?php if($question_add == 2) echo 'checked';?>> �̳л�Ա������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[question_add]" value="1"  <?php if($question_add == 1) echo 'checked';?>> ȫ������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[question_add]" value="0"  <?php if($question_add == 0) echo 'checked';?>> ȫ���ر�
</td>
</tr>

<tr>
<td class="tl">������ӻظ�</td>
<td>
<input type="radio" name="setting[check_reply]" value="2"  <?php if($check_reply == 2) echo 'checked';?>> �̳л�Ա������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[check_reply]" value="1"  <?php if($check_reply == 1) echo 'checked';?>> ȫ������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[check_reply]" value="0"  <?php if($check_reply == 0) echo 'checked';?>> ȫ���ر�
</td>
</tr>
<tr>
<td class="tl">���ӻظ���֤��</td>
<td>
<input type="radio" name="setting[captcha_reply]" value="2"  <?php if($captcha_reply == 2) echo 'checked';?>> �̳л�Ա������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[captcha_reply]" value="1"  <?php if($captcha_reply == 1) echo 'checked';?>> ȫ������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[captcha_reply]" value="0"  <?php if($captcha_reply == 0) echo 'checked';?>> ȫ���ر�
</td>
</tr>
<tr>
<td class="tl">���ӻظ���֤����</td>
<td>
<input type="radio" name="setting[question_reply]" value="2"  <?php if($question_reply == 2) echo 'checked';?>> �̳л�Ա������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[question_reply]" value="1"  <?php if($question_reply == 1) echo 'checked';?>> ȫ������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[question_reply]" value="0"  <?php if($question_reply == 0) echo 'checked';?>> ȫ���ر�
</td>
</tr>

<tr>
<td class="tl">��Ա�Ƿ��շ�</td>
<td>
<input type="radio" name="setting[fee_mode]" value="1"  <?php if($fee_mode == 1) echo 'checked';?>> �̳л�Ա������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[fee_mode]" value="0"  <?php if($fee_mode == 0) echo 'checked';?>> ȫ������
</td>
</tr>
<tr>
<td class="tl">��Ա�շ�ʹ��</td>
<td>
<input type="radio" name="setting[fee_currency]" value="money"  <?php if($fee_currency == 'money') echo 'checked';?>/> <?php echo $DT['money_name'];?>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[fee_currency]" value="credit"  <?php if($fee_currency == 'credit') echo 'checked';?>/> <?php echo $DT['credit_name'];?>
</td>
</tr>
<tr>
<td class="tl">������Ϣ�շ�</td>
<td><input type="text" size="5" name="setting[fee_add]" value="<?php echo $fee_add;?>"/> <?php echo $fee_currency == 'money' ? $DT['money_unit'] : $DT['credit_unit'];?>/��</td>
</tr>
<tr>
<td class="tl">�鿴��Ϣ�շ�</td>
<td><input type="text" size="5" name="setting[fee_view]" value="<?php echo $fee_view;?>"/> <?php echo $fee_currency == 'money' ? $DT['money_unit'] : $DT['credit_unit'];?>/��</td>
</tr>
<tr>
<td class="tl">�շ���Чʱ��</td>
<td><input type="text" size="5" name="setting[fee_period]" value="<?php echo $fee_period;?>"/> ���� <?php tips('���֧��ʱ�䳬����Чʱ�䣬ϵͳ�������շ�<br/>�����ʾ���ظ��շ�');?></td>
</tr>
<tr>
<td class="tl">�򷢲��˷���</td>
<td><input type="text" size="2" name="setting[fee_back]" value="<?php echo $fee_back;?>"/> % <?php tips('����д1-100֮������֣��û�֧��֮��ϵͳ�����˱����򷢲������Ӷ�Ӧ��'.$DT['money_name'].'����'.$DT['credit_name']);?></td>
</tr>
<tr>
<td class="tl">δ֧��������ʾ</td>
<td><input type="text" size="5" name="setting[pre_view]" value="<?php echo $pre_view;?>"/> �ַ�</td>
</tr>
</table>
<div class="tt"><?php echo $DT['credit_name'];?>����</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">�������ӽ���</td>
<td><input type="text" size="5" name="setting[credit_add]" value="<?php echo $credit_add;?>"/></td>
</tr>
<tr>
<td class="tl">���ӱ��Ӿ�����</td>
<td><input type="text" size="5" name="setting[credit_level]" value="<?php echo $credit_level;?>"/></td>
</tr>
<tr>
<td class="tl">���ӱ�ɾ���۳�</td>
<td><input type="text" size="5" name="setting[credit_del]" value="<?php echo $credit_del;?>"/></td>
</tr>
<tr>
<td class="tl">�����ظ�����</td>
<td><input type="text" size="5" name="setting[credit_reply]" value="<?php echo $credit_reply;?>"/></td>
</tr>
<tr>
<td class="tl">�ظ���ɾ���۳�</td>
<td><input type="text" size="5" name="setting[credit_del_reply]" value="<?php echo $credit_del_reply;?>"/></td>
</tr>
</table>
</div>
<div class="sbt">
<input type="submit" name="submit" value="ȷ ��" class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" value="չ ��" id="ShowAll" class="btn" onclick="TabAll();" title="չ��/�ϲ�����ѡ��"/>
</div>
</form>
<script type="text/javascript">
var tab = <?php echo $tab;?>;
var all = <?php echo $all;?>;
function TabAll() {
	var i = 0;
	while(1) {
		if(Dd('Tabs'+i) == null) break;
		Dd('Tabs'+i).style.display = all ? (i == tab ? '' : 'none') : '';
		i++;
	}
	Dd('ShowAll').value = all ? 'չ ��' : '�� ��';
	all = all ? 0 : 1;
}
window.onload=function() {
	if(tab) Tab(tab);
	if(all) {all = 0; TabAll();}
}
</script>
<?php include tpl('footer');?>