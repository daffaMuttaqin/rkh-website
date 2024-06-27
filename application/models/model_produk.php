<?php

class Model_produk extends CI_Model
{
    // public function tampil_data()
    // {
    //     return $this->db->get('tb_produk_terlaris');
    // }

    // NAMPILIN DATA

    // PRODUK
    public function get_count_produk()
    {
        return $this->db->count_all('tb_produk');
    }
    public function tampil_data_semua_produk()
    {
        return $this->db->get('tb_produk');
    }

    public function get_produk($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get('tb_produk');
        return $query->result();
    }
    // END PRODUK

    // USER
    public function get_count_user()
    {
        return $this->db->count_all('user');
    }

    public function tampil_data_user()
    {
        return $this->db->get('user');
    }

    public function get_user($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get('user');
        return $query->result();
    }

    // END GET USER

    // REVIEW TOKO
    public function get_count_testimoni_toko()
    {
        return $this->db->count_all('tb_review');
    }

    public function tampil_data_review()
    {
        return $this->db->get('tb_review');
    }

    public function get_testimoni_toko($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get('tb_review');
        return $query->result();
    }
    // END REVIEW TOKO

    // TESTIMONI PRODUK
    public function get_count_testimoni_produk()
    {
        return $this->db->count_all('tb_review_detail');
    }

    // public function tampil_data_review_detail()
    // {
    //     $this->db->select('*');
    //     $this->db->from('tb_review_detail');
    //     $this->db->join('tb_produk', 'tb_produk.id = tb_review_detail.id_product', 'left');
    //     $query = $this->db->get();
    //     return $query;
    // }

    public function get_testimoni_produk($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('tb_review_detail');
        $this->db->join('tb_produk', 'tb_produk.id = tb_review_detail.id_product', 'left');
        $query = $this->db->get()->result();
        return $query;
    }
    // END TESTIMONI PRODUK

    public function tampil_data_review_detail_acc()
    {
        $this->db->select('*');
        $this->db->from('tb_review_detail');
        $this->db->where('agree = 0');
        $this->db->join('tb_produk', 'tb_produk.id = tb_review_detail.id_product', 'left');
        $query = $this->db->get();
        return $query;
    }

    // TAMBAH DATA

    public function tambah_produk($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function tambah_testimoni($data, $table)
    {
        $this->db->insert($table, $data);
    }

    // EDIT DATA

    public function edit_produk($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function edit_testimoni($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    // UPDATE DATA

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    // HAPUS DATA

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function hapus_data_file($where, $table, $file)
    {
        $this->db->where($where);
        unlink("assets/img/testimoni/" . $file);
        $this->db->delete($table);
    }

    public function hapus_data_produk($where, $table, $file)
    {
        $this->db->where($where);
        unlink("assets/img/produk/" . $file);
        $this->db->delete($table);
    }

    public function hapus_data_user($where, $table, $file)
    {
        $this->db->where($where);
        unlink("assets/img/profil/" . $file);
        $this->db->delete($table);
    }

    // DETAIL DATA

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
