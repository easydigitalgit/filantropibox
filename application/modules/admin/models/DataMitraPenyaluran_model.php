<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DataMitraPenyaluran_model extends CI_Model
{

    var $table, $column_order, $column_search, $order;

    private function _get_datatables_query()
    {
        $this->db->from($this->table)->where('deleted', 1);

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
        $this->db->from($this->table)->where('deleted', 1);
        return $this->db->count_all_results();
    }

    public function get_mitra_penyaluran_by_id($id)
    {
        $q = $this->db->get_where('data_mitra_penyaluran', array('id' => $id));
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

    public function edit($data, $id)
    {
        $q = $this->db->update('data_mitra_penyaluran', $data, array('id' => $id));
        return $q;
    }

    public function tambah($data)
    {
        $q = $this->db->insert('data_mitra_penyaluran', $data);
        return $q;
    }

    public function hapus($id = 0)
    {
        $q = $this->db->update('data_mitra_penyaluran', array('deleted' => 2), array('id' => $id));
        return $q;
    }

}