<?php

defined('BASEPATH') or exit ('No direct script access allowed');

class Daftar_box extends MX_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('DaftarBox_model', 'Dmodel');

    }


    public function index()
    {
        $isLogin = $this->session->userdata('isLogin');
        $level_user = $this->session->userdata('level_user');

        if ($isLogin == 'yes' && $level_user == "admin") {

            $data['konten'] = 'v_daftar_box';
            $data['libjs'] = 'daftar_box';
            $data['addbtn'] = addbtn();

            $this->theme->admin_dashboard_theme($data);
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    public function table_daftar_box()
    {
        $table = 'data_box';
        $column_order = array(null, 'id_box', 'mitra_id', 'gambar', null);
        $column_search = array('id_box', 'mitra_id');
        $order = array('mitra_id' => 'asc');

        if ($this->input->is_ajax_request() == true) {
            $list = $this->Dmodel->get_datatables($table, $column_order, $column_search, $order);
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {

                $no++;
                $no_foto = "<div class='text-center'><img src='" . base_url() . "/images/none.png' width='100px' height='100px'></img></div>";
                $row = array();

                $row[] = $no;
                $row[] = $field->id_box;
                $row[] = $field->mitra_id;

                $row[] = $field->gambar ? "<div class='text-center'><img src='" . base_url() . "/images/daftar_box/" . $field->gambar . "' width='100px' height='100px'></img></div>" : $no_foto;

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

    public function tambah_daftar_box()
    {
        $ret['status'] = true;

        echo json_encode($ret);
    }

    public function edit_daftar_box($id = 0)
    {
        $q = $this->Dmodel->get_box_by_id($id);
        if ($q->num_rows()) {
            $ret['status'] = true;
            $ret['data'] = $q->row();
        } else {
            $ret['status'] = false;
            $ret['data'] = 0;
        }
        echo json_encode($ret);
    }

    public function simpan_daftar_box()
    {
        $id = $this->input->post('id');
        $data['id_box'] = $this->input->post('id_box');
        $data['mitra_id'] = $this->input->post('mitra_id');

        if (!$id) {
            $data['gambar'] = null;
        }

        $imageFolder = "daftar_box";

        $data_validation = $this->Dmodel->check_if_box_exist($data, $id);

        if ($data_validation->num_rows()) {
            $ret['status'] = false;
            $ret['msg'] = 'Data Box sudah ada!';
        } else {

            if (!empty ($_FILES['foto_box'])) {
                $filename = 'img_' . (substr('00000', strval(strlen($id))) . $id);
                $upload_foto = $this->_upload_images('foto_box', $filename, $imageFolder);
                if ($upload_foto['status']) {
                    $data['gambar'] = $upload_foto['filename'];
                }
            }

            if ($id) {
                $q = $this->Dmodel->edit($data, $id);
                if ($q) {
                    $ret['status'] = true;
                    $ret['msg'] = 'Data Box berhasil diubah!';
                } else {
                    $ret['status'] = false;
                    $ret['msg'] = 'Data Box gagal diubah!';
                }
            } else {
                $q = $this->Dmodel->tambah($data);
                if ($q) {
                    $ret['status'] = true;
                    $ret['msg'] = 'Data Box berhasil ditambah!';
                } else {
                    $ret['status'] = false;
                    $ret['msg'] = 'Data Box gagal ditambah!';
                }
            }
        }
        echo json_encode($ret);
    }

    public function hapus_daftar_box($id)
    {
        $q = $this->Dmodel->hapus($id);
        if ($q) {
            $ret['status'] = true;
            $ret['msg'] = 'Data Box berhasil dihapus';
        } else {
            $ret['status'] = false;
            $ret['msg'] = 'Data Box gagal dihapus';
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