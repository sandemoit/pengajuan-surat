<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manauser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        is_logged_in();
        if (!is_admin()) {
            redirect('admin/dashboard');
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Management User';
        $data['manauser'] = $this->db->get('user')->result_array();

        $data['role'] = [
            1 => '<span class="badge rounded-pill badge-warning">Admin</span>',
            2 => '<span class="badge rounded-pill badge-success">Karyawan</span>',
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/management_user/manauser', $data);
        $this->load->view('template/footer', $data);
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Tambah User';
        $data['pegawai'] = $this->Admin_model->get('pegawai');

        $this->form_validation->set_rules('name', 'Nama', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('role', 'Role', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('admin/management_user/tambah', $data);
            $this->load->view('template/footer', $data);
        } else {
            $save = [
                'name' => $this->input->post('name', true),
                'email' => $this->input->post('email', true),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role' => $this->input->post('role', true),
                'image' => 'default.jpg',
                'date_created' => time()
            ];

            // jika validasi lolos
            $this->Admin_model->insert('user', $save);
            set_pesan('Data Developer berhasil ditambahkan');
            redirect('admin/manauser');
        }
    }

    public function delete($id)
    {
        $id = encode_php_tags($id);
        $this->Admin_model->delete('user', 'id', $id);
        set_pesan('Data berhasil dihapus!');
        redirect('admin/manauser');
    }
}
