<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	// dapat diakses semuanya
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	// login
	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
			'valid_email' => 'Email tidak Valid!',
			'required' => 'Email harus diisi'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', [
			'required' => 'Password harus diisi'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login Akun Pengguna';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
		} else {
			// validasi sukses
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		// Jika usernya ada
		if ($user) {
			// Jika usernya aktif
			if ($user['is_active'] == 1) {
				// cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					redirect('user');
				} else {
					$this->session->set_flashdata('message', '<div class="bg-red-500 p-3 mb-8 font-montserrat text-sm font-medium text-gray-800 rounded-md text-center">
					Password salah!</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="bg-red-500 p-3 mb-8 font-montserrat text-sm font-medium text-gray-800 rounded-md text-center">
				Akun belum diaktivasi!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="bg-red-500 p-3 mb-8 font-montserrat text-sm font-medium text-gray-800 rounded-md text-center">
			Akun tidak terdaftar!</div>');
			redirect('auth');
		}
	}

	// registration
	public function registration()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim', [
			'required' => 'Nama harus diisi'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'valid_email' => 'Email tidak Valid!',
			'is_unique' => 'Email sudah terdaftar!',
			'required' => 'Email harus diisi'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Kata sandi tidak sama!',
			'min_length' => 'Kata sandi terlalu pendek!',
			'required' => 'Password harus diisi'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
			'required' => 'Password harus diisi'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Registrasi Akun Pengguna';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');
		} else {
			// Register sukses
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time()
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="bg-green-500 p-3 mb-8 font-montserrat text-sm font-medium text-gray-800 rounded-md text-center">
			Selamat!<br>Akun kamu sudah berhasil dibuat</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="bg-green-500 p-3 mb-8 font-montserrat text-sm font-medium text-gray-800 rounded-md text-center">
		Kamu telah berhasil Logout</div>');
		redirect('auth');
	}
}
