<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function cek_login($user, $pass)
    {
        $cekUser = $this->db->select('* FROM data_user WHERE username = "' . $user . '" AND password = "' . $pass . '" AND level_user = "admin" AND deleted = 1', false)->get();
        if ($cekUser->num_rows()) {
            $row = $cekUser->row();

            $data['username'] = $user;
            $data['level_user'] = $row->level_user;
            $data['isLogin'] = 'yes';

            $this->session->set_userdata($data);

            $ret['status'] = true;
        } else {
            $ret['status'] = false;
            $ret['msg'] = 'Username atau Password salah!';
        }
        return $ret;
    }
}