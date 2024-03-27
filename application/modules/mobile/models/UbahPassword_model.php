<?php

defined('BASEPATH') or exit ('No direct script access allowed');

class UbahPassword_model extends CI_Model
{

    public function check_if_user_exists($id, $pass)
    {
        $q = $this->db->get_where('data_user', array('id' => $id, 'password' => $pass));

        return $q;
    }

    public function simpan($id, $pass)
    {
        $q = $this->db->update('data_user', array('password' => $pass), array('id' => $id));

        return $q;
    }

}