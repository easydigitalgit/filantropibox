<?php

defined('BASEPATH') or exit ('No direct script access allowed');

class Ubah_password extends MX_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('UbahPassword_model', 'Dmodel');

    }


    public function index()
    {
        $isLogin = $this->session->userdata('isLogin');
        $level_user = $this->session->userdata('level_user');

        if ($isLogin == 'yes' && $level_user == "canvaser") {
            $data['konten'] = 'v_ubah_password';
            $data['libjs'] = ['ubah_password'];

            $this->theme->mobile_dashboard_theme($data);
        } else {
            redirect('mobile/login', 'refresh');
        }
    }

    public function ubah_password()
    {
        $id = $this->session->userdata('id_user');
        $current_password = $this->input->post('current_password');
        $new_password = $this->input->post('new_password');

        $user_validation = $this->Dmodel->check_if_user_exists($id, $current_password);

        if ($user_validation->num_rows()) {
            $q = $this->Dmodel->simpan($id, $new_password);
            if ($q) {
                $ret['status'] = true;
                $ret['msg'] = 'Password Berhasil Diubah';
            } else {
                $ret['status'] = false;
                $ret['wrong'] = false;
                $ret['msg'] = 'Password Gagal Diubah';
            }
        } else {
            $ret['status'] = false;
            $ret['wrong'] = true;
            $ret['msg'] = 'Password Salah!';
        }
        echo json_encode($ret);
    }

}
