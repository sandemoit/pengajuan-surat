<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tracking extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Frontend_model');
    }

    public function index()
    {
        $data['konfigurasi'] = $this->db->get('konfigurasi')->row_array();
        $data['title'] = 'Tracking';

        $this->load->view('frontend/header2', $data);
        $this->load->view('frontend/tracking', $data);
        $this->load->view('frontend/footer2', $data);
    }

    public function cari()
    {
        $nosurat = $this->input->post('tracknosurat', TRUE);
        $row = $this->Frontend_model->findByNoSurat($nosurat);

        if (empty($row)) {
            set_pesan('No Surat yang anda masukkan Salah!  <b>No Surat: </b><b>' . $nosurat . '</b> <i>Tidak ditemukan</i></div>', FALSE);
            redirect('tracking');
        } else {
            redirect("tracking/tracked/" . $nosurat);
        }
    }

    public function tracked()
    {
        $data['konfigurasi'] = $this->db->get('konfigurasi')->row_array();
        $nosurat = $this->uri->segment(3);
        $data['row'] = $this->Frontend_model->showByNoSurat($nosurat);
        $data['title'] = 'Tracking';

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

        $this->load->view('frontend/header2', $data);
        $this->load->view('frontend/result', $data);
        $this->load->view('frontend/footer2', $data);
    }
}
