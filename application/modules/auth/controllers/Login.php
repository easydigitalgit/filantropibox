<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model', 'Amodel');
		$this->load->library('Mobile_detect');
	}

	public function index()
	{
		$isLogin = $this->Amodel->user_login();
		$isMobile = $this->mobile_detect->isMobile();

		$data['libjs'] = 'login.js';
		$view = $isMobile ? 'v_login_mobile' : 'v_login_admin';

		// echo $isMobile ? 'yes' : 'no';

		if (!$isLogin) {
			$this->load->view($view, $data);
		} else {
			redirect(($isMobile ? 'mobile' : 'admin') . '/dashboard', 'refresh');
		}
	}

	public function do_login()
	{
		$user = $this->input->post('username');
		$pass = $this->input->post('password');

		if ($user == '') {
			$ret['status'] = false;
			$ret['msg'] = 'Username tidak boleh kosong';
		} elseif ($pass == '') {
			$ret['status'] = false;
			$ret['msg'] = 'Password tidak boleh kosong';
		} else {
			$ret = $this->Amodel->cek_login($user, $pass);
		}
		echo json_encode($ret);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		header('location:' . site_url('auth/login'));
	}
}