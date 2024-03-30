<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Mobile_detect');
	}

	public function check_device()
	{
		if ($this->mobile_detect->isMobile()) {
			return true;
		} else {
			return false;
		}
	}

	public function user_login()
	{
		$level = '';
		$isLogin = false;

		if ($this->check_device()) {
			$level = 'canvaser';
		} else {
			$level = 'admin';
		}

		$isLogin = $this->session->userdata('isLogin');
		$level_user = $this->session->userdata('level_user');

		if ($isLogin == 'yes' && $level_user == $level) {
			$isLogin = true;
		} else {
			$isLogin = false;
		}

		return $isLogin;
	}

	public function cek_login($user, $pass)
	{
		$level = '';

		if ($this->check_device()) {
			$level = 'canvaser';
		} else {
			$level = 'admin';
		}

		$cekUser = $this->db->select('* FROM data_user WHERE username = "' . $user . '" AND password = "' . $pass . '" AND level_user = "' . $level . '" AND deleted = 1', false)->get();

		if ($cekUser->num_rows()) {
			$row = $cekUser->row();

			$data['id_user'] = $row->id;
			$data['username'] = $user;
			$data['level_user'] = $row->level_user;
			$data['isLogin'] = 'yes';
			if ($row->foto != '') {
				$data['foto'] = 'images/user/' . $row->foto;
			} else {
				$data['foto'] = 'images/user.png';
			}

			$this->session->set_userdata($data);

			$ret['status'] = true;
		} else {
			$ret['status'] = false;
			$ret['msg'] = 'Username atau Password salah!';
		}
		return $ret;
	}
}