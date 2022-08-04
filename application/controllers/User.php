<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        // MENGECEK APAKAH SUDAH LOGIN ATAU BELUM
        //JIKA BELUM DIKEMBALIKAN KE PAGE LOGIN
        // $role_id = $this->session->userdata('role_id');
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['produk'] = $this->model_produk->tampil_data_semua_produk()->result();
        $data['title'] = 'Beranda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
        // echo 'Selamat Datang ' . $data['user']['name'];
    }

    public function produk()
    {
        $data['semua_produk'] = $this->model_produk->tampil_data_semua_produk()->result();
        $data['title'] = 'Produk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('user/produk', $data);
        $this->load->view('templates/footer');
    }

    public function tentang()
    {
        $data['title'] = 'Tentang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('user/tentang', $data);
        $this->load->view('templates/footer');
    }

    public function profil()
    {
        $data['title'] = 'Profil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('user/profil', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Profil';
            $this->load->view('templates/header', $data);
            $this->load->view('user/editProfil', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // Cek jika ada gambar yang diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['upload_path'] = './assets/img/profil/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/profil/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
			<svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
			<span class="sr-only">Info</span>
			<div>
			  <span class="font-medium">Profil kamu berhasil diupdate!</span>
			</div>
		  	</div>');
            redirect('user/profil');
        }
    }

    public function ubah_password()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Kata Sandi Lama', 'required|trim', [
            'required'      => 'Password harus diisi!'
        ]);
        $this->form_validation->set_rules('new_password1', 'Kata Sandi Baru', 'required|min_length[8]|matches[new_password2]', [
            'matches'       => 'Kata sandi tidak sama!',
            'min_length'    => 'Kata sandi minimal 8 karakter!',
            'required'      => 'Password harus diisi!'
        ]);

        $this->form_validation->set_rules('new_password2', 'Ulangi Kata Sandi', 'required|min_length[8]|matches[new_password1]', [
            'matches'       => 'Kata sandi tidak sama!',
            'min_length'    => 'Kata sandi minimal 8 karakter!',
            'required'      => 'Password harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Ubah Password';
            $this->load->view('templates/header', $data);
            $this->load->view('user/ubahPassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
			    <svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
			    <span class="sr-only">Info</span>
			    <div>
			  <span class="font-medium">Kata sandi lama salah!</span>
			    </div>
		  	    </div>');
                redirect('user/ubah_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                    <svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                     <span class="font-medium">Tidak boleh menggunakan kata sandi lama!</span>
                    </div>
                    </div>');
                    redirect('user/ubah_password');
                } else {
                    // PASSWORD SUDAH BENAR
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    <svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                    <span class="font-medium">Kata sandi berhasil diubah!</span>
                    </div>
                    </div>');
                    redirect('user/profil');
                }
            }
        }
    }

    public function detail_produk($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['produk'] = $this->model_produk->detail_semua_produk($id);
        $data['title'] = 'Detail Produk';

        $this->load->view('templates/header', $data);
        $this->load->view('user/detailProduk', $data);
        $this->load->view('templates/footer');
    }
}
