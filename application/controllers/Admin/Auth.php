<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function index()
	{
		if ($this->session->userdata('email')) {
			redirect('admin/dashboard');
		}
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Pengajuan Surat UBD';
			$this->load->view('admin/auth/login', $data);
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

		// jika user ada
		if ($user) {
			// cek password
			if (password_verify($password, $user['password'])) {
				$data = [
					'email' => $user['email'],
					'role' => $user['role']
				];
				$this->session->set_userdata($data);

				// set cookie
				if (!empty($this->input->post('save_id'))) {
					setcookie("loginId", $email, time() + (10 * 3 * 24 * 60 * 60));
					setcookie("loginId", hash('sha256', $password), time() + (10 * 3 * 24 * 60 * 60));
				} else {
					setcookie("loginId", "");
					setcookie("loginId", "");
				}

				redirect('admin/dashboard');
			} else {
				set_pesan('Wrong password!', FALSE);
				redirect('admin/auth');
			}
		} else {
			set_pesan('Email is not register', FALSE);
			redirect('admin/auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		delete_cookie('email');
		set_pesan('Your has ben logout');
		redirect('admin/auth');
	}
}
