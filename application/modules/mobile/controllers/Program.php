<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Program extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mobile_model', 'AM');
        $this->AM->user_login() ? '' : $this->AM->logout();
    }

    public function index()
    {
        $data['konten'] = 'v_program';
        $data['libjs'] = ['program'];

        $this->theme->mobile_dashboard_theme($data);
    }

    public function get_program()
    {
        // $q = $this->db->get_where('data_program', array('deleted' => '1'));
        $date_now = date('Y-m-d');
        $query = "SELECT *, DATE_FORMAT(end, '%e %b %Y') AS berakhir, DATE_FORMAT(start, '%e %b') AS mulai FROM data_program WHERE start <= ? AND end >= ? AND deleted = '1'";
        $q = $this->db->query($query, array($date_now, $date_now));

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