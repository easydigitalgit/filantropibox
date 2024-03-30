<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Biodata_canvaser extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model', 'AM');
        $this->AM->user_login() ? '' : $this->AM->logout();
    }

    public $table = 'biodata_canvaser';

    public function index()
    {
        $data['konten'] = 'v_biodata_canvaser';
        $data['libjs'] = 'biodata_canvaser';
        $data['addbtn'] = addbtn();
        $this->theme->admin_dashboard_theme($data);
    }

    public function table_biodata_canvaser()
    {
        $table = 'biodata_canvaser';
        $column_order = array(null, 'id_akun', 'nama', 'email', 'kontak', 'alamat', null);
        $column_search = array('id_akun', 'nama', 'email', 'kontak', 'alamat');
        $order = array('id_akun' => 'asc');

        if ($this->input->is_ajax_request() == true) {
            $list = $this->AM->get_datatables($table, $column_order, $column_search, $order);
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {

                $no++;
                $row = array();

                $row[] = $no;
                $row[] = $field->id_akun;
                $row[] = $field->nama;
                $row[] = $field->kontak;
                $row[] = $field->email;
                $row[] = $field->alamat;

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

    public function tambah_biodata_canvaser()
    {
        $ret['status'] = true;

        echo json_encode($ret);
    }

    public function edit_biodata_canvaser($id = 0)
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

    public function simpan_biodata_canvaser()
    {
        $id = $this->input->post('id');
        $data['id_akun'] = $this->input->post('id_akun');
        $data['nama'] = $this->input->post('nama');
        $data['kontak'] = $this->input->post('kontak');
        $data['email'] = $this->input->post('email');
        $data['alamat'] = $this->input->post('alamat');

        $biodata_validation = $this->AM->check_if_biodata_exist($data, $id);
        $check_canvaser = $this->AM->get_data_by_id($this->table, $data['id_akun']);

        if ($check_canvaser->num_rows()) {
            if ($biodata_validation->num_rows()) {
                $ret['status'] = false;
                $ret['msg'] = 'Data sudah ada!';
            } else {
                if ($id) {
                    $q = $this->AM->edit_data($this->table, $data, $id);
                    if ($q) {
                        $ret['status'] = true;
                        $ret['msg'] = 'Data berhasil diubah!';
                    } else {
                        $ret['status'] = false;
                        $ret['msg'] = 'Data gagal diubah!';
                    }
                } else {
                    $q = $this->AM->tambah_data($this->table, $data);
                    if ($q) {
                        $ret['status'] = true;
                        $ret['msg'] = 'Data berhasil ditambah!';
                    } else {
                        $ret['status'] = false;
                        $ret['msg'] = 'Data gagal ditambah!';
                    }
                }
            }
        } else {
            $ret['status'] = false;
            $ret['msg'] = 'ID Akun Canvaser Tidak Terdaftar!';
        }
        echo json_encode($ret);
    }

    public function hapus_biodata_canvaser($id)
    {
        $q = $this->AM->hapus_data($this->table, $id);
        if ($q) {
            $ret['status'] = true;
            $ret['msg'] = 'Data berhasil dihapus';
        } else {
            $ret['status'] = false;
            $ret['msg'] = 'Data gagal dihapus';
        }
        echo json_encode($ret);
    }

}
