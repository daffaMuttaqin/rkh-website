<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        // MENGECEK APAKAH SUDAH LOGIN ATAU BELUM
        //JIKA BELUM DIKEMBALIKAN KE PAGE LOGIN
        parent::__construct();
        is_logged_in();

        // if (!$this->session->userdata('email')) {
        //     redirect('auth');
        // }
    }
    public function index()
    {
        $data['semua_user'] = $this->model_produk->tampil_data_user()->result();
        $data['semua_produk'] = $this->model_produk->tampil_data_semua_produk()->result();
        $data['title'] = 'Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer', $data);
    }


    public function tambah_aksi_semua_produk()
    {
        $product_name   = $this->input->post('product_name');
        $description    = $this->input->post('description');
        $category       = $this->input->post('category');
        $price          = $this->input->post('price');
        $favorite          = $this->input->post('favorite');
        $product_image  = $_FILES['product_image']['name'];

        if ($product_image = '') {
        } else {
            $config['upload_path'] = './assets/img/produk/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('product_image')) {
                echo "Gambar gagal diupload";
            } else {
                $product_image = $this->upload->data('file_name');
            }
        }

        $data = [
            'product_name'  => $product_name,
            'description'   => $description,
            'category'      => $category,
            'price'         => $price,
            'product_image' => $product_image,
            'favorite'      => $favorite
        ];

        $this->model_produk->tambah_produk($data, 'tb_produk');
        $this->session->set_flashdata('message', '<div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    <svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                    <span class="font-medium">Data berhasil ditambah!</span>
                    </div>
                    </div>');
        redirect('admin');
    }


    public function edit_semua_produk($id)
    {
        $where = array('id' => $id);
        $data['semua_produk'] = $this->model_produk->edit_produk($where, 'tb_produk')->result();

        $data['title'] = 'Edit Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/editSemuaProduk', $data);
        $this->load->view('templates/footer', $data);
    }

    public function edit_user($id)
    {
        $where = array('id' => $id);
        $data['semua_user'] = $this->model_produk->edit_produk($where, 'user')->result();

        $data['title'] = 'Edit Data User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/editUser', $data);
        $this->load->view('templates/footer', $data);
    }


    public function update_semua_produk()
    {
        $data['semua_produk'] = $this->model_produk->tampil_data()->row_array();

        $id             = $this->input->post('id');
        $product_name   = $this->input->post('product_name');
        $description    = $this->input->post('description');
        $category       = $this->input->post('category');
        $price          = $this->input->post('price');
        $favorite       = $this->input->post('favorite');

        $product_image  = $_FILES['product_image']['name'];

        if ($product_image) {
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['upload_path'] = './assets/img/produk/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('product_image')) {
                $old_image = $data['produk']['product_image'];
                unlink(FCPATH . 'assets/img/produk/' . $old_image);
                $new_image = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
        }

        $data = array(
            'product_name'      => $product_name,
            'description'       => $description,
            'category'          => $category,
            'price'             => $price,
            'product_image'     => $new_image,
            'favorite'          => $favorite
        );

        $where = array(
            'id'    => $id
        );

        $this->model_produk->update_data($where, $data, 'tb_produk');
        $this->session->set_flashdata('message', '<div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    <svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                    <span class="font-medium">Data berhasil diubah!</span>
                    </div>
                    </div>');
        redirect('admin');
    }

    public function update_user()
    {
        $data['semua_user'] = $this->model_produk->tampil_data()->row_array();

        $id             = $this->input->post('id');
        $name           = $this->input->post('name');
        $email          = $this->input->post('email');
        $role_id        = $this->input->post('role_id');
        $is_active      = $this->input->post('is_active');

        $data = array(
            'name'          => $name,
            'email'         => $email,
            'role_id'       => $role_id,
            'is_active'     => $is_active,
        );

        $where = array(
            'id'    => $id
        );

        $this->model_produk->update_data($where, $data, 'user');
        $this->session->set_flashdata('message', '<div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    <svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                    <span class="font-medium">Data User berhasil diubah!</span>
                    </div>
                    </div>');
        redirect('admin');
    }

    public function hapus_produk($id)
    {
        $where = array('id' => $id);
        $this->model_produk->hapus_data($where, 'tb_produk');
        $this->session->set_flashdata('message', '<div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    <svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                    <span class="font-medium">Produk berhasil dihapus!</span>
                    </div>
                    </div>');
        redirect('admin');
    }

    public function hapus_user($id)
    {
        $where = array('id' => $id);
        $this->model_produk->hapus_data($where, 'user');
        $this->session->set_flashdata('message', '<div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    <svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                    <span class="font-medium">Data user berhasil diubah!</span>
                    </div>
                    </div>');
        redirect('admin');
    }
}
