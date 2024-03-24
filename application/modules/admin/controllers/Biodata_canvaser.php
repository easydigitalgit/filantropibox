<?php

defined('BASEPATH') or exit ('No direct script access allowed');

class Biodata_canvaser extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('BiodataCanvaser_model', 'Dmodel');

    }

    public function index()
    {
        $isLogin = $this->session->userdata('isLogin');
        $level_user = $this->session->userdata('level_user');

        if ($isLogin == 'yes' && $level_user == "admin") {
            $data['konten'] = 'v_biodata_canvaser';
            $data['libjs'] = 'biodata_canvaser';
            $data['addbtn'] = addbtn();
            $this->theme->admin_dashboard_theme($data);
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    public function table_biodata_canvaser()
    {
        $table = 'biodata_canvaser';
        $column_order = array(null, 'id_akun', 'nama', 'email', 'kontak', 'alamat', null);
        $column_search = array('id_akun', 'nama', 'email', 'kontak', 'alamat');
        $order = array('id_akun' => 'asc');

        if ($this->input->is_ajax_request() == true) {
            $list = $this->Dmodel->get_datatables($table, $column_order, $column_search, $order);
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
                "recordsTotal" => $this->Dmodel->count_all(),
                "recordsFiltered" => $this->Dmodel->count_filtered(),
                "addbtn" => addbtn(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            exit ('Maaf data tidak bisa ditampilkan');
        }
    }

    public function tambah_biodata_canvaser()
    {
        $ret['status'] = true;

        echo json_encode($ret);
    }

    public function edit_biodata_canvaser($id = 0)
    {
        $q = $this->Dmodel->get_biodata_by_id($id);
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

        $biodata_validation = $this->Dmodel->check_if_biodata_exist($data, $id);
        $check_canvaser = $this->Dmodel->get_canvaser_by_id($data['id_akun']);

        if ($check_canvaser->num_rows()) {
            if ($biodata_validation->num_rows()) {
                $ret['status'] = false;
                $ret['msg'] = 'Data sudah ada!';
            } else {
                if ($id) {
                    $q = $this->Dmodel->edit($data, $id);
                    if ($q) {
                        $ret['status'] = true;
                        $ret['msg'] = 'Data berhasil diubah!';
                    } else {
                        $ret['status'] = false;
                        $ret['msg'] = 'Data gagal diubah!';
                    }
                } else {
                    $q = $this->Dmodel->tambah($data);
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
        $q = $this->Dmodel->hapus($id);
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
