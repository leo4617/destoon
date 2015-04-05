<?php
/*
	[Destoon B2B System] Copyright (c) 2008-2013 Destoon.COM
	This is NOT a freeware, use is subject to license.txt
*/
error_reporting(0);
set_time_limit(0);
set_magic_quotes_runtime(0);
define('IN_DESTOON', true);
define('DT_DEBUG', 0);
define('IN_ROOT', str_replace("\\", '/', dirname(__FILE__)));
define('DT_ROOT', substr(IN_ROOT, 0, -8));
define('DT_CACHE', DT_ROOT.'/file/cache');
if($_POST) extract($_POST, EXTR_SKIP);
if($_GET) extract($_GET, EXTR_SKIP);
$submit = isset($_POST['submit']) ? true : false;
$step = isset($_POST['step']) ? $_POST['step'] : 1;
$percent = '0%';
include DT_ROOT.'/config.inc.php';
include DT_ROOT.'/version.inc.php';
define('DT_CHMOD', $CFG['file_mod'] ? $CFG['file_mod'] : '');
header("Content-Type:text/html;charset=".$CFG['charset']);
if(file_exists(DT_CACHE.'/install.lock')) {
	$msg = '��װ�����Ѿ��������������Ҫ�������������װ<br/>��ɾ�� ./file/cache/install.lock �ļ�';
	include IN_ROOT.'/msg.tpl.php';
	exit;
}
require DT_ROOT.'/include/global.func.php';
require DT_ROOT.'/include/file.func.php';
require DT_ROOT.'/include/module.func.php';

switch($step) {
	case '1'://Э��
		$license = file_get_contents(DT_ROOT.'/license.txt');
		$DT_LICENSE = md5($license);
		if($DT_LICENSE != 'ede11fdcdb179260657dba4f3fc42b0e' && $DT_LICENSE != '624100e3dd1887d79ef4c713f0f30cb2') {
			$msg = '������վ��Ŀ¼�� license.txt �ļ��Ƿ���ڻ��޸�<br/>ʹ��Destoon B2B��վ����ϵͳ������ͬ��license.txt���ݣ����������ļ�<br/>���ʹ��FTP�ϴ��ļ�����ʹ�ö�����ģʽ�ϴ� license.txt';
			include IN_ROOT.'/msg.tpl.php';
			exit;
		}
		include IN_ROOT.'/step_'.$step.'.tpl.php';
	break;
	case '2'://����
		$pass = true;
		$PHP_VERSION = PHP_VERSION;
		if(version_compare($PHP_VERSION, '4.3.0', '<')) {
			$php_pass = $pass = false;
		} else {
			$php_pass = true;
		}
		$PHP_MYSQL = '';
		if(extension_loaded('mysql')) {
			$PHP_MYSQL = '֧��';
			$mysql_pass = true;
		} else {
			$PHP_MYSQL = '��֧��';
			$mysql_pass = $pass = false;
		}
        $PHP_GD = '';
        if(function_exists('imagejpeg')) $PHP_GD .= 'jpg';
        if(function_exists('imagegif')) $PHP_GD .= ' gif';
        if(function_exists('imagepng')) $PHP_GD .= ' png';
		if($PHP_GD) {
			$gd_pass = true;
		} else {
			$gd_pass = false;
		}
		$PHP_URL = @get_cfg_var("allow_url_fopen");
		$url_pass = $PHP_URL ? true : false;
		$percent = '20%';
		include IN_ROOT.'/step_'.$step.'.tpl.php';
	break;
	case '3'://����
		$ISWIN = strpos(strtoupper(PHP_OS), 'WIN') === false ? false : true;
		$files = file_get_contents(IN_ROOT.'/chmod.txt');
		$files = explode("\n", $files);
		$files = array_map('trim', $files);
		$FILES = array();
		$pass = true;
		foreach($files as $k=>$v) {
			$FILES[$k]['name'] = $v;
			if(!$ISWIN) dir_chmod(DT_ROOT.'/'.$v, DT_CHMOD);
			if(is_write(DT_ROOT.'/'.str_replace('*', 'index.html', $v))) {
				$FILES[$k]['write'] = true;
				if(strpos($v, 'index.html') !== false) {
					$c = file_get(DT_ROOT.'/'.$v).'<!--WriteTest-->';
					file_put(DT_ROOT.'/'.$v, $c);
					$c = file_get(DT_ROOT.'/'.$v);
					if(strpos($c, 'WriteTest') === false) $FILES[$k]['write'] = $pass = false;
				}
				if($ISWIN && $v == 'config.inc.php') {
					$c = file_get(DT_ROOT.'/'.$v);
					$c = str_replace($CFG['authkey'], 'WriteTest', $c);
					file_put(DT_ROOT.'/'.$v, $c);
					$c = file_get(DT_ROOT.'/'.$v);
					if(strpos($c, 'WriteTest') === false) $FILES[$k]['write'] = $pass = false;
				}
			} else {
				$FILES[$k]['write'] = $pass = false;
			}
		}
		$percent = '40%';
		include IN_ROOT.'/step_'.$step.'.tpl.php';
	break;
	case '4'://���ݿ�
		$DT_URL = get_env('url');
		$DT_URL = substr($DT_URL, 0, strpos($DT_URL, '?') === false ? -17 : -18);
		$percent = '60%';
		include IN_ROOT.'/step_'.$step.'.tpl.php';
	break;
	case '5'://��װ����
		function dexit($msg) {
			echo '<script>alert("'.$msg.'");window.history.back();</script>';
			exit;
		}
		if(!preg_match("/^[a-z0-9]+$/i", $username) || strlen($username) < 4) dexit('����д��ȷ�ĳ�������Ա����');
		if(strlen($password) < 6) dexit('��������Ա��������6λ');
		if(strlen($email) < 6 || !preg_match("/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/", $email)) dexit('����д��ȷ�ĳ�������ԱEmail');
		if(!mysql_connect($db_host, $db_user, $db_pass)) dexit('�޷����ӵ����ݿ����������������');
		$db_name or dexit('����д���ݿ���');
		if(!mysql_select_db($db_name)) {
			if(!mysql_query("CREATE DATABASE $db_name")) dexit('ָ�������ݿⲻ����\n\nϵͳ���Դ���ʧ�ܣ���ͨ��������ʽ�������ݿ�');
		}

		$config = array();
		$config['db_host'] = $CFG['db_host'] = $db_host;
		$config['db_user'] = $CFG['db_user'] = $db_user;
		$config['db_pass'] = $CFG['db_pass'] = $db_pass;
		$config['db_name'] = $CFG['db_name'] = $db_name;
		$config['tb_pre'] = $CFG['tb_pre'] = $DT_PRE = $tb_pre;
		$config['url'] = $CFG['url'] = $url;
		$config['cache_pre'] = $CFG['cache_pre'] = 'c'.strtolower(random(2)).'_';
		$config['cookie_pre'] = $CFG['cookie_pre'] = 'c'.strtolower(random(2)).'_';
		$config['authkey'] = $CFG['authkey'] = random(15);
		//���������ļ�
		$tmp = file_get_contents(DT_ROOT.'/config.inc.php');
		foreach($config as $k=>$v)	{
			$tmp = preg_replace("/[$]CFG\['$k'\]\s*\=\s*[\"'].*?[\"']/is", "\$CFG['$k'] = '$v'", $tmp);
		}
		file_put(DT_ROOT.'/config.inc.php', $tmp);
		define('DT_PATH', $url);
		define('DT_STATIC', $CFG['static'] ? $CFG['static'] : $CFG['url']);
		define('DT_LANG', $CFG['language']);
		define('DT_KEY', $CFG['authkey']);
		define('DT_CHARSET', $CFG['charset']);
		define('DT_SKIN', DT_PATH.'skin/'.$CFG['skin'].'/');
		define('SKIN_PATH', DT_PATH.'skin/'.$CFG['skin'].'/');
		define('VIP', $CFG['com_vip']);
		define('DT_DOMAIN', $CFG['cookie_domain'] ? substr($CFG['cookie_domain'], 1) : '');
		define('errmsg', 'Invalid Request');

		//��������
		require DT_ROOT.'/include/db_mysql.class.php';
		require DT_ROOT.'/include/sql.func.php';
		require DT_ROOT.'/admin/global.func.php';
		$db = new db_mysql();
		$db->connect($db_host, $db_user, $db_pass, $db_name, $CFG['db_expires'], $CFG['db_charset'], $CFG['pconnect']);
		$db->pre = $DT_PRE;
		sql_execute(file_get_contents(IN_ROOT.'/table.sql'));
		sql_execute(file_get_contents(IN_ROOT.'/data.sql'));

		//Setting
		$DT = array();
		for($i = 1; $i <= 22; $i++) {
			$setting = include DT_ROOT.'/file/setting/module-'.$i.'.php';
			if($setting) {
				if($i == 1) $DT = $setting;			unset($setting['moduleid'],$setting['name'],$setting['moduledir'],$setting['ismenu'],$setting['domain'],$setting['linkurl']);
				if($i == 3) {
					foreach($setting as $k=>$v) {
						$setting[$k] = str_replace('http://demo.destoon.com/v'.DT_VERSION.'/', $CFG['url'], $v);
					}
				}
				update_setting($i, $setting);
			}
		}
		
		//�滻���λ ����ҳ·��
		$content = cache_read('ad_14_0.htm', 'htm', 1);
		$content = str_replace('http://demo.destoon.com/v'.DT_VERSION.'/', $CFG['url'], $content);
		cache_write('ad_14_0.htm', $content, 'htm');

		$pay = include DT_ROOT.'/file/setting/pay.php';		
		foreach($pay as $k=>$v) {
			update_setting('pay-'.$k, $v);
		}
		$oauth = include DT_ROOT.'/file/setting/oauth.php';		
		foreach($oauth as $k=>$v) {
			update_setting('oauth-'.$k, $v);
		}
		for($i = 1; $i <= 7; $i++) {
			$setting = include DT_ROOT.'/file/setting/group-'.$i.'.php';
			if($setting) {
				unset($setting['groupid'],$setting['groupname'],$setting['vip']);
				update_setting('group-'.$i, $setting);
			}
		}
		$DT_TIME = time();
		$DT_IP = get_env('ip');
		//ģ�鰲װʱ��
		$db->query("UPDATE {$DT_PRE}module SET installtime='$DT_TIME'");

		//���ù���Ա
		$md5_password = md5(md5($password));
		$db->query("UPDATE {$DT_PRE}member SET username='$username',passport='$username',password='$md5_password',payword='$md5_password',email='$email',regip='$DT_IP',regtime='$DT_TIME',loginip='$DT_IP',logintime='$DT_TIME' WHERE userid=1");
		$userurl = $CFG['url'].'index.php?homepage='.$username;
		$db->query("UPDATE {$DT_PRE}company SET username='$username',linkurl='$userurl' WHERE userid=1");

		//�滻���λ ����ҳ·��
		$content = cache_read('ad_14_0.htm', 'htm', 1);
		$content = str_replace('http://demo.destoon.com/v'.DT_VERSION.'/', $CFG['url'], $content);
		cache_write('ad_14_0.htm', $content, 'htm');

		$db->query("UPDATE {$DT_PRE}ad_place SET addtime='$DT_TIME',edittime='$DT_TIME',editor='$username'");
		$db->query("UPDATE {$DT_PRE}ad SET addtime='$DT_TIME',edittime='$DT_TIME',username='$username',editor='$username'");
		$db->query("UPDATE {$DT_PRE}link SET addtime='$DT_TIME',edittime='$DT_TIME',editor='$username'");
		$db->query("UPDATE {$DT_PRE}style SET addtime='$DT_TIME',edittime='$DT_TIME',editor='$username'");
		$db->query("INSERT INTO {$DT_PRE}setting (item,item_key,item_value) VALUES('destoon','backtime','$DT_TIME')");	

		//���»���
		require DT_ROOT.'/include/cache.func.php';
		cache_all();
		cache_category(4);
		cache_category(5);
		cache_category(6);
		cache_module();//Again

		//������ҳ
		require DT_ROOT.'/include/tag.func.php';
		$CACHE = cache_read('module.php');
		$DT = $CACHE['dt'];
		$MODULE = $CACHE['module'];
		$EXT = cache_read('module-3.php');
		$moduleid = 1;
		$module = 'destoon';
		tohtml('index');

		$msgs = array(
			'����ϵͳ����.................�ɹ�',
			'���ݿ�����....................�ɹ�',
			'�������ݿ�....................�ɹ�',
			'�������ݱ�....................�ɹ�',
			'�����ʼ����.................�ɹ�',
			'���ù���Ա....................�ɹ�',
			'��װϵͳģ��.................�ɹ�',
			'����ϵͳ����.................�ɹ�',
			'����ģ�黺��.................�ɹ�',
			'����ģ�建��.................�ɹ�',
			'������վ��Կ.................�ɹ�',
			'������վ��ҳ.................�ɹ�',
			'������װ����.................����',
		);
		$percent = '80%';
		include IN_ROOT.'/step_'.$step.'.tpl.php';
	break;
	case '6'://��װ�ɹ�
		$percent = '100%';
		include IN_ROOT.'/step_'.$step.'.tpl.php';
		$DT_TIME = time();
		file_put(DT_CACHE.'/install.lock', $DT_TIME);
		$index = file_get(DT_ROOT.'/index.html');
		if(strpos($index, 'install/') !== false) file_del(DT_ROOT.'/index.html');
		file_put(DT_ROOT.'/install/index.php', '<script type="text/javascript">window.location="../?success="+Math.random();</script>');
	break;
	case 'db_test':
		if(!mysql_connect($tdb_host, $tdb_user, $tdb_pass)) exit('<script>alert("�޷����ӵ����ݿ����������������");</script>');
		if(!mysql_select_db($tdb_name)) {
			if(!mysql_query("CREATE DATABASE $tdb_name")) exit('<script>alert("ָ�������ݿⲻ����\n\nϵͳ���Դ���ʧ�ܣ���ͨ��������ʽ�������ݿ�");</script>');
			mysql_select_db($tdb_name);
		}
		$tables = array();
		$query = mysql_list_tables($tdb_name);
		while($r = mysql_fetch_row($query)) {
			$tables[] = $r[0];
		}
		if(is_array($tables) && in_array($ttb_pre."company_setting", $tables)) {
			if($ttb_test) {
				exit('<script>alert("���ݿ�������ȷ����������\n\nע�⣺ϵͳ��⵽��ǰ���ݿ��Ѿ���װ��DESTOON B2B�����������װ���������������\n\n�����Ҫ�����������ݣ����޸����ݱ�ǰ׺");</script>');
			} else {
				exit('<script>alert("ע�⣺ϵͳ��⵽��ǰ���ݿ��Ѿ���װ��DESTOON B2B�����������װ���������������\n\n�����Ҫ�����������ݣ����޸����ݱ�ǰ׺");</script>');
			}			
		}
		if($ttb_test) exit('<script>alert("���ݿ�������ȷ����������");</script>');
	break;
}
?>