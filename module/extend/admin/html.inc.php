<?php
defined('DT_ADMIN') or exit('Access Denied');
$one = (isset($one) && $one) ? 1 : 0;
if(isset($all)) {
	if($one) dheader('?file=html&action=back&mid='.$moduleid);
	msg('��չ���ܸ��³ɹ�');
} else {
	#spread->ad->announce->webpage->gift->vote->poll->form
	msg('���ڿ�ʼ������չ', '?moduleid=3&file=spread&action=html&all=1&one='.$one);
}
?>