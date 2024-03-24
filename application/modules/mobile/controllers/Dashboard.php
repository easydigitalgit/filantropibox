<?php

defined('BASEPATH') or exit ('No direct script access allowed');

class Dashboard extends MX_Controller
{

    public function index()
    {
        $isLogin = $this->session->userdata('isLogin');
        $level_user = $this->session->userdata('level_user');

        if ($isLogin == 'yes' && $level_user == "canvaser") {
            $data['konten'] = 'v_dashboard';
            $data['libjs'] = ['dashboard'];

            $this->theme->mobile_dashboard_theme($data);
        } else {
            redirect('mobile/login', 'refresh');
        }
    }

    public function get_dashboard_data()
    {
        $q = $this->db->select(
            "FORMAT(SUM(jumlah_kolektif), 'NO') AS capaian, (SELECT COUNT(id) FROM data_user WHERE level_user = 'canvaser') AS canvaser, 
            (SELECT COUNT(id) FROM data_box) AS jumlah_box, (SELECT COUNT(id) FROM data_program) AS program 
            FROM laporan_kolektif;",
            false
        )->get();

        if ($q->num_rows()) {
            $row = $q->row();

            $data['capaian'] = $row->capaian;
            $data['canvaser'] = $row->canvaser;
            $data['jumlah_box'] = $row->jumlah_box;
            $data['program'] = $row->program;

            $data['status'] = true;
        } else {
            $data['status'] = false;
        }

        echo json_encode($data);
    }

}

/* End of file Dashboard.php */
