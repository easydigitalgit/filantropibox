<?php

defined('BASEPATH') or exit ('No direct script access allowed');

class Lupa_password extends MX_Controller
{

    public function index()
    {
        $isLogin = $this->session->userdata('isLogin');
        $level_user = $this->session->userdata('level_user');

        if ($isLogin == 'yes' && $level_user == "canvaser") {
            $data['konten'] = 'v_lupa_password';
            $data['libjs'] = ['lupa_password'];

            $this->theme->mobile_dashboard_theme($data);
        } else {
            redirect('mobile/login', 'refresh');
        }
    }
}
