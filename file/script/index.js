/*
	[Destoon B2B System] Copyright (c) 2008-2013 Destoon.COM
	This is NOT a freeware, use is subject to license.txt
*/
var _p = 0;
function AutoTab() {
	var c;
	Dd('trades').onmouseover = function() {_p = 1;} 
	Dd('trades').onmouseout = function() {_p = 0;}
	if(_p) return;
	for(var i = 1; i < 4; i++) { if(Dd('trade_t_'+i).className == 'tab_2') {c = i;} }
	c++; 
	if(c > 3) c = 1;
	Tb(c, 3, 'trade', 'tab');
}
if(Dd('trades') != null) window.setInterval('AutoTab()',5000);
function ipad_tip_close() {
	Dh('ipad_tips');
	set_cookie('ipad_tips', 1);
}
if(Dd('ipad_tips') != null && UA.match(/(iphone|ipad|ipod)/i) && get_cookie('ipad_tips') != 1) {
	Ds('ipad_tips');
	Dd('ipad_tips').innerHTML = '<div class="ipad_tips_logo"><img src="'+DTPath+'apple-touch-icon-precomposed.png" width="50" height="50" alt=""/></div><div class="ipad_tips_text"><strong>�ѱ�վ���������Ļ</strong><br/>�����������ϵ�<span class="ipad_tips_ico1"></span>����<span class="ipad_tips_ico2"></span>��ѡ�������ǩ�����ߡ����������Ļ�������´�ֱ�ӷ��ʡ�</div><div class="ipad_tips_hide"><a href="javascript:ipad_tip_close();" class="ipad_tip_close" title="�رղ�������ʾ">&nbsp;</a></div><div class="c_b"></div>';
}