<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suratonline extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('galery_model', 'galery');
        $this->load->model('admin_model');
        $this->load->model('karyawan_model', 'karyawan');
        $this->load->model('Romawi_model', 'karyawan');
    }

    public function index()
    {
        $data['profil'] = $this->galery->profil();
        $data['title'] = 'Pengajuan Surat Online';
        $data['konfigurasi'] = $this->db->get('konfigurasi')->row_array();

        $data['options'] = [
            'Pilih',
            'Surat Pengantar:' => [
                'SPKK' => 'Kartu Keluarga',
                'SPNA' => 'nimah(N.A)',
            ],
            'Surat Keterangan:' => [
                'SKKL' => 'Kelahiran',
                'SKKM' => 'Kematian',
                'SKP' => 'Pindah',
                'SKD' => 'Datang',
                'SKBM' => 'Belum Menimah',
                'SKPH' => 'Penghasilan',
                'SKM' => 'Miskin',
                'SKU' => 'Usaha',
                'SKT' => 'Tanah',
                'SKGG' => 'Ganti Rugi',
            ],
            'Rekomendasi Surat:' => [
                'SITU' => 'Izin Tempat Usaha',
                'SIMB' => 'Izin Mendirikan Bangunan',
            ],
        ];

        $this->load->view('frontend/header2', $data);
        $this->load->view('frontend/s_online', $data);
        $this->load->view('frontend/footer2', $data);
    }

    public function ajukan()
    {
        $status = [
            1 => 1,  // Pending
            2 => 2,  // Diterima dan Dilanjutkan
            3 => 3,  // Sudah Diketik dan Diparaf
            4 => 4,  // Sudah Ditandatangani Lurah dan Selesai
        ];

        $nosurat = $this->input->post('nosurat', TRUE);
        $nama = $this->input->post('nama', TRUE);
        $hal = $this->input->post('hal', TRUE);
        $nowa = $this->input->post('nowa', TRUE);
        $jenis_surat = $this->input->post('jenis_surat', TRUE);

        $ceknosurat = $this->karyawan->cek_karyawan($nosurat)->num_rows();
        if ($ceknosurat <= 0) {
            $save = [
                'nosurat' => $nosurat,
                'hal' => $hal,
                'nama' => $nama,
                'nowa' => $nowa,
            ];
            $this->db->insert('karyawan', $save);
        }

        if ($_FILES['file']['size'] >= 10242880) {
            set_pesan('File Lebih 10MB!', false);
            redirect('suratonline');
        }

        //cek jika ada gambar di upload
        $upload_file = $_FILES['file']['name'];
        if ($upload_file) {
            $config['max_size']      = '2048';
            $config['upload_path']   = './assets/uploads/berkas';
            $config['allowed_types'] = 'pdf|doc|docx|jpg|jpeg|png';
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {
                $new_file = $this->upload->data('file_name');
                $this->db->set('file', $new_file);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $data = [
            'nosurat' => $nosurat,
            'hal' => $hal,
            'jenis_surat' => $jenis_surat,
            'tanggal' => date('Y-m-d'),
            'status' => $status[1]
        ];

        $this->admin_model->insert('pengajuan_surat', $data);
        $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-check"></i> Selamat!</h5> Berhasil Mengajukan Surat! Berikut <b>ID</b> anda: <b>' . $nosurat . '</b></div>');
        redirect('suratonline');
    }
}
