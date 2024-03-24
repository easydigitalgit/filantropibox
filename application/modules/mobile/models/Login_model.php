<?php

defined('BASEPATH') or exit ('No direct script access allowed');

class Login_model extends CI_Model
{

    public function cek_login($user, $pass)
    {
        $cekUser = $this->db->select('* FROM data_user WHERE username = "' . $user . '" AND password = "' . $pass . '" AND level_user = "canvaser" AND deleted = 1', false)->get();
        if ($cekUser->num_rows()) {
            $row = $cekUser->row();

            $data['id_user'] = $row->id;
            $data['username'] = $user;
            $data['level_user'] = $row->level_user;
            $data['isLogin'] = 'yes';
            if ($row->foto != '') {
                $data['foto'] = 'images/user/' . $row->foto;
            } else {
                $data['foto'] = 'images/user.png';
            }

            $this->session->set_userdata($data);

            $ret['status'] = true;
        } else {
            $ret['status'] = false;
            $ret['msg'] = 'Username atau Password salah!';
        }
        return $ret;
    }

}

/* End of file Login_model.php */
