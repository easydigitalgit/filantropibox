<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    var $table, $column_order, $column_search, $order;

    private function _get_datatables_query()
    {
        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables($table, $column_order, $column_search, $order)
    {
        $this->table = $table;
        $this->column_order = $column_order;
        $this->column_search = $column_search;
        $this->order = $order;

        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);

        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function cek_login($user, $pass)
    {
        $cekUser = $this->db->select('* FROM data_user WHERE username = "' . $user . '" AND password = "' . $pass . '" AND level_user = "admin" AND deleted = 1', false)->get();
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

        if ($isLogin == 'yes' && $level_user == "admin") {
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

    public function get_data_by_id($table, $id, $id_column = 'id')
    {
        $q = $this->db->get_where($table, array($id_column => $id));

        return $q;
    }

    public function tambah_data($table, $data)
    {
        $q = $this->db->insert($table, $data);

        return $q;
    }

    public function edit_data($table, $data, $id)
    {
        $q = $this->db->update($table, $data, array('id' => $id));

        return $q;
    }

    public function hapus_data($table, $id, $del = true)
    {
        if ($del) {
            $q = $this->db->delete($table, array('id' => $id));
        } else {
            $q = $this->db->update($table, array('deleted' => 2), array('id' => $id));
        }

        return $q;
    }

    public function check_if_biodata_exist($data, $id)
    {
        $q = $this->db->select('* FROM biodata_canvaser
            WHERE id != "' . $id . '" AND id_akun = "' . $data['id_akun'] . '"',
            false
        )->get();

        return $q;
    }

    public function check_if_box_exist($data, $id)
    {
        $q = $this->db->select('* FROM data_box
        WHERE id != "' . $id . '"
        AND id_box = "' . $data['id_box'] . '"',
            false
        )->get();

        return $q;
    }

    public function check_if_mitra_box_exist($data, $id)
    {
        $q = $this->db->select('* FROM data_mitra_box
        WHERE id != "' . $id . '"
        AND latlong_lokasi = "' . $data['latlong_lokasi'] . '"',
            false
        )->get();

        return $q;
    }

    public function check_if_mitra_penyaluran_exist($data, $id)
    {
        $q = $this->db->select('* FROM data_mitra_penyaluran
        WHERE id != "' . $id . '"
        AND nama_mitra = "' . $data['nama_mitra'] . '" AND latlong_lokasi = "' . $data['latlong_lokasi'] . '" AND deleted = 1',
            false
        )->get();

        return $q;
    }

    public function check_if_program_exist($data, $id)
    {
        $q = $this->db->select('* FROM data_program
        WHERE id != "' . $id . '"
        AND nama_program = "' . $data['nama_program'] . '" AND kategori_id = "' . $data['kategori_id'] . '"
        AND keterangan_program = "' . $data['keterangan_program'] . '" AND start = "' . $data['start'] . '"
        AND end = "' . $data['end'] . '"',
            false
        )->get();

        return $q;
    }

    public function check_if_laporan_exist($data, $id)
    {
        $q = $this->db->select('* FROM laporan_kolektif
        WHERE id != "' . $id . '"
        AND id_box = "' . $data['id_box'] . '" AND tanggal_kolektif = "' . $data['tanggal_kolektif'] . '"',
            false
        )->get();

        return $q;
    }

    public function check_if_canvaser_exist($id)
    {
        $q = $this->db->select('* FROM data_user WHERE level_user = "canvaser" AND id = ' . $id, false)->get();
        return $q;
    }

    public function check_if_user_exist($data, $id = null)
    {
        $q = $this->db->get_where('data_user', array('id !=' => $id, 'username' => $data['username']));
        return $q;
    }

    public function edit_biodata($data, $id)
    {
        $q = $this->db->update('biodata_canvaser', $data, array('id' => $id));
        return $q;
    }

    public function tambah_biodata($data)
    {
        $q = $this->db->insert('biodata_canvaser', $data);
        return $q;
    }

    public function hapus_biodata($id = 0)
    {
        $q = $this->db->delete('biodata_canvaser', array('id' => $id));
        return $q;
    }

    public function edit_box($data, $id)
    {
        $q = $this->db->update('data_box', $data, array('id' => $id));
        return $q;
    }

    public function tambah_box($data)
    {
        $q = $this->db->insert('data_box', $data);
        return $q;
    }

    public function hapus_box($id = 0)
    {
        $q = $this->db->delete('data_box', array('id' => $id));
        return $q;
    }

    public function edit_mitra_box($data, $id)
    {
        $q = $this->db->update('data_mitra_box', $data, array('id' => $id));
        return $q;
    }

    public function tambah_mitra_box($data)
    {
        $q = $this->db->insert('data_mitra_box', $data);
        return $q;
    }

    public function hapus_mitra_box($id = 0)
    {
        $q = $this->db->update('data_mitra_box', array('deleted' => 2), array('id' => $id));
        return $q;
    }

    public function edit_mitra_penyaluran($data, $id)
    {
        $q = $this->db->update('data_mitra_penyaluran', $data, array('id' => $id));
        return $q;
    }

    public function tambah_mitra_penyaluran($data)
    {
        $q = $this->db->insert('data_mitra_penyaluran', $data);
        return $q;
    }

    public function hapus_mitra_penyaluran($id = 0)
    {
        $q = $this->db->update('data_mitra_penyaluran', array('deleted' => 2), array('id' => $id));
        return $q;
    }

    public function edit_program($data, $id)
    {
        $q = $this->db->update('data_program', $data, array('id' => $id));
        return $q;
    }

    public function tambah_program($data)
    {
        $q = $this->db->insert('data_program', $data);
        return $q;
    }

    public function hapus_program($id = 0)
    {
        $q = $this->db->update('data_program', array('deleted' => 2), array('id' => $id));
        return $q;
    }

    public function edit_user($data, $id)
    {
        $q = $this->db->update('data_user', $data, array('id' => $id));

        if ($id == $this->session->userdata('id_user')) {
            $foto = 'images/user/' . $data['foto'];
            $this->session->set_userdata('foto', $foto);
        }

        return $q;
    }
}
