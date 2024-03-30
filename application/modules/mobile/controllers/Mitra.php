<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mitra extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mobile_model', 'AM');
        $this->AM->user_login() ? '' : $this->AM->logout();
    }

    public $table = 'data_mitra_box';
    public $table2 = 'data_box';

    public function index()
    {
        $isLogin = $this->session->userdata('isLogin');
        $level_user = $this->session->userdata('level_user');

        if ($isLogin == 'yes' && $level_user == "canvaser") {
            $data['konten'] = 'v_mitra';
            $data['libjs'] = ['mitra'];

            $this->theme->mobile_dashboard_theme($data);
        } else {
            redirect('mobile/login', 'refresh');
        }
    }

    public function lokasi_mitra()
    {
        $q = $this->db->select('latlong_lokasi FROM data_mitra_box', false)->get();

        if ($q->num_rows()) {
            $ret['status'] = true;
            $ret['data'] = $q->result();
        }

        echo json_encode($ret);
    }

    public function tambah_mitra()
    {
        $jumlah_box = $this->input->post('jumlah_box');
        $data['nama_usaha'] = $this->input->post('nama_usaha');
        $data['nama_penanggung_jawab'] = $this->input->post('nama_penanggung_jawab');
        $data['no_wa'] = $this->input->post('no_wa');
        $data['jenis_usaha'] = $this->input->post('jenis_usaha');
        $data['latlong_lokasi'] = $this->input->post('latlong_lokasi');
        $data['alamat'] = $this->input->post('alamat');
        $data['keterangan'] = $this->input->post('keterangan');

        $imageFolder = "mitra_box";

        $data_validation = $this->AM->check_if_mitra_exist($data);

        if ($data_validation->num_rows()) {
            $ret['status'] = false;
            $ret['msg'] = 'Mitra sudah ada!';
        } else {
            if (!empty($_FILES['foto_usaha'])) {
                $filename = 'img_' . uniqid();
                $upload_foto = $this->_upload_images('foto_usaha', $filename, $imageFolder);
                if ($upload_foto['status']) {
                    $data['foto_usaha'] = $upload_foto['filename'];
                }
            }

            if (!empty($_FILES['foto_penanggung_jawab'])) {
                $filename = 'img_' . uniqid();
                $upload_foto = $this->_upload_images('foto_penanggung_jawab', $filename, $imageFolder);
                if ($upload_foto['status']) {
                    $data['foto_penanggung_jawab'] = $upload_foto['filename'];
                }
            }

            $q = $this->AM->tambah_data($this->table, $data);
            if ($q) {
                $mitra_validation = $this->AM->check_if_mitra_exist($data);
                if ($mitra_validation->num_rows()) {
                    $row = $mitra_validation->row();
                    $ret = $this->tambah_box($jumlah_box, $row->id);
                }
            } else {
                $ret['status'] = false;
                $ret['msg'] = 'Mitra gagal ditambah!';
            }
        }
        echo json_encode($ret);
    }

    private function tambah_box($jumlah_box, $mitra_id)
    {
        $data['mitra_id'] = $mitra_id;

        $imageFolder = "daftar_box";
        for ($i = 1; $i <= $jumlah_box; $i++) {
            $data['id_box'] = $this->input->post('box_' . $i);

            if (!empty($_FILES['foto_box_' . $i])) {
                $filename = 'img_' . uniqid();
                $upload_foto = $this->_upload_images('foto_box_' . $i, $filename, $imageFolder);
                if ($upload_foto['status']) {
                    $data['gambar'] = $upload_foto['filename'];
                }
            }

            $data_validation = $this->AM->check_if_box_exist($data['id_box']);

            if ($data_validation->num_rows()) {
                $ret['status'] = false;
                $ret['msg'] = 'Data sudah ada!';
            } else {
                $q = $this->AM->tambah_box($this->table2, $data);
                if ($q) {
                    $ret['status'] = true;
                    $ret['msg'] = 'Mitra berhasil ditambah!';
                } else {
                    $ret['status'] = false;
                    $ret['msg'] = 'Mitra gagal ditambah!';
                }
            }
        }
        return $ret;
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

/* End of file Mitra.php */
