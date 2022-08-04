<?php

class Model_produk extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('tb_produk_terlaris');
    }

    public function tampil_data_semua_produk()
    {
        return $this->db->get('tb_produk');
    }

    public function tampil_data_user()
    {
        return $this->db->get('user');
    }

    public function tambah_produk($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_produk($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function detail_produk($id)
    {
        $result = $this->db->where('id', $id)->get('tb_produk_terlaris');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function detail_semua_produk($id)
    {
        $result = $this->db->where('id', $id)->get('tb_produk');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
}
