<?php

defined('BASEPATH') or exit ('No direct script access allowed');

class Data_mitra_box extends MX_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataMitraBox_model', 'Dmodel');

    }


    public function index()
    {
        $isLogin = $this->session->userdata('isLogin');
        $level_user = $this->session->userdata('level_user');

        if ($isLogin == 'yes' && $level_user == "admin") {

            $data['konten'] = 'v_data_mitra_box';
            $data['libjs'] = 'data_mitra_box';
            $data['addbtn'] = addbtn();

            $this->theme->admin_dashboard_theme($data);
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    public function table_data_mitra_box()
    {
        $table = 'data_mitra_box';
        $column_order = array(null, 'nama_usaha', 'nama_penanggung_jawab', 'alamat', 'no_wa', 'jenis_usaha', 'foto_usaha', 'foto_penanggung_jawab', null);
        $column_search = array('nama_usaha', 'nama_penanggung_jawab', 'alamat', 'jenis_usaha');
        $order = array('nama_usaha' => 'asc');

        if ($this->input->is_ajax_request() == true) {
            $list = $this->Dmodel->get_datatables($table, $column_order, $column_search, $order);
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {

                $no++;
                $no_foto = "<div class='text-center'><img src='" . base_url() . "/images/none.png' width='100px' height='100px'></img></div>";
                $row = array();

                $row[] = $no;
                $row[] = $field->nama_usaha;
                $row[] = $field->nama_penanggung_jawab;
                $row[] = $field->alamat;
                $row[] = $field->no_wa;
                $row[] = $field->jenis_usaha;

                $row[] = $field->foto_usaha ? "<div class='text-center'><img src='" . base_url() . "/images/mitra_box/" . $field->foto_usaha . "' width='100px' height='100px'></img></div>" : $no_foto;
                $row[] = $field->foto_penanggung_jawab ? "<div class='text-center'><img src='" . base_url() . "/images/mitra_box/" . $field->foto_penanggung_jawab . "' width='100px' height='100px'></img></div>" : $no_foto;

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

    public function tambah_data_mitra_box()
    {
        $ret['status'] = true;

        echo json_encode($ret);
    }

    public function edit_data_mitra_box($id = 0)
    {
        $q = $this->Dmodel->get_mitra_box_by_id($id);
        if ($q->num_rows()) {
            $ret['status'] = true;
            $ret['data'] = $q->row();
        } else {
            $ret['status'] = false;
            $ret['data'] = 0;
        }
        echo json_encode($ret);
    }

    public function simpan_data_mitra_box()
    {
        $id = $this->input->post('id');
        $data['nama_usaha'] = $this->input->post('nama_usaha');
        $data['nama_penanggung_jawab'] = $this->input->post('nama_penanggung_jawab');
        $data['alamat'] = $this->input->post('alamat');
        $data['no_wa'] = $this->input->post('no_wa');
        $data['latlong_lokasi'] = $this->input->post('latlong_lokasi');
        $data['jenis_usaha'] = $this->input->post('jenis_usaha');
        $data['keterangan'] = $this->input->post('keterangan');

        if (!$id) {
            $data['foto_usaha'] = null;
            $data['foto_penanggung_jawab'] = null;
        }

        $imageFolder = "mitra_box";

        if (!empty ($_FILES['foto_usaha'])) {
            $filename = 'img_' . uniqid();
            $upload_foto = $this->_upload_images('foto_usaha', $filename, $imageFolder);
            if ($upload_foto['status']) {
                $data['foto_usaha'] = $upload_foto['filename'];
            }
        }

        if (!empty ($_FILES['foto_penanggung_jawab'])) {
            $filename = 'img_' . uniqid();
            $upload_foto = $this->_upload_images('foto_penanggung_jawab', $filename, $imageFolder);
            if ($upload_foto['status']) {
                $data['foto_penanggung_jawab'] = $upload_foto['filename'];
            }
        }

        $data_validation = $this->Dmodel->check_if_mitra_box_exist($data, $id);

        if ($data_validation->num_rows()) {
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
        echo json_encode($ret);
    }

    public function hapus_data_mitra_box($id)
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