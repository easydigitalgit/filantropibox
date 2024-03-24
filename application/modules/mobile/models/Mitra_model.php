<?php

defined('BASEPATH') or exit ('No direct script access allowed');

class Mitra_model extends CI_Model
{

    public function check_if_box_exist($id)
    {
        $query = "* FROM data_box WHERE id_box = " . $id;
        $q = $this->db->select($query, false)->get();

        return $q;
    }

    public function check_if_mitra_exist($data)
    {
        $query = '* FROM data_mitra_box WHERE no_wa = "' . $data['no_wa'] . '"';
        $q = $this->db->select($query, false)->get();

        return $q;
    }

    public function tambah_mitra($data)
    {
        $q = $this->db->insert('data_mitra_box', $data);
        return $q;
    }

    public function tambah_box($data)
    {
        $q = $this->db->insert('data_box', $data);
        return $q;
    }

}

/* End of file Mitra_model.php */
