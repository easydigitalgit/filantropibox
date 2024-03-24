<?php

defined('BASEPATH') or exit ('No direct script access allowed');

class Box_model extends CI_Model
{

    public function get_mitra_like($keyword, $limit = 10)
    {
        $this->db->select("id, nama_usaha, alamat FROM data_mitra_box", false);
        $this->db->like("nama_usaha", $keyword);
        $this->db->limit($limit);

        $q = $this->db->get();

        return $q;
    }

    public function check_if_box_exist($data)
    {
        $query = "* FROM data_box WHERE id_box = '" . $data['id_box'] . "'";
        $q = $this->db->select($query, false)->get();

        return $q;
    }

    public function tambah($data)
    {
        $q = $this->db->insert('data_box', $data);
        return $q;
    }

    public function setor($data)
    {
        $q = $this->db->insert('laporan_kolektif', $data);
        return $q;
    }

}
