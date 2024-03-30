<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mobile_model', 'AM');
        $this->AM->user_login() ? '' : $this->AM->logout();
    }

    public $table = 'biodata_canvaser';

    public function index()
    {
        $isLogin = $this->session->userdata('isLogin');
        $level_user = $this->session->userdata('level_user');

        if ($isLogin == 'yes' && $level_user == "canvaser") {
            $data['konten'] = 'v_profil';
            $data['libjs'] = ['profil'];

            $this->theme->mobile_dashboard_theme($data);
        } else {
            redirect('mobile/login', 'refresh');
        }
    }

    public function get_profil()
    {
        $id = $this->session->userdata('id_user');
        $q = $this->AM->get_biodata_by_id($id);

        if ($q->num_rows()) {
            $ret['status'] = true;
            $ret['data'] = $q->result();
        } else {
            $ret['status'] = false;
            $ret['data'] = '';
        }

        echo json_encode($ret);
    }

    public function simpan_profil()
    {
        $id = $this->session->userdata('id_user');
        $data['id_akun'] = $id;
        $data['nama'] = $this->input->post('nama');
        $data['email'] = $this->input->post('email');
        $data['kontak'] = $this->input->post('kontak');
        $data['alamat'] = $this->input->post('alamat');

        $imageFolder = "canvaser";

        if (!empty($_FILES['profil'])) {
            $filename = 'img_' . $id;
            $upload_foto = $this->_upload_images('profil', $filename, $imageFolder);
            if ($upload_foto['status']) {
                $foto = $upload_foto['filename'];
                $this->AM->tambah_foto($foto, $id);
            }
        }

        $biodata_validation = $this->AM->check_if_biodata_exist($id);

        if ($biodata_validation->num_rows()) {
            $q = $this->AM->edit_data($this->table, $data, $id, 'id_akun');
        } else {
            $q = $this->AM->tambah_data($this->table, $data);
        }

        if ($q) {
            $ret['status'] = true;
            $ret['msg'] = 'Biodata berhasil diubah!';
        } else {
            $ret['status'] = false;
            $ret['msg'] = 'Biodata gagal diubah!';
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
