<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tracking extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Frontend_model');
        $this->load->model('Galery_model');
    }

    public function index()
    {
        // $data = $this->dashboard->user();
        $data['profil'] = $this->Galery_model->profil();
        $data['title'] = 'Tracking';

        // $data['sm'] = $this->db->get('surat_masuk')->row_array();
        // var_dump($data);
        $this->load->view('frontend/header2', $data);
        $this->load->view('frontend/tracking', $data);
        $this->load->view('frontend/footer2', $data);
    }

    public function cari()
    {
        $id = $this->input->post('trackid', TRUE);
        $row = $this->Frontend_model->findById($id);

        $data = [
            'id' => $id,
            'row' => $row
        ];

        if ($row === null) {
            set_pesan('ID yang anda masukkan Salah!  <b>ID: </b><b>' . $id . '</b> <i>Tidak ditemukan</i></div>', FALSE);
            redirect('tracking');
        } else {
            redirect("tracking/tracked/", $id);
        }
    }

    public function tracked()
    {
        $id = $this->uri->segment(3);
        $data['row'] = $this->Frontend_model->showById($id);
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
        $data['title'] = 'Tracking';

        // var_dump($data);
        // die;

        $this->load->view('frontend/header2', $data);
        $this->load->view('frontend/result', $data);
        $this->load->view('frontend/footer2', $data);
    }
}
