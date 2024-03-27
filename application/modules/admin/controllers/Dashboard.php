<?php

defined('BASEPATH') or exit ('No direct script access allowed');

class Dashboard extends MX_Controller
{

    public function index()
    {
        $isLogin = $this->session->userdata('isLogin');
        $level_user = $this->session->userdata('level_user');

        if ($isLogin == 'yes' && $level_user == "admin") {

            $data['konten'] = 'v_dashboard';
            $data['libjs'] = 'dashboard';

            $this->theme->admin_dashboard_theme($data);
        } else {
            redirect('admin/login', 'refresh');
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

            $ret['capaian'] = $row->capaian;
            $ret['canvaser'] = $row->canvaser;
            $ret['jumlah_box'] = $row->jumlah_box;
            $ret['program'] = $row->program;

            $ret['status'] = true;
        } else {
            $ret['status'] = false;
        }

        echo json_encode($ret);
    }

    public function chart_capaian_mitra()
    {
        $q = $this->db->select('b.mitra_id, c.nama_usaha, SUM(a.jumlah_kolektif) AS capaian FROM laporan_kolektif a LEFT JOIN data_box b ON a.id_box = b.id_box LEFT JOIN data_mitra_box c ON b.mitra_id = c.id  GROUP BY b.mitra_id ORDER BY capaian DESC limit 10;', false)->get();

        if ($q->num_rows()) {
            foreach ($q->result() as $field) {
                $data['labels'][] = $field->nama_usaha;
                $data['data']['capaian'][] = $field->capaian;
            }
            $data['status'] = true;
        } else {
            $data['status'] = false;
        }
        echo json_encode($data);
    }

    public function table_capaian_mitra()
    {
        if ($this->input->is_ajax_request() == true) {

            $this->db->select('b.mitra_id, c.nama_usaha, SUM(a.jumlah_kolektif) AS capaian FROM laporan_kolektif a LEFT JOIN data_box b ON a.id_box = b.id_box LEFT JOIN data_mitra_box c ON b.mitra_id = c.id  GROUP BY b.mitra_id ORDER BY capaian DESC limit 10;', false);

            $list = $this->db->get();
            $count_all = $this->db->count_all_results();
            $count_filtered = $list->num_rows();
            $data = array();
            $no = $_POST['start'];
            foreach ($list->result() as $field) {

                $no++;
                $row = array();

                $row[] = $no;
                $row[] = $field->nama_usaha;
                $row[] = number_format($field->capaian, 2, ",", ".");

                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $count_all,
                "recordsFiltered" => $count_filtered,
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            exit ('Maaf data tidak bisa ditampilkan');
        }
    }

}

/* End of file Dashboard.php */
