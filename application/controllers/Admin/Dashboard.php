<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Dashboard';

        $data['total_ps'] = $this->db->query('select * from pengajuan_surat')->num_rows();
        $data['total_masuk'] = $this->db->query('select * from surat_masuk')->num_rows();
        $data['total_keluar'] = $this->db->query('select * from surat_keluar')->num_rows();
        $data['total_user'] = $this->db->query('select * from user')->num_rows();

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template/footer', $data);
    }
}
