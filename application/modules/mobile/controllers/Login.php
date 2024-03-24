<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Login extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model', 'Lmodel');

    }


    public function index()
    {
        $isLogin = $this->session->userdata('isLogin');
        $level_user = $this->session->userdata('level_user');

        if ($isLogin == 'yes' && $level_user == "canvaser") {
            redirect('mobile/dashboard', 'refresh');
        } else {
            $data['libjs'] = 'login.js';

            $this->load->view('v_login', $data);
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
            $ret = $this->Lmodel->cek_login($user, $pass);
        }
        echo json_encode($ret);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        header('location:' . site_url('mobile/login'));
    }

}

/* End of file Login.php */
