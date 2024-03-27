<?php

defined('BASEPATH') or exit ('No direct script access allowed');

class Profil_model extends CI_Model
{

    public function check_if_biodata_exist($id)
    {
        $q = $this->db->get_where('biodata_canvaser', array('id_akun' => $id));

        return $q;
    }

    public function get_biodata_by_id($id)
    {
        $q = $this->db->select('a.*, b.foto as profil FROM biodata_canvaser a LEFT JOIN data_user b ON a.id_akun = b.id WHERE a.id_akun = "' . $id . '"', false)->get();

        return $q;
    }

    public function insert_foto($foto, $id)
    {
        $q = $this->db->update('data_user', array('foto' => $foto), array('id' => $id));

        $data['foto'] = 'images/user/' . $foto;
        $this->session->set_userdata($data);

        return $q;
    }

    public function tambah($data)
    {
        $q = $this->db->insert('biodata_canvaser', $data);
        return $q;
    }

    public function edit($data, $id)
    {
        $q = $this->db->update('biodata_canvaser', $data, array('id_akun' => $id));

        return $q;
        // $query = "UPDATE biodata_canvaser a, data_user b SET a.nama = ?, a.email = ?, a.kontak = ?, a.alamat = ?, b.foto = ? WHERE a.id_akun = ? AND b.id = ?";
        // $q = $this->db->query($query, array($data['nama'], $data['email'], $data['kontak'], $data['alamat'], $data['foto'], $id, $id));
    }

}
