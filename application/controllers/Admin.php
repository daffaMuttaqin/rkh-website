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
        $data['review_detail'] = $this->model_produk->tampil_data_review_detail()->result();
        $data['review_detail_acc'] = $this->model_produk->tampil_data_review_detail_acc()->result();
        $data['review'] = $this->model_produk->tampil_data_review()->result();
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
        // $favorite          = $this->input->post('favorite');
        $product_image  = $_FILES['product_image']['name'];

        if ($product_image = '') {
        } else {
            $config['upload_path'] = './assets/img/produk/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('product_image')) {
                echo "File gagal diupload";
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
            'favorite'      => 0
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

    public function edit_testimoni($id)
    {
        $where = array('id' => $id);
        $data['review'] = $this->model_produk->edit_testimoni($where, 'tb_review')->result();

        $data['title'] = 'Edit Testimoni';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/editTestimoni', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_pesanan()
    {

        $data['title'] = 'Tambah Pesanan';
        $data['review'] = $this->model_produk->tampil_data_review()->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/tambahPesanan', $data);
        $this->load->view('templates/footer', $data);
    }


    public function update_semua_produk()
    {
        $data['semua_produk'] = $this->model_produk->tampil_data_semua_produk()->row_array();

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
                $old_image = $data['tb_produk']['product_image'];
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
        $data['semua_user'] = $this->model_produk->tampil_data_user()->row_array();

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

    public function terima_testimoni($id)
    {
        $data['acc_review'] = $this->model_produk->tampil_data_review_detail_acc()->row_array();

        $data = array(
            'agree'              => 1
        );

        $where = array(
            'id_review'    => $id
        );

        $this->model_produk->update_data($where, $data, 'tb_review_detail');
        $this->session->set_flashdata('message', '<div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    <svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                    <span class="font-medium">Review berhasil diterima</span>
                    </div>
                    </div>');
        redirect('admin');
    }

    public function tolak_testimoni($id)
    {
        $data['acc_review'] = $this->model_produk->tampil_data_review_detail_acc()->row_array();

        $data = array(
            'agree'              => 2
        );

        $where = array(
            'id_review'    => $id
        );

        $this->model_produk->update_data($where, $data, 'tb_review_detail');
        $this->session->set_flashdata('message', '<div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    <svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                    <span class="font-medium">Review berhasil diterima</span>
                    </div>
                    </div>');
        redirect('admin');
    }

    public function update_testimoni()
    {
        $data['review'] = $this->model_produk->tampil_data_review()->row_array();

        $id             = $this->input->post('id');
        $name           = $this->input->post('name');
        $review         = $this->input->post('review');
        $favorite       = $this->input->post('favorite');

        $image_review   = $_FILES['image_review']['name'];

        if ($image_review) {
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['upload_path'] = './assets/img/testimoni/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image_review')) {
                $old_image = $data['tb_review']['image_review'];
                unlink(FCPATH . 'assets/img/testimoni/' . $old_image);
                $new_image = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
        }

        $data = array(
            'name'              => $name,
            'review'            => $review,
            'image_review'      => $new_image,
            'favorite'          => $favorite
        );

        $where = array(
            'id'    => $id
        );

        $this->model_produk->update_data($where, $data, 'tb_review');
        $this->session->set_flashdata('message', '<div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    <svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                    <span class="font-medium">Data berhasil diubah!</span>
                    </div>
                    </div>');
        redirect('admin');
    }

    public function hapus_produk($id)
    {
        $where = array('id' => $id);
        $files = $this->db->get_where('tb_produk', $where)->row_array();
        $file = $files['product_image'];
        $this->model_produk->hapus_data_produk($where, 'tb_produk', $file);
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
        $files = $this->db->get_where('user', $where)->row_array();
        $file = $files['image'];

        // Jika foto profile default gambar tidak dihapus
        if ($file == 'default.png') {
            $this->model_produk->hapus_data($where, 'user');
            $this->session->set_flashdata('message', '<div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    <svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                    <span class="font-medium">Data user berhasil diubah!</span>
                    </div>
                    </div>');
            redirect('admin');
        } else {
            // Jika gambar tidak default maka dihapus
            $this->model_produk->hapus_data_user($where, 'user', $file);
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

    public function hapus_testimoni($id)
    {
        $where = array('id' => $id);
        $files = $this->db->get_where('tb_review', $where)->row_array();
        $file = $files['image_review'];
        $this->model_produk->hapus_data_file($where, 'tb_review', $file);
        $this->session->set_flashdata('message', '<div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    <svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                    <span class="font-medium">Testimoni berhasil dihapus!</span>
                    </div>
                    </div>');
        redirect('admin');
    }

    public function hapus_testimoni_detail($id)
    {
        $where = array('id_review' => $id);
        $files = $this->db->get_where('tb_review_detail', $where)->row_array();
        $file = $files['image_review'];
        $this->model_produk->hapus_data_file($where, 'tb_review_detail', $file);
        $this->session->set_flashdata('message', '<div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    <svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                    <span class="font-medium">Testimoni berhasil dihapus!</span>
                    </div>
                    </div>');
        redirect('admin');
    }

    public function tambah_poin()
    {
        $code_account = $this->input->post('code_account');
        $poin = $this->input->post('point');

        $user = $this->db->get_where('user', ['code_account' => $code_account])->row_array();

        // Jika usernya ada
        if ($user) {
            // Jika usernya aktif
            if ($user['is_active'] == 1) {
                // menambah point
                $data = [
                    'point' => $user['point'] + $poin
                ];

                $this->db->where('code_account', $code_account);
                $this->db->update('user', $data);
                $this->session->set_flashdata('message', '<div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    <svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                    <span class="font-medium">Poin berhasil ditambah!</span>
                    </div>
                    </div>');
                redirect('admin');
            } else {
                $this->session->set_flashdata('message', '<div class="flex p-4 mb-4 border border-slate-300 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
					<svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
					<span class="sr-only">Info</span>
					<div>
					  <span class="font-medium">Kode akun pengguna tidak aktif</span>
					</div>
					  </div>');
                redirect('admin');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="flex p-4 text-center border border-slate-300 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
				<svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
				<span class="sr-only">Info</span>
				<div>
				  <span class="font-medium">Kode akun tidak terdaftar!</span>
				</div>
				  </div>');
            redirect('admin');
        }
    }

    public function dapatkan_diskon()
    {
        $code_account = $this->input->post('code_account');

        $user = $this->db->get_where('user', ['code_account' => $code_account])->row_array();

        // Jika usernya ada
        if ($user) {
            // Jika usernya aktif
            if ($user['is_active'] == 1) {

                if ($user['point'] < 10) {
                    // Jika point tidak cukup
                    $this->session->set_flashdata('message', '<div class="flex p-4 mb-4 border border-slate-300 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
					<svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
					<span class="sr-only">Info</span>
					<div>
					  <span class="font-medium">Poin pengguna tidak cukup untuk mendapatkan diskon</span>
					</div>
					  </div>');
                    redirect('admin');
                } else {
                    // mengurangi point
                    $data = [
                        'point' => $user['point'] - 10
                    ];

                    $this->db->where('code_account', $code_account);
                    $this->db->update('user', $data);
                    $this->session->set_flashdata('message', '<div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                        <svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Info</span>
                        <div>
                        <span class="font-medium">Diskon 10% berhasil didapatkan!</span>
                        </div>
                        </div>');
                    redirect('admin');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="flex p-4 mb-4 border border-slate-300 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
					<svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
					<span class="sr-only">Info</span>
					<div>
					  <span class="font-medium">Kode akun pengguna tidak aktif</span>
					</div>
					  </div>');
                redirect('admin');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="flex p-4 text-center border border-slate-300 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
				<svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
				<span class="sr-only">Info</span>
				<div>
				  <span class="font-medium">Kode akun tidak terdaftar!</span>
				</div>
				  </div>');
            redirect('admin');
        }
    }
}
