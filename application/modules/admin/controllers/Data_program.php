<?php

defined('BASEPATH') or exit ('No direct script access allowed');

class Data_program extends MX_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataProgram_model', 'Dmodel');

    }


    public function index()
    {
        $isLogin = $this->session->userdata('isLogin');
        $level_user = $this->session->userdata('level_user');

        if ($isLogin == 'yes' && $level_user == "admin") {

            $data['konten'] = 'v_data_program';
            $data['libjs'] = 'data_program';
            $data['addbtn'] = addbtn();

            $this->theme->admin_dashboard_theme($data);
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    public function table_data_program()
    {
        $table = 'data_program';
        $column_order = array(null, 'nama_program', 'kategori_id', 'keterangan_program', 'start', 'end', null);
        $column_search = array('nama_program', 'kategori_id', 'keterangan_program', 'start', 'end');
        $order = array('nama_program' => 'asc');

        if ($this->input->is_ajax_request() == true) {
            $list = $this->Dmodel->get_datatables($table, $column_order, $column_search, $order);
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {

                $no++;
                $row = array();
                $row[] = $no;

                $row[] = $field->nama_program;
                $row[] = $field->kategori_id;
                $row[] = $field->keterangan_program;
                $row[] = $field->start;
                $row[] = $field->end;

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

    public function tambah_data_program()
    {
        $ret['status'] = true;

        echo json_encode($ret);
    }

    public function edit_data_program($id = 0)
    {
        $q = $this->Dmodel->get_program_by_id($id);
        if ($q->num_rows()) {
            $ret['status'] = true;
            $ret['data'] = $q->row();
        } else {
            $ret['status'] = false;
            $ret['data'] = 0;
        }
        echo json_encode($ret);
    }

    public function simpan_data_program()
    {
        $id = $this->input->post('id');
        $data['nama_program'] = $this->input->post('nama_program');
        $data['kategori_id'] = $this->input->post('kategori');
        $data['keterangan_program'] = $this->input->post('keterangan');
        $data['start'] = $this->input->post('mulai');
        $data['end'] = $this->input->post('berakhir');

        $guru_validation = $this->Dmodel->check_if_program_exist($data, $id);

        if ($guru_validation->num_rows()) {
            $ret['status'] = false;
            $ret['msg'] = 'Data sudah ada!';
        } else {
            $imageFolder = "program";

            if (!empty ($_FILES['gambar'])) {
                $filename = 'img_' . uniqid();
                $upload_foto = $this->_upload_images('gambar', $filename, $imageFolder);
                if ($upload_foto['status']) {
                    $data['gambar'] = $upload_foto['filename'];
                }
            }

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
        echo json_encode($ret);
    }

    public function hapus_data_program($id)
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

    private function _upload_images($fieldName, $name, $folder, $ovr = true, $ext = 'jpg|JPG|jpeg|JPEG|png|PNG', $maxSize = 2500, $maxWidth = 4500, $maxHeight = 4500)
    {
        $config = array();
        $config['upload_path'] = './images/' . $folder . '/';
        $config['allowed_types'] = $ext;
        $config['max_size'] = $maxSize; //set max size allowed in Kilobyte
        $config['max_width'] = $maxWidth; // set max width image allowed
        $config['max_height'] = $maxHeight; // set max height allowed
        $config['file_name'] = $fieldName . '_' . $name;
        $config['file_ext_tolower'] = TRUE;

        $this->load->library('upload', $config, $fieldName); // Create custom object for foto upload
        $this->$fieldName->initialize($config);
        $this->$fieldName->overwrite = $ovr;

        //upload and validate
        if ($this->$fieldName->do_upload($fieldName)) {
            $res['filename'] = $this->$fieldName->data('file_name');
            $res['status'] = true;
        } else {
            $res['status'] = false;
        }
        return $res;
    }
}