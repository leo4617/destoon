<?php
defined('DT_ADMIN') or exit('Access Denied');
include tpl('header');
$menus = array (
    array('ģ������'),
    array('ģ�����', 'javascript:Dwidget(\'?file=template&dir='.$module.'\', \'['.$MOD['name'].']ģ�����\');'),
);
show_menu($menus);
?>
<form method="post" action="?">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="tab" id="tab" value="<?php echo $tab;?>"/>
<input type="hidden" name="setting[oauth]" value="<?php echo $oauth;?>"/>
<input type="hidden" name="setting[weixin]" value="<?php echo $weixin;?>"/>
<div id="Tabs0" style="display:">
<div class="tt">ͨ������</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">�б�ҳ��ַ����</td>
<td>
<select name="setting[list_url]">
<option value="0"<?php if($list_url == 0) echo ' selected';?>>�� (��̬) list.php?catid=1&amp;page=2</option>
<option value="1"<?php if($list_url == 1) echo ' selected';?>>�� (α��̬) list-1-2.html</option> 
<option value="2"<?php if($list_url == 2) echo ' selected';?>>�� (α��̬) list/1/</option>
</select>
</td>
</tr>
<tr>
<td class="tl">����ҳ��ַ����</td>
<td>
<select name="setting[show_url]">
<option value="0"<?php if($show_url == 0) echo ' selected';?>>�� (��̬) show.php?itemid=1&amp;page=2</option>
<option value="1"<?php if($show_url == 1) echo ' selected';?>>�� (α��̬) show-1-2.html</option> 
<option value="2"<?php if($show_url == 2) echo ' selected';?>>�� (α��̬) show/1/</option>
</select>
</td>
</tr>
</table>
<a name="mobile"></a>
<div class="tt">�ֻ�������</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">�ֻ��湦��</td>
<td>
<input type="radio" name="setting[mobile_enable]" value="1"  <?php if($mobile_enable) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[mobile_enable]" value="0"  <?php if(!$mobile_enable) echo 'checked';?>/> �ر�
</td>
</tr>
<tr> 
<td class="tl">�ֻ��������</td>
<td><input name="setting[mobile_domain]" type="text" size="30" value="<?php echo $mobile_domain;?>"/><?php tips('���� http://m.destoon.com/<br/>�뽫������������վmobileĿ¼');?></td>
</tr>
<tr> 
<td class="tl">�ֻ�����վ���</td>
<td><input name="setting[mobile_sitename]" type="text" size="10" value="<?php echo $mobile_sitename;?>"/><?php tips('���������5���������ڣ�����Ĭ����ʾ��վ����');?></td>
</tr>
<tr> 
<td class="tl">�ֻ�����ҳ�õƹ��λID</td>
<td><input name="setting[mobile_pid]" type="text" size="5" value="<?php echo $mobile_pid;?>" id="mobile_pid"/> <a href="javascript:Dwidget('?moduleid=<?php echo $moduleid;?>&file=ad'+(Dd('mobile_pid').value>0 ? '&action=list&pid='+Dd('mobile_pid').value : ''), '�õƹ��');" class="t">[������]</a> <?php tips('�뽨��һ���õƹ��λ������д���λID����0��ʾ����ʾ�õƹ��');?></td>
</tr>
<tr>
<td class="tl">�ֻ������Զ���ת</td>
<td>
<input type="radio" name="setting[mobile_goto]" value="1"  <?php if($mobile_goto) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[mobile_goto]" value="0"  <?php if(!$mobile_goto) echo 'checked';?>/> �ر�
</td>
</tr><tr>
<td class="tl">�ֻ���ҳ�涯��Ч��</td>
<td>
<input type="radio" name="setting[mobile_ajax]" value="1"  <?php if($mobile_ajax) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[mobile_ajax]" value="0"  <?php if(!$mobile_ajax) echo 'checked';?>/> �ر�<?php tips('����֮��ҳ��������APP�Ĺ����л�Ч�������ǻᵼ�°ٶȵȵ��������˹���޷���ʾ');?>
</td>
</tr>
</table>
<a name="spread"></a>
<div class="tt">�����ƹ�</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr> 
<td class="tl">�����ƹ������</td>
<td><input name="setting[spread_domain]"  type="text" size="30" value="<?php echo $spread_domain;?>"/><?php tips('���� http://spread.destoon.com/<br/>�뽫������������վspreadĿ¼');?></td>
</tr>
<tr> 
<td class="tl">��Ӧ�������</td>
<td><input name="setting[spread_sell_price]"  type="text" size="5" value="<?php echo $spread_sell_price;?>"/></td>
</tr>
<tr> 
<td class="tl">���������</td>
<td><input name="setting[spread_buy_price]"  type="text" size="5" value="<?php echo $spread_buy_price;?>"/></td>
</tr>
<tr>
<td class="tl">��˾�������</td>
<td><input name="setting[spread_company_price]"  type="text" size="5" value="<?php echo $spread_company_price;?>"/></td>
</tr>
<tr>
<td class="tl">�Ӽ۷���</td>
<td><input name="setting[spread_step]"  type="text" size="5" value="<?php echo $spread_step;?>"/><?php tips('��������˼Ӽ۷��ȣ�����۱�������ۼӼӼ۷��ȵı���');?></td>
</tr>
<tr>
<td class="tl">���ɹ�������</td>
<td><input name="setting[spread_month]"  type="text" size="5" value="<?php echo $spread_month;?>"/><?php tips('����Ϊ��λ ����Ϊ1����');?></td>
</tr>
<tr>
<td class="tl">ͬһ�µ�����๺�����</td>
<td><input name="setting[spread_max]"  type="text" size="5" value="<?php echo $spread_max;?>"/></td>
</tr>
<tr>
<td class="tl">����������Ҫ���</td>
<td>
<input type="radio" name="setting[spread_check]" value="1"  <?php if($spread_check) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[spread_check]" value="0"  <?php if(!$spread_check) echo 'checked';?>/> �ر�
</td>
</tr>
<tr>
<td class="tl">��ʷ�����б�</td>
<td>
<input type="radio" name="setting[spread_list]" value="1"  <?php if($spread_list) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[spread_list]" value="0"  <?php if(!$spread_list) echo 'checked';?>/> �ر�
</td>
</tr>
<tr>
<td class="tl">��������ʹ��</td>
<td>
<input type="radio" name="setting[spread_currency]" value="money"  <?php if($spread_currency == 'money') echo 'checked';?>/> <?php echo $DT['money_name'];?>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[spread_currency]" value="credit"  <?php if($spread_currency == 'credit') echo 'checked';?>/> <?php echo $DT['credit_name'];?>
</td>
</tr>
</table>

<a name="ad"></a>
<div class="tt">�������</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">��湦��</td>
<td>
<input type="radio" name="setting[ad_enable]" value="1"  <?php if($ad_enable) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[ad_enable]" value="0"  <?php if(!$ad_enable) echo 'checked';?>/> �ر�
</td>
</tr>
<tr> 
<td class="tl">��������</td>
<td><input name="setting[ad_domain]"  type="text" size="30" value="<?php echo $ad_domain;?>"/><?php tips('���� http://ad.destoon.com/<br/>�뽫������������վadĿ¼');?></td>
</tr>
<tr>
<td class="tl">���λԤ��</td>
<td>
<input type="radio" name="setting[ad_view]" value="1"  <?php if($ad_view) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[ad_view]" value="0"  <?php if(!$ad_view) echo 'checked';?>/> �ر�
</td>
</tr>
<tr>
<td class="tl">������߹���</td>
<td>
<input type="radio" name="setting[ad_buy]" value="1"  <?php if($ad_buy) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[ad_buy]" value="0"  <?php if(!$ad_buy) echo 'checked';?>/> �ر�
</td>
</tr>
<tr>
<td class="tl">������ʹ��</td>
<td>
<input type="radio" name="setting[ad_currency]" value="money"  <?php if($ad_currency == 'money') echo 'checked';?>/> <?php echo $DT['money_name'];?>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[ad_currency]" value="credit"  <?php if($ad_currency == 'credit') echo 'checked';?>/> <?php echo $DT['credit_name'];?>
</td>
</tr>
</table>

<a name="announce"></a>
<div class="tt">��������</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">���湦��</td>
<td>
<input type="radio" name="setting[announce_enable]" value="1"  <?php if($announce_enable) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[announce_enable]" value="0"  <?php if(!$announce_enable) echo 'checked';?>/> �ر�
</td>
</tr>
<tr> 
<td class="tl">���������</td>
<td><input name="setting[announce_domain]"  type="text" size="30" value="<?php echo $announce_domain;?>"/><?php tips('���� http://announce.destoon.com/<br/>�뽫������������վannounceĿ¼');?></td>
</tr>
</table>

<a name="link"></a>
<div class="tt">��������</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">�������ӹ���</td>
<td>
<input type="radio" name="setting[link_enable]" value="1"  <?php if($link_enable) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[link_enable]" value="0"  <?php if(!$link_enable) echo 'checked';?>/> �ر�
</td>
</tr>
<tr> 
<td class="tl">�������Ӱ�����</td>
<td><input name="setting[link_domain]"  type="text" size="30" value="<?php echo $link_domain;?>"/><?php tips('���� http://link.destoon.com/<br/>�뽫������������վlinkĿ¼');?></td>
</tr>
<tr>
<td class="tl">����������������</td>
<td>
<input type="radio" name="setting[link_reg]" value="1"  <?php if($link_reg) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[link_reg]" value="0"  <?php if(!$link_reg) echo 'checked';?>/> �ر�
</td>
</tr>
<tr>
<td class="tl">����˵��</td>
<td><textarea name="setting[link_request]" id="link_request" style="width:500px;height:50px;"><?php echo $link_request;?></textarea><br/>֧��HTML�﷨�� �ո� &amp;nbsp; ����  &lt;br/&gt;
</td> 
</tr>
</table>

<a name="comment"></a>
<div class="tt">��������</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr> 
<td class="tl">���۰�����</td>
<td><input name="setting[comment_domain]"  type="text" size="30" value="<?php echo $comment_domain;?>"/><?php tips('���� http://comment.destoon.com/<br/>�뽫������������վcommentĿ¼');?></td>
</tr>
<tr>
<td class="tl">�������۵�ģ��</td>
<td><?php echo module_checkbox('setting[comment_module][]', $comment_module, '1,2,3');?></td>
</tr>
<tr>
<td class="tl">����������ϵͳ</td>
<td>
<select name="setting[comment_api]" id="comment_api" onchange="if(this.value){Ds('comment_api_1');Dh('comment_api_0');}else{Dh('comment_api_1');Ds('comment_api_0');}">
<option value=""<?php if($comment_api == '') echo ' selected';?>>��ʹ��</option>
<option value="changyan"<?php if($comment_api == 'changyan') echo ' selected';?>>���� - changyan.kuaizhan.com</option>
<option value="duoshuo"<?php if($comment_api == 'duoshuo') echo ' selected';?>>��˵ - duoshuo.com</option>
</select>
</td>
</tr>
<tbody id="comment_api_1" style="display:<?php echo $comment_api ? '' : 'none';?>">
<tr>
<td class="tl">APP ID</td>
<td><input name="setting[comment_api_id]"  type="text" size="50" value="<?php echo $comment_api_id;?>"/><?php tips('����:��д�������appid<br/>��˵:��д�����е�short_name');?></td>
</tr>
<tr>
<td class="tl">APP KEY</td>
<td><input name="setting[comment_api_key]"  type="text" size="50" value="<?php echo $comment_api_key;?>"/><?php tips('����:��д�������conf��prod_��ͷ<br/>��˵:���ղ���');?></td>
</tr>
</tbody>
<tbody id="comment_api_0" style="display:<?php echo $comment_api ? 'none' : '';?>">
<tr>
<td class="tl">����ҳ��ʾ�����б�</td>
<td>
<input type="radio" name="setting[comment_show]" value="1"  <?php if($comment_show == 1) echo 'checked';?>> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[comment_show]" value="0"  <?php if($comment_show == 0) echo 'checked';?>> �ر�
</td>
</tr>
<tr>
<td class="tl">�������۵Ļ�Ա��</td>
<td><?php echo group_checkbox('setting[comment_group][]', $comment_group);?></td>
</tr>
<tr>
<td class="tl">����֧�ַ��ԵĻ�Ա��</td>
<td><?php echo group_checkbox('setting[comment_vote_group][]', $comment_group);?></td>
</tr>
<tr>
<td class="tl">�������</td>
<td>
<input type="radio" name="setting[comment_check]" value="2"  <?php if($comment_check == 2) echo 'checked';?>> �̳л�Ա������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[comment_check]" value="1"  <?php if($comment_check == 1) echo 'checked';?>> ȫ������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[comment_check]" value="0"  <?php if($comment_check == 0) echo 'checked';?>> ȫ���ر�
</td>
</tr>
<tr>
<td class="tl">��������������֤��</td>
<td>
<input type="radio" name="setting[comment_captcha_add]" value="2"  <?php if($comment_captcha_add == 2) echo 'checked';?>> �̳л�Ա������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[comment_captcha_add]" value="1"  <?php if($comment_captcha_add == 1) echo 'checked';?>> ȫ������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[comment_captcha_add]" value="0"  <?php if($comment_captcha_add == 0) echo 'checked';?>> ȫ���ر�
</td>
</tr>
<tr>
<td class="tl">��Ϣ������ɾ������</td>
<td><?php echo module_checkbox('setting[comment_user_del][]', $comment_user_del, '1,2,3');?></td>
</tr>
<tr>
<td class="tl">����Աǰ̨ɾ������</td>
<td>
<input type="radio" name="setting[comment_admin_del]" value="1"  <?php if($comment_admin_del == 1) echo 'checked';?>> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[comment_admin_del]" value="0"  <?php if($comment_admin_del == 0) echo 'checked';?>> �ر�
</td>
</tr>
<tr>
<td class="tl">����֧�ַ���</td>
<td>
<input type="radio" name="setting[comment_vote]" value="1"  <?php if($comment_vote) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[comment_vote]" value="0"  <?php if(!$comment_vote) echo 'checked';?>/> �ر�
</td>
</tr>
<tr>
<td class="tl">����������������</td>
<td>&nbsp;
<input type="text" size="5" name="setting[comment_min]" value="<?php echo $comment_min;?>"/> ��
<input type="text" size="5" name="setting[comment_max]" value="<?php echo $comment_max;?>"/> �ֽ�
</td>
</tr>
<tr>
<td class="tl">��������ʱ����</td>
<td>&nbsp;
<input type="text" size="5" name="setting[comment_time]" value="<?php echo $comment_time;?>"/> ��
</td>
</tr>
<tr>
<td class="tl">ÿҳ��ʾ���۸���</td>
<td>&nbsp;
<input type="text" size="5" name="setting[comment_pagesize]" value="<?php echo $comment_pagesize;?>"/> ��
</td>
</tr>
<tr>
<td class="tl">����Ա��IPÿ������</td>
<td>&nbsp;
<input type="text" size="5" name="setting[comment_limit]" value="<?php echo $comment_limit;?>"/> ��
</td>
</tr>
<tr>
<td class="tl">������������<?php echo $DT['credit_name'];?></td>
<td>&nbsp;
<input type="text" size="5" name="setting[credit_add_comment]" value="<?php echo $credit_add_comment;?>"/>
</td>
</tr>
<tr>
<td class="tl">����ɾ���۳�<?php echo $DT['credit_name'];?></td>
<td>&nbsp;
<input type="text" size="5" name="setting[credit_del_comment]" value="<?php echo $credit_del_comment;?>"/>
</td>
</tr>
<tr>
<td class="tl">���������ǳ�</td>
<td>&nbsp;
<input type="text" size="10" name="setting[comment_am]" value="<?php echo $comment_am;?>"/>
</td>
</tr>
</tbody>
</table>
</div>

<a name="guestbook"></a>
<div class="tt">��������</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">���Թ���</td>
<td>
<input type="radio" name="setting[guestbook_enable]" value="1"  <?php if($guestbook_enable) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[guestbook_enable]" value="0"  <?php if(!$guestbook_enable) echo 'checked';?>/> �ر�
</td>
</tr>
<tr> 
<td class="tl">���԰�����</td>
<td><input name="setting[guestbook_domain]"  type="text" size="30" value="<?php echo $guestbook_domain;?>"/><?php tips('���� http://guestbook.destoon.com/<br/>�뽫������������վguestbookĿ¼');?></td>
</tr>
<tr> 
<td class="tl">��������</td>
<td><input name="setting[guestbook_type]"  type="text" size="60" value="<?php echo $guestbook_type;?>"/></td>
</tr>
<tr>
<td class="tl">������֤��</td>
<td>
<input type="radio" name="setting[guestbook_captcha]" value="1"  <?php if($guestbook_captcha) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[guestbook_captcha]" value="0"  <?php if(!$guestbook_captcha) echo 'checked';?>/> �ر�
</td>
</tr>
</table>

<a name="gift"></a>
<div class="tt">���ֻ�������</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">���ֻ�����</td>
<td>
<input type="radio" name="setting[gift_enable]" value="1"  <?php if($gift_enable) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[gift_enable]" value="0"  <?php if(!$gift_enable) echo 'checked';?>/> �ر�
</td>
</tr>
<tr> 
<td class="tl">���ֻ��������</td>
<td><input name="setting[gift_domain]"  type="text" size="30" value="<?php echo $gift_domain;?>"/><?php tips('���� http://gift.destoon.com/<br/>�뽫������������վgiftĿ¼');?></td>
</tr>
</table>

<a name="vote"></a>
<div class="tt">ͶƱ����</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">ͶƱ����</td>
<td>
<input type="radio" name="setting[vote_enable]" value="1"  <?php if($vote_enable) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[vote_enable]" value="0"  <?php if(!$vote_enable) echo 'checked';?>/> �ر�
</td>
</tr>
<tr> 
<td class="tl">ͶƱ������</td>
<td><input name="setting[vote_domain]"  type="text" size="30" value="<?php echo $vote_domain;?>"/><?php tips('���� http://vote.destoon.com/<br/>�뽫������������վvoteĿ¼');?></td>
</tr>
</table>

<a name="poll"></a>
<div class="tt">Ʊѡ����</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">Ʊѡ����</td>
<td>
<input type="radio" name="setting[poll_enable]" value="1"  <?php if($poll_enable) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[poll_enable]" value="0"  <?php if(!$poll_enable) echo 'checked';?>/> �ر�
</td>
</tr>
<tr> 
<td class="tl">Ʊѡ������</td>
<td><input name="setting[poll_domain]"  type="text" size="30" value="<?php echo $poll_domain;?>"/><?php tips('���� http://poll.destoon.com/<br/>�뽫������������վpollĿ¼');?></td>
</tr>
</table>

<a name="form"></a>
<div class="tt">������</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">������</td>
<td>
<input type="radio" name="setting[form_enable]" value="1"  <?php if($form_enable) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[form_enable]" value="0"  <?php if(!$form_enable) echo 'checked';?>/> �ر�
</td>
</tr>
<tr> 
<td class="tl">��������</td>
<td><input name="setting[form_domain]"  type="text" size="30" value="<?php echo $form_domain;?>"/><?php tips('���� http://form.destoon.com/<br/>�뽫������������վformĿ¼');?></td>
</tr>
</table>

<a name="archiver"></a>
<div class="tt">��ͼ������</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">��ͼ�湦��</td>
<td>
<input type="radio" name="setting[archiver_enable]" value="1"  <?php if($archiver_enable) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[archiver_enable]" value="0"  <?php if(!$archiver_enable) echo 'checked';?>/> �ر�
</td>
</tr>
<tr> 
<td class="tl">��ͼ�������</td>
<td><input name="setting[archiver_domain]"  type="text" size="30" value="<?php echo $archiver_domain;?>"/><?php tips('���� http://archiver.destoon.com/<br/>�뽫������������վarchiverĿ¼');?></td>
</tr>
</table>

<a name="feed"></a>
<div class="tt">RSS����</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">RSS����</td>
<td>
<input type="radio" name="setting[feed_enable]"  value="2" <?php if($feed_enable==2){ ?>checked <?php } ?>/> ��ȫ����
<input type="radio" name="setting[feed_enable]"  value="1" <?php if($feed_enable==1){ ?>checked <?php } ?>/> ���ֿ���
<input type="radio" name="setting[feed_enable]" value="0"  <?php if(!$feed_enable){ ?>checked <?php } ?>/> �ر�<?php tips('ѡ����ȫ�����������û��Զ�����������<br/>ѡ�񲿷ֿ�����֧�ְ�ģ�Ͷ���');?>
</td>
</tr>
<tr> 
<td class="tl">RSS������</td>
<td><input name="setting[feed_domain]"  type="text" size="30" value="<?php echo $feed_domain;?>"/><?php tips('���� http://feed.destoon.com/<br/>�뽫������������վfeedĿ¼');?></td>
</tr>
<tr> 
<td class="tl">RSS�������</td>
<td><input name="setting[feed_pagesize]"  type="text" size="10" value="<?php echo $feed_pagesize;?>"/></td>
</tr>
</table>

<a name="sitemaps"></a>
<div class="tt">Sitemaps</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">����Sitemaps</td>
<td>
<input type="radio" name="setting[sitemaps]" value="1"  <?php if($sitemaps == 1) echo 'checked';?>> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[sitemaps]" value="0"  <?php if($sitemaps == 0) echo 'checked';?>> �ر�
</td>
</tr>
<tr>
<td class="tl">����ҳ����Ƶ��</td>
<td>
<select name="setting[sitemaps_changefreq]">
<option value="always"<?php echo $sitemaps_changefreq == 'always' ? ' selected' : ''?>>һֱ</option>
<option value="hourly"<?php echo $sitemaps_changefreq == 'hourly' ? ' selected' : ''?>>ʱ</option>
<option value="daily"<?php echo $sitemaps_changefreq == 'daily' ? ' selected' : ''?>>��</option>
<option value="weekly"<?php echo $sitemaps_changefreq == 'weekly' ? ' selected' : ''?>>��</option>
<option value="monthly"<?php echo $sitemaps_changefreq == 'monthly' ? ' selected' : ''?>>��</option>
<option value="yearly"<?php echo $sitemaps_changefreq == 'yearly' ? ' selected' : ''?>>��</option>
<option value="never"<?php echo $sitemaps_changefreq == 'never' ? ' selected' : ''?>>�Ӳ�</option>
</select>
&nbsp;
<select name="setting[sitemaps_priority]">
<option value="1.0"<?php echo $sitemaps_priority == '1.0' ? ' selected' : ''?>>1.0</option>
<option value="0.9"<?php echo $sitemaps_priority == '0.9' ? ' selected' : ''?>>0.9</option>
<option value="0.8"<?php echo $sitemaps_priority == '0.8' ? ' selected' : ''?>>0.8</option>
<option value="0.7"<?php echo $sitemaps_priority == '0.7' ? ' selected' : ''?>>0.7</option>
<option value="0.6"<?php echo $sitemaps_priority == '0.6' ? ' selected' : ''?>>0.6</option>
<option value="0.5"<?php echo $sitemaps_priority == '0.5' ? ' selected' : ''?>>0.5</option>
<option value="0.4"<?php echo $sitemaps_priority == '0.4' ? ' selected' : ''?>>0.4</option>
<option value="0.3"<?php echo $sitemaps_priority == '0.3' ? ' selected' : ''?>>0.3</option>
<option value="0.2"<?php echo $sitemaps_priority == '0.2' ? ' selected' : ''?>>0.2</option>
<option value="0.1"<?php echo $sitemaps_priority == '0.1' ? ' selected' : ''?>>0.1</option>
</select>
</td>
</tr>
<tr>
<td class="tl">�������ɵ�ģ��</td>
<td><?php echo module_checkbox('setting[sitemaps_module][]', $sitemaps_module, '1,2,3');?></td>
</tr>
<tr>
<td class="tl">��������</td>
<td><input type="text" size="5" name="setting[sitemaps_update]" value="<?php echo $sitemaps_update;?>"/> ����</td>
</tr>
<tr>
<td class="tl">��������</td>
<td><input type="text" size="5" name="setting[sitemaps_items]" value="<?php echo $sitemaps_items;?>"/></td>
</tr>
<tr>
<td class="tl">URL��ַ</td>
<td>
<a href="<?php echo DT_PATH.'sitemaps.xml';?>" target="_blank"><?php echo DT_PATH.'sitemaps.xml';?></a>
<?php
	$mods = explode(',', $MOD['sitemaps_module']);
	foreach($MODULE as $m) {
		if($m['domain'] && !$m['islink'] && in_array($m['moduleid'], $mods)) {
			if($m['moduleid'] == 4 && $CFG['com_domain']) continue;
			echo '<br/><a href="'.$m['linkurl'].'sitemaps.xml" target="_blank">'.$m['linkurl'].'sitemaps.xml</a>';
		}
	}
?>
</td>
</tr>
<tr>
<td class="tl">�ϴθ���</td>
<td><?php echo timetodate(filemtime(DT_ROOT.'/sitemaps.xml'));?>&nbsp;&nbsp; <a href="?moduleid=<?php echo $moduleid;?>&file=sitemap&action=sitemaps" class="t">��������</a></td>
</tr>
<tr>
<td class="tl">��ϸ�˽�Sitemaps?</td>
<td><a href="<?php echo DT_PATH;?>api/redirect.php?url=http://www.google.com/support/webmasters/bin/topic.py?topic=8476" target="_blank">http://www.google.com/support/webmasters/bin/topic.py?topic=8476</a></td>
</tr>
</table>
</div>

<a name="baidunews"></a>
<div class="tt">�ٶ�����(Baidu News) - ���������ſ���Э��</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">���ɰٶ�����</td>
<td>
<input type="radio" name="setting[baidunews]" value="1"  <?php if($baidunews == 1) echo 'checked';?>> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[baidunews]" value="0"  <?php if($baidunews == 0) echo 'checked';?>> �ر�
</td>
</tr>
<tr>
<td class="tl">������Ա��Email</td>
<td><input type="text" size="30" name="setting[baidunews_email]" value="<?php echo $baidunews_email;?>"/></td>
</tr>
<tr>
<td class="tl">��������</td>
<td><input type="text" size="5" name="setting[baidunews_update]" value="<?php echo $baidunews_update;?>"/> ����</td>
</tr>
<tr>
<td class="tl">��������</td>
<td><input type="text" size="5" name="setting[baidunews_items]" value="<?php echo $baidunews_items;?>"/> 100��֮��</td>
</tr>
<tr>
<td class="tl">URL��ַ</td>
<td><a href="<?php echo DT_PATH.'baidunews.xml';?>" target="_blank"><?php echo DT_PATH.'baidunews.xml';?></a></td>
</tr>
<tr>
<td class="tl">�ϴθ���</td>
<td><?php echo timetodate(filemtime(DT_ROOT.'/baidunews.xml'));?>&nbsp;&nbsp; <a href="?moduleid=<?php echo $moduleid;?>&file=sitemap&action=baidunews" class="t">��������</a></td>
</tr>
<tr>
<td class="tl">��ϸ�˽�ٶ�����?</td>
<td><a href="<?php echo DT_PATH;?>api/redirect.php?url=http://news.baidu.com/newsop.html" target="_blank">http://news.baidu.com/newsop.html</a></td>
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