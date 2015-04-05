<?php
defined('IN_DESTOON') or exit('Access Denied');
$menus = array (
    array('��Ա������', '?moduleid='.$moduleid.'&file='.$file.'&action=add'),
    array('��Ա�����', '?moduleid='.$moduleid.'&file='.$file),
);
$do = new group;
if(isset($groupid)) $do->groupid = $groupid;
if(isset($groupname)) $do->groupname = $groupname;
if(isset($vip)) $do->vip = intval($vip);
$this_forward = '?moduleid='.$moduleid.'&file='.$file;

if($action == 'add') {
	if($submit) {
		if(!$groupname) msg('��Ա�����Ʋ���Ϊ��');
		if($setting['fee_mode']) {//�շѻ�Ա
			if($vip > 9) $do->vip = $vip = 9;
			if($vip < 1) $do->vip = $vip = 1;
			$setting['fee'] = intval($setting['fee']);
			if($setting['fee'] < 1) $setting['fee'] = 3000;
		} else {
			$do->vip = $vip = $setting['fee'] = 0;
		}
		$do->add($setting);
		dmsg('���ӳɹ�', $this_forward);
	} else {
		include load('homepage.lang');
		$do->groupid = 7;
		extract($do->get_one());
		$groupname = '';
		$discount = 100;
		$menuid = 0;
		include tpl('group_edit', $module);
	}
} else if($action == 'edit') {
	$groupid or msg();
	if($submit) {
		if(!$groupname) msg('��Ա�����Ʋ���Ϊ��');
		if($setting['fee_mode']) {//�շѻ�Ա
			if($vip > 9) $do->vip = $vip = 9;
			if($vip < 1) $do->vip = $vip = 1;
			$setting['fee'] = intval($setting['fee']);
			if($setting['fee'] < 1) $setting['fee'] = 3000;
		} else {
			$do->vip = $vip = $setting['fee'] = 0;
		}
		$do->listorder = intval($listorder);
		$do->edit($setting);
		dmsg('�޸ĳɹ�', '?moduleid='.$moduleid.'&file='.$file.'&action=edit&groupid='.$groupid);
	} else {
		include load('homepage.lang');
		extract($do->get_one());
		$menuid = 1;
		if($kw) {
			$all = 1;
			ob_start();
		}
		include tpl('group_edit', $module);
		if($kw) {
			$data = $content = ob_get_contents();
			ob_clean();
			$data = preg_replace('\'(?!((<.*?)|(<a.*?)|(<strong.*?)))('.$kw.')(?!(([^<>]*?)>)|([^>]*?</a>)|([^>]*?</strong>))\'si', '<span class=highlight>'.$kw.'</span>', $data);
			$data = preg_replace('/<span class=highlight>/', '<a name=high></a><span class=highlight>', $data, 1);
			echo $data ? $data : $content;
		}
	}
} else if($action == 'delete') {
	$groupid or msg();
	$do->delete();
	dmsg('ɾ���ɹ�', $this_forward);
} else if($action == 'order') {	
	$do->order($listorder);
	dmsg('����ɹ�', $forward);
} else {
	$groups = array();
	$result = $db->query("SELECT * FROM {$DT_PRE}member_group ORDER BY listorder ASC,groupid ASC");
	while($r = $db->fetch_array($result)) {
		$r['type'] = $r['groupid'] > 7 ? '�Զ���' : 'ϵͳ';
		$groups[]=$r;
	}
	include tpl('group', $module);
}

class group {
	var $groupid;
	var $groupname;
	var $vip;
	var $listorder;
	var $db;
	var $table;

	function group() {
		global $db, $DT_PRE;
		$this->table = $DT_PRE.'member_group';
		$this->db = &$db;
	}

	function add($setting) {
		if(!is_array($setting)) return false;
		$this->db->query("INSERT INTO {$this->table} (groupname,vip) VALUES('$this->groupname','$this->vip')");
		$this->groupid = $this->db->insert_id();
		$this->db->query("UPDATE {$this->table} SET `listorder`=`groupid` WHERE groupid=$this->groupid");
		update_setting('group-'.$this->groupid, $setting);
		cache_group();
		return $this->groupid;
	}

	function edit($setting) {
		if(!is_array($setting)) return false;
		update_setting('group-'.$this->groupid, $setting);
		$setting = addslashes(serialize(dstripslashes($setting)));
		$this->db->query("UPDATE {$this->table} SET groupname='$this->groupname',vip='$this->vip',listorder='$this->listorder' WHERE groupid=$this->groupid");
		cache_group();
		return true;
	}

	function order($listorder) {
		if(!is_array($listorder)) return false;
		foreach($listorder as $k=>$v) {
			$k = intval($k);
			$v = intval($v);
			if($v > 6) $this->db->query("UPDATE {$this->table} SET listorder=$v WHERE groupid=$k");
		}
		cache_group();
		return true;
	}

	function delete() {
		if($this->groupid < 5) return false;
		$this->db->query("DELETE FROM {$this->table} WHERE groupid=$this->groupid");
		cache_delete('group-'.$this->groupid.'.php');
		cache_group();
		return true;
	}

	function get_one() {
		$r = $this->db->get_one("SELECT * FROM {$this->table} WHERE groupid=$this->groupid");
		$tmp = get_setting('group-'.$this->groupid);
		if($tmp) {
			foreach($tmp as $k=>$v) {
				isset($r[$k]) or $r[$k] = $v;
			}
		}
		return $r;
	}
}
?>