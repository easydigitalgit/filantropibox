<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mobile_model extends CI_Model
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

    public function user_login()
    {
        $isLogin = $this->session->userdata('isLogin');
        $level_user = $this->session->userdata('level_user');

        if ($isLogin == 'yes' && $level_user == "canvaser") {
            return true;
        } else {
            return false;
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        header('location:' . site_url('auth/login'));
    }

    public function get_mitra_like($keyword, $limit = 10)
    {
        $this->db->select("id, nama_usaha, alamat FROM data_mitra_box", false);
        $this->db->like("nama_usaha", $keyword);
        $this->db->limit($limit);

        $q = $this->db->get();

        return $q;
    }

    public function get_biodata_by_id($id)
    {
        $q = $this->db->select('a.*, b.foto as profil FROM biodata_canvaser a LEFT JOIN data_user b ON a.id_akun = b.id WHERE a.id_akun = "' . $id . '"', false)->get();

        return $q;
    }

    public function check_if_biodata_exist($id)
    {
        $q = $this->db->get_where('biodata_canvaser', array('id_akun' => $id));

        return $q;
    }

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

    public function check_if_user_exists($id, $pass)
    {
        $q = $this->db->get_where('data_user', array('id' => $id, 'password' => $pass));

        return $q;
    }

    public function tambah_data($table, $data)
    {
        $q = $this->db->insert($table, $data);

        return $q;
    }

    public function edit_data($table, $data, $id, $id_column = 'id')
    {
        $q = $this->db->update($table, $data, array($id_column => $id));

        return $q;
    }

    public function tambah_foto($foto, $id)
    {
        $q = $this->db->update('data_user', array('foto' => $foto), array('id' => $id));

        $data['foto'] = 'images/user/' . $foto;
        $this->session->set_userdata($data);

        return $q;
    }
}
