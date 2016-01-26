<?php
/*
	[Destoon B2B System] Copyright (c) 2008-2015 www.destoon.com
	This is NOT a freeware, use is subject to license.txt
*/
defined('DT_ADMIN') or exit('Access Denied');
$menus = array (
    array('�������', '?file='.$file.'&action=add'),
    array('�ƻ�����', '?file='.$file),
);
$do = new cron();
switch($action) {
	case 'add':
		if($submit) {
			if($do->pass($post)) {
				$do->add($post);
				dmsg('��ӳɹ�', $forward);
			} else {
				msg($do->errmsg);
			}
		} else {
			$type = $title = $name = $run = $hour = $mint = $status = $note = '';
			$minute = 30;
			include tpl('cron_edit');
		}
	break;
	case 'edit':
		$itemid or msg();
		$do->itemid = $itemid;
		$r = $do->get_one();
		$r or msg('���񲻴���');
		!$r['type'] or msg('�������񲻿��޸�');
		if($submit) {
			if($do->pass($post)) {
				$do->edit($post);
				dmsg('�޸ĳɹ�', $forward);
			} else {
				msg($do->errmsg);
			}
		} else {
			extract($r);
			$minute = 0;
			$run = 1;			
			if(strpos($schedule, ',') !== false) {
				list($hour, $mint) = explode(',', $schedule);
			} else {
				$minute = $schedule;
				$run = 0;
			}
			include tpl('cron_edit');
		}
	break;
	case 'delete':
		$itemid or msg();
		$do->itemid = $itemid;
		$r = $do->get_one();
		$r or msg('���񲻴���');
		!$r['type'] or msg('�������񲻿�ɾ��');
		$do->delete();
		dmsg('ɾ���ɹ�', $forward);
	break;
	case 'run':
		$itemid or msg();
		$do->itemid = $itemid;
		$cron = $do->get_one();
		$cron or msg('���񲻴���');
		include DT_ROOT.'/api/cron/'.$cron['name'].'.inc.php';
		$nexttime = $do->nexttime($cron['schedule'], $DT_TIME);
		$db->query("UPDATE {$DT_PRE}cron SET lasttime=$DT_TIME,nexttime=$nexttime WHERE itemid=$itemid");
		dmsg('���гɹ�', $forward);
	break;
	default:
		$sfields = array('������', '����', '�ļ���', '��ע');
		$dfields = array('title', 'title', 'name', 'note');
		isset($fields) && isset($dfields[$fields]) or $fields = 0;
		$fields_select = dselect($sfields, 'fields', '', $fields);
		$condition = '1';
		if($keyword) $condition .= " AND $dfields[$fields] LIKE '%$keyword%'";
		$lists = $do->get_list($condition);
		include tpl('cron');
	break;
}

class cron {
	var $itemid;
	var $db;
	var $table;
	var $errmsg = errmsg;

    function cron() {
		global $db, $DT_PRE;
		$this->table = $DT_PRE.'cron';
		$this->db = &$db;
    }

	function pass($post) {
		global $DT_TIME;
		if(!is_array($post)) return false;
		if(!$post['title']) return $this->_('����д��������');
		if(!check_name($post['name']) || !is_file(DT_ROOT.'/api/cron/'.$post['name'].'.inc.php')) return $this->_('��ѡ��ű��ļ�');
		if($post['run']) {
			$hour = intval($post['hour']);
			if($hour < 0 || $hour > 23) return $this->_('Сʱ����Ϊ0-23');
			$mint = intval($post['mint']);
			if($mint < 0 || $hour > 59) return $this->_('���ӱ���Ϊ0-59');
		} else {
			$minute = intval($post['minute']);
			if($minute < 1) return $this->_('���ʱ������Ϊ1����');
		}
		return true;
	}

	function set($post) {
		if($post['run']) {
			$post['schedule'] = intval($post['hour']).','.intval($post['mint']);
		} else {
			$post['schedule'] = intval($post['minute']);
		}
		unset($post['run'], $post['hour'],$post['mint'],  $post['minute']);
		$post['status'] = $post['status'] ? 1 : 0;
		return $post;
	}

	function get_one() {
        return $this->db->get_one("SELECT * FROM {$this->table} WHERE itemid='$this->itemid'");
	}

	function get_list($condition = '', $order = 'itemid ASC') {
		global $MOD, $pages, $page, $pagesize, $offset, $sum;
		if($page > 1 && $sum) {
			$items = $sum;
		} else {
			$r = $this->db->get_one("SELECT COUNT(*) AS num FROM {$this->table} WHERE $condition");
			$items = $r['num'];
		}
		$pages = pages($items, $page, $pagesize);	
		$lists = array();
		$result = $this->db->query("SELECT * FROM {$this->table} WHERE $condition ORDER BY $order LIMIT $offset,$pagesize");
		while($r = $this->db->fetch_array($result)) {
			$r['lasttime'] = $r['lasttime'] ? timetodate($r['lasttime'], 5) : 'N/A';
			$r['nexttime'] = $r['nexttime'] ? timetodate($r['nexttime'], 5) : 'N/A';
			$r['text'] = $this->time2text($r['schedule']);
			$lists[] = $r;
		}
		return $lists;
	}

	function add($post) {
		$post = $this->set($post);
		$sqlk = $sqlv = '';
		foreach($post as $k=>$v) {
			$sqlk .= ','.$k; $sqlv .= ",'$v'";
		}
        $sqlk = substr($sqlk, 1);
        $sqlv = substr($sqlv, 1);
		$this->db->query("INSERT INTO {$this->table} ($sqlk) VALUES ($sqlv)");
		return $this->itemid;
	}

	function edit($post) {
		$post = $this->set($post);
		$sql = '';
		foreach($post as $k=>$v) {
			$sql .= ",$k='$v'";
		}
        $sql = substr($sql, 1);
	    $this->db->query("UPDATE {$this->table} SET $sql WHERE itemid=$this->itemid");
		return true;
	}

	function delete() {
		$this->db->query("DELETE FROM {$this->table} WHERE itemid=$this->itemid");
	}

	function nexttime($schedule, $time) {
		if(strpos($schedule, ',') !== false) {
			list($h, $m) = explode(',', $schedule);
			$t = strtotime(timetodate($time, 3).' '.($h < 10 ? '0'.$h : $h).':'.($m < 10 ? '0'.$m : $m).':00');
			return $t > $time ? $t : $t + 86400;
		} else {
			$m = intval($schedule);
			return $time + ($m ? $m : 1800)*60;
		}
	}

	function time2text($schedule) {
		if(strpos($schedule, ',') !== false) {
			list($h, $m) = explode(',', $schedule);
			if($h < 10) $h = '0'.$h;
			if($m < 10) $m = '0'.$m;
			return 'ÿ��'.$h.':'.$m;
		} else {
			$m = intval($schedule);
			return 'ÿ'.$m.'����';
		}
		list($hour, $minute) = explode(',', $schedule);
	}

	function _($e) {
		$this->errmsg = $e;
		return false;
	}
}
?>