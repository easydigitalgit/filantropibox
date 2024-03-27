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

    public function get_program()
    {
        $date_now = date('Y-m-d');
        $query = "SELECT * FROM data_program WHERE start <= ? AND end >= ? AND deleted = '1'";
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

    public function get_history()
    {
        $id_user = $this->session->userdata("id_user");
        $query = $this->db->select('c.nama_usaha AS nama, FORMAT(a.jumlah_kolektif, "NO") AS jumlah, a.tanggal_kolektif AS tanggal FROM laporan_kolektif a LEFT JOIN data_box b ON a.id_box = b.id_box LEFT JOIN data_mitra_box c ON b.mitra_id = c.id WHERE id_canvaser = "' . $id_user . '" ORDER BY `tanggal` DESC limit 20;', false)->get();

        if ($query->num_rows()) {
            // foreach ($query->result() as $field) {
            //     $data['nama'] = $field->nama;
            //     $data['jumlah'] = $field->jumlah;
            //     $data['tanggal'] = $field->tanggal;
            // }
            $data['data'] = $query->result();
            $data['status'] = true;
        } else {
            $data['status'] = false;
        }
        echo json_encode($data);
    }

}

/* End of file Dashboard.php */
