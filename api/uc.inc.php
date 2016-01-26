<?php
defined('IN_DESTOON') or exit('Access Denied');
define("UC_DBHOST", $MOD['uc_dbhost']) ;
define("UC_DBUSER", $MOD['uc_dbuser']) ;
define("UC_DBPW", $MOD['uc_dbpwd']) ;
define("UC_DBNAME", $MOD['uc_dbname']) ;
define("UC_DBPRE", $MOD['uc_dbpre']) ;
define("UC_KEY", $MOD['uc_key']) ;
define('UC_APPID', $MOD['uc_appid']) ;
define("UC_API", $MOD['uc_api']) ;
define("UC_IP", $MOD['uc_ip']) ;
define("UC_DBTABLEPRE", $MOD['uc_dbpre']);
define("UC_CONNECT", $MOD['uc_mysql'] ? 'mysql' : '');
define('API_RETURN_SUCCEED', 1);
define('UC_DBCHARSET', $MOD['uc_charset']); 
define('API_UPDATECREDIT', 0);
define('API_GETCREDITSETTINGS', 0);
define('API_UPDATECREDITSETTINGS', 0);
define("UC_BBSPRE", $MOD['uc_bbspre'] ? $MOD['uc_bbspre'] : 'pre_');
require_once DT_ROOT.'/api/ucenter/client.php';
switch($action) {
	case 'login':
		$uc_username = convert($passport, DT_CHARSET, $MOD['uc_charset']);
		$user = $db->get_one("SELECT username,passport,password,groupid,email,passsalt FROM {$DT_PRE}member WHERE username='$username'");
		list($uid, $rt_username, $rt_password, $rt_email) = uc_user_login($uc_username, $password, 0, 0);
		if($uid == -1) {/* Ucenter �û������ڻ�ɾ�� */
			if($user) {
				$vpassword = dpassword($password, $user['passsalt']);
				if($user['password'] !=  $vpassword) message('�������������');
				if($user['groupid'] == 2) message('���ʺ��ѱ���ֹ����');
				//if($user['groupid'] == 4) message('���ʺ����������');
				/* ����ע��һ��UC�ʻ� */
				$uid = uc_user_register($uc_username, $password, $user['email']);
				if($uid > 0) $api_msg = uc_user_synlogin($uid);
			} else {
				message('�û������ڻ�ɾ��');
			}
		} else if($uid == -2) {/* Ucenter ������� */
			if($user) {
				if($user['password'] == dpassword($password, $user['passsalt'])) { /* ����UC���� */
					uc_user_edit($uc_username, '', $password, '', 1);
					$uc_get_user = uc_get_user($uc_username);
					if($uc_get_user[0]) $api_msg = uc_user_synlogin($uc_get_user[0]);
				} else {
					message('�������������');
				}
			} else {
				message('Ucenter�����������Ucenter�����¼');
			}
		} else if($uid == -3) {/* Ucenter ��ȫ���ʴ� */
			message('�����Ҫͬ����¼Ucenter����ȡ��Ucenter��ȫ����');
		} else if($uid > 0) {/* Ucenter ��֤�ɹ� */
			$api_msg = uc_user_synlogin($uid);
			if($user) {
				$vpassword = dpassword($password, $user['passsalt']);/* ͬ��DT���� */
				if($user['password'] != $vpassword) $db->query("UPDATE {$DT_PRE}member SET password='$vpassword' WHERE username='$username'");
			} else {/* ��Ա������ */
				$auth = encrypt($username.'|'.$rt_password.'|'.$rt_email, DT_KEY.'UC');
				message('�뼤�������˺�', $MOD['linkurl'].$DT['file_register'].'?auth='.$auth);
			}
		}
	break;
	case 'logout':
		$api_msg = uc_user_synlogout();
	break;
	case 'passport':
		$could_passport = false;
		$uc_username = convert($passport, DT_CHARSET, $MOD['uc_charset']);
		list($uid, $rt_username, $rt_password, $rt_email) = uc_user_login($uc_username, md5(random(8)));
		if($uid == -1) $could_passport = true;
	break;
	case 'oauth':
		$uc_username = convert($passport, DT_CHARSET, $MOD['uc_charset']);
		$uc_get_user = uc_get_user($uc_username);
		if($uc_get_user[0]) $api_msg = uc_user_synlogin($uc_get_user[0]);
	break;
}
?>