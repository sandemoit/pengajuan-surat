<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Management Surat';

        $data['status'] = [
            1 => '<span class="badge rounded-pill badge-warning">Pending</span>',
            2 => '<span class="badge rounded-pill badge-danger">Syarat Tidak Terpenuhi</span>',
            3 => '<span class="badge rounded-pill badge-primary">Diterima dan Dilanjutkan</span>',
            4 => '<span class="badge rounded-pill badge-success">Sudah Diketik dan Diparaf</span>',
            5 => 'Selesai',
        ];

        $data['options'] = [
            'SPKK' => 'Kartu Keluarga',
            'SPNA' => 'Nikah(N.A)',
            'SKKL' => 'Kelahiran',
            'SKKM' => 'Kematian',
            'SKP' => 'Pindah',
            'SKD' => 'Datang',
            'SKBM' => 'Belum Menikah',
            'SKPH' => 'Penghasilan',
            'SKM' => 'Miskin',
            'SKU' => 'Usaha',
            'SKT' => 'Tanah',
            'SKGG' => 'Ganti Rugi',
            'SITU' => 'Izin Tempat Usaha',
            'SIMB' => 'Izin Mendirikan Bangunan',
        ];

        $data['pengaju'] = $this->db->get('pengajuan_surat')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/management_surat/pengajuan', $data);
        $this->load->view('template/footer', $data);
    }
}
