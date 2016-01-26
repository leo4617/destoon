<?php
$ROBOT = array(
	'baidu' => '�ٶ�',
	'google' => 'Google',
	'yahoo' => 'Yahoo',
	'bing' => 'Bing',
	'360' => '����',
	'soso' => '����',
	'sogou' => '�ѹ�',
	'other' => '����'
);
function get_robot() {
	if(is_robot()) {
		$agent = strtolower($_SERVER['HTTP_USER_AGENT']);
		foreach($ROBOT as $k=>$v) {
			if(strpos($agent, $k) !== false) return $k;
		}
		return 'other';
	}
	return '';
}
?>