<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_kolektif extends MX_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model', 'AM');
        $this->AM->user_login() ? '' : $this->AM->logout();
    }

    public $table = 'laporan_kolektif';
    public $table2 = 'data_user';
    public $table3 = 'data_box';


    public function index()
    {
        $isLogin = $this->session->userdata('isLogin');
        $level_user = $this->session->userdata('level_user');

        if ($isLogin == 'yes' && $level_user == "admin") {

            $data['konten'] = 'v_laporan_kolektif';
            $data['libjs'] = 'laporan_kolektif';
            $data['addbtn'] = addbtn();

            $this->theme->admin_dashboard_theme($data);
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    public function table_laporan_kolektif()
    {
        $table = 'laporan_kolektif';
        $column_order = array(null, 'id_canvaser', 'id_box', 'jumlah_kolektif', 'tanggal_kolektif', 'keterangan', null);
        $column_search = array('id_canvaser', 'id_box', 'jumlah_kolektif', 'tanggal_kolektif', 'keterangan');
        $order = array('tanggal_kolektif' => 'desc');

        if ($this->input->is_ajax_request() == true) {
            $list = $this->AM->get_datatables($table, $column_order, $column_search, $order);
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {

                $no++;
                $row = array();

                $row[] = $no;
                $row[] = $field->id_canvaser;
                $row[] = $field->id_box;
                $row[] = $field->jumlah_kolektif;
                $row[] = $field->tanggal_kolektif;
                $row[] = $field->keterangan;

                $row[] = actbtn($field->id);

                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->AM->count_all(),
                "recordsFiltered" => $this->AM->count_filtered(),
                "addbtn" => addbtn(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }

    public function tambah_laporan_kolektif()
    {
        $ret['status'] = true;

        echo json_encode($ret);
    }

    public function edit_laporan_kolektif($id = 0)
    {
        $q = $this->AM->get_data_by_id($this->table, $id);
        if ($q->num_rows()) {
            $ret['status'] = true;
            $ret['data'] = $q->row();
        } else {
            $ret['status'] = false;
            $ret['data'] = 0;
        }
        echo json_encode($ret);
    }

    public function simpan_laporan_kolektif()
    {
        $id = $this->input->post('id');
        $data['id_canvaser'] = $this->input->post('id_canvaser');
        $data['id_box'] = $this->input->post('id_box');
        $data['jumlah_kolektif'] = $this->input->post('jumlah_kolektif');
        $data['tanggal_kolektif'] = $this->input->post('tanggal_kolektif');
        $data['keterangan'] = $this->input->post('keterangan');

        $laporan_validation = $this->AM->check_if_laporan_exist($data, $id);
        // $canvaser_validation = $this->AM->get_data_by_id($this->table2, $data['id_canvaser']);
        // $box_validation = $this->AM->get_data_by_id($this->table3, $data['id_box']);

        // if (!$canvaser_validation->num_rows()) {
        //     $ret['status'] = false;
        //     $ret['msg'] = 'ID Canvaser tidak terdaftar!';
        // } elseif (!$box_validation->num_rows()) {
        //     $ret['status'] = false;
        //     $ret['msg'] = 'ID Box tidak terdaftar!' . $data['id_box'];
        // } else {
        // }
        if ($laporan_validation->num_rows()) {
            $ret['status'] = false;
            $ret['msg'] = 'Laporan sudah ada!';
        } else {
            if ($id) {
                $q = $this->AM->edit_data($this->table, $data, $id);
                if ($q) {
                    $ret['status'] = true;
                    $ret['msg'] = 'Laporan berhasil diubah!';
                } else {
                    $ret['status'] = false;
                    $ret['msg'] = 'Laporan gagal diubah!';
                }
            } else {
                $canvaser_validation = $this->AM->get_data_by_id($this->table2, $data['id_canvaser']);
                $box_validation = $this->AM->get_data_by_id($this->table3, $data['id_box'], 'id_box');

                if (!$canvaser_validation->num_rows()) {
                    $ret['status'] = false;
                    $ret['msg'] = 'ID Canvaser tidak terdaftar!';
                } elseif (!$box_validation->num_rows()) {
                    $ret['status'] = false;
                    $ret['msg'] = 'ID Box tidak terdaftar!';
                } else {
                    $q = $this->AM->tambah_data($this->table, $data);
                    if ($q) {
                        $ret['status'] = true;
                        $ret['msg'] = 'Laporan berhasil ditambah!';
                    } else {
                        $ret['status'] = false;
                        $ret['msg'] = 'Laporan gagal ditambah!';
                    }
                }
            }
        }

        echo json_encode($ret);
    }

    public function hapus_laporan_kolektif($id)
    {
        $q = $this->AM->hapus_data($this->table, $id);
        if ($q) {
            $ret['status'] = true;
            $ret['msg'] = 'Laporan berhasil dihapus';
        } else {
            $ret['status'] = false;
            $ret['msg'] = 'Laporan gagal dihapus';
        }
        echo json_encode($ret);
    }

}