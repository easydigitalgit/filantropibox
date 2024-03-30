<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Box extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mobile_model', 'AM');
        $this->AM->user_login() ? '' : $this->AM->logout();
    }

    public $table = 'data_box';
    public $table2 = 'laporan_kolektif';

    public function index()
    {
        $data['konten'] = 'v_box';
        $data['libjs'] = ['box'];

        $this->theme->mobile_dashboard_theme($data);
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

    public function tambah_box()
    {
        $jumlah_box = $this->input->post('jumlah_box');
        $data['mitra_id'] = $this->input->post('id');

        $imageFolder = "daftar_box";

        if ($data['mitra_id']) {
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
            $ret['msg'] = 'Mitra tidak dipilih!';
        }

        echo json_encode($ret);
    }

    public function setor_box()
    {
        $data['id_canvaser'] = $this->session->userdata('id_user');
        $data['id_box'] = $this->input->post('no_box');
        $data['jumlah_kolektif'] = $this->input->post('nominal');
        $data['tanggal_kolektif'] = date("Y-m-d");
        $data['keterangan'] = $this->input->post('keterangan');

        $data_validation = $this->AM->check_if_box_exist($data['id_box']);

        if ($data_validation->num_rows()) {
            $q = $this->AM->tambah_data($this->table2, $data);
            if ($q) {
                $ret['status'] = true;
                $ret['msg'] = 'Data berhasil ditambah!';
            } else {
                $ret['status'] = false;
                $ret['msg'] = 'Data gagal ditambah!';
            }
        } else {
            $ret['status'] = false;
            $ret['msg'] = 'Data sudah ada!';
        }
        echo json_encode($ret);
    }

    public function tambah_pilihan_mitra($keyword)
    {
        $list = $this->AM->get_mitra_like($keyword);

        if ($list->num_rows()) {
            $data = '';
            $dataCount = 0;
            foreach ($list->result() as $field) {
                $dataCount += 1;
                $data .= '<li class="list-item"><p class="m-0 size-18 nama_usaha">' . $field->nama_usaha . '</p><span class="m-0" style="color: grey;">' . $field->alamat . '</span><div class="d-none">' . $field->id . '</div></li>';
                if ($dataCount < $list->num_rows()) {
                    $data .= '<div class="dividar border-snow my-2"></div>';
                }
            }
            $ret['status'] = true;
            $ret['data'] = $data;
        } else {
            $ret['status'] = false;
            $ret['data'] = '';
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