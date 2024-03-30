<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_user extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model', 'AM');
        $this->AM->user_login() ? '' : $this->AM->logout();
    }

    public $table = 'data_user';

    public function index()
    {
        $isLogin = $this->session->userdata('isLogin');
        $level_user = $this->session->userdata('level_user');

        if ($isLogin == 'yes' && $level_user == "admin") {
            $data['konten'] = 'v_data_user';
            $data['libjs'] = 'data_user';
            $data['addbtn'] = addbtn();

            $this->theme->admin_dashboard_theme($data);
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    public function table_data_user()
    {
        $table = 'data_user';
        $column_order = array(null, 'nik', 'username', 'password', 'level_user', 'foto', null);
        $column_search = array('nik', 'username', 'password', 'level_user');
        $order = array('nik' => 'asc');

        if ($this->input->is_ajax_request() == true) {
            $list = $this->AM->get_datatables($table, $column_order, $column_search, $order);
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {

                $no++;
                $no_foto = "<div class='text-center'><img src='" . base_url() . "/images/none.png' width='100px' height='100px'></img></div>";
                $row = array();

                $row[] = $no;
                $row[] = $field->nik;
                $row[] = $field->username;
                $row[] = $field->password;
                $row[] = $field->level_user;

                $row[] = $field->foto ? "<div class='text-center'><img src='" . base_url() . "/images/user/" . $field->foto . "' width='100px' height='100px'></img></div>" : $no_foto;

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

    public function tambah_data_user()
    {
        $ret['status'] = true;

        echo json_encode($ret);
    }

    public function edit_data_user($id)
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

    public function simpan_data_user()
    {
        $id = $this->input->post('id');
        $data['nik'] = $this->input->post('nik');
        $data['username'] = $this->input->post('username');
        $data['password'] = $this->input->post('password');
        $data['level_user'] = $this->input->post('level_user');

        $user_validation = $this->AM->check_if_user_exist($data, $id);

        if ($user_validation->num_rows()) {
            $ret['status'] = false;
            $ret['msg'] = 'Akun sudah ada!';
        } else {
            $imageFolder = "user";
            if (!empty($_FILES['profil'])) {
                $filename = 'img_' . $id;
                $upload_foto = $this->_upload_images('profil', $filename, $imageFolder);
                if ($upload_foto['status']) {
                    $data['foto'] = $upload_foto['filename'];
                }
            }

            if ($id) {
                $q = $this->AM->edit_data($this->table, $data, $id);
                if ($q) {
                    $ret['status'] = true;
                    $ret['msg'] = 'Akun berhasil diubah!';
                } else {
                    $ret['status'] = false;
                    $ret['msg'] = 'Akun gagal diubah!';
                }
            } else {
                $q = $this->AM->tambah_data($this->table, $data);
                if ($q) {
                    $ret['status'] = true;
                    $ret['msg'] = 'Akun berhasil ditambah!';
                } else {
                    $ret['status'] = false;
                    $ret['msg'] = 'Akun gagal ditambah!';
                }
            }
        }
        echo json_encode($ret);
    }

    public function hapus_data_user($id)
    {
        $q = $this->AM->hapus_data($this->table, $id, false);
        if ($q) {
            $ret['status'] = true;
            $ret['msg'] = 'Akun telah dihapus!';
        } else {
            $ret['status'] = false;
            $ret['msg'] = 'Akun gagal dihapus!';
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
