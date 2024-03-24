<?php

defined('BASEPATH') or exit ('No direct script access allowed');

class Program extends MX_Controller
{

    public function index()
    {
        $isLogin = $this->session->userdata('isLogin');
        $level_user = $this->session->userdata('level_user');

        if ($isLogin == 'yes' && $level_user == "canvaser") {
            $data['konten'] = 'v_program';
            $data['libjs'] = ['program'];

            $this->theme->mobile_dashboard_theme($data);
        } else {
            redirect('mobile/login', 'refresh');
        }
    }

    public function get_program()
    {
        $q = $this->db->get_where('data_program', array('deleted' => '1'));

        if ($q->num_rows()) {
            $ret['status'] = true;
            $ret['data'] = $q->result();
        } else {
            $ret['status'] = false;
            $ret['data'] = '';
        }

        echo json_encode($ret);
    }

}