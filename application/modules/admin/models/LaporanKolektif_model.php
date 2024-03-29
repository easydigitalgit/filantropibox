<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LaporanKolektif_model extends CI_Model
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

    public function get_laporan_by_id($id)
    {
        $q = $this->db->get_where('laporan_kolektif', array('id' => $id));
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

    public function check_if_box_exist($id)
    {
        $q = $this->db->select('* FROM data_box WHERE id = ' . $id, false)->get();
        return $q;
    }

    public function edit($data, $id)
    {
        $q = $this->db->update('laporan_kolektif', $data, array('id' => $id));
        return $q;
    }

    public function tambah($data)
    {
        $q = $this->db->insert('laporan_kolektif', $data);
        return $q;
    }

    public function hapus($id = 0)
    {
        $q = $this->db->update('laporan_kolektif', array('deleted' => 2), array('id' => $id));
        return $q;
    }

}