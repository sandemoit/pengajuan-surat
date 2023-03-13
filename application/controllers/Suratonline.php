<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suratonline extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('galery_model', 'galery');
        $this->load->model('admin_model');
        $this->load->model('mahasiswa_model', 'mahasiswa');
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

        $nama = $this->input->post('nama', TRUE);
        $nim = $this->input->post('nim', TRUE);
        $nowa = $this->input->post('nowa', TRUE);
        $jenis_surat = $this->input->post('jenis_surat', TRUE);

        $ceknim = $this->mahasiswa->cek_mahasiswa($nim)->num_rows();

        if ($ceknim <= 0) {
            $save = [
                'nim' => $nim,
                'nama' => $nama,
                'nowa' => $nowa,
            ];

            $this->db->insert('mahasiswa', $save);
        }

        //Output a v4 UUID 
        $rid = uniqid($jenis_surat, TRUE);
        $rid2 = str_replace('.', '', $rid);
        $rid3 = substr(str_shuffle($rid2), 0, 3);

        $cc = $this->db->count_all('pengajuan_surat') + 1;
        $count = str_pad($cc, 3, STR_PAD_LEFT);
        $id = $jenis_surat . "-";
        $d = date('d');
        $y = date('y');
        $mnth = date("m");
        $s = date('s');
        $randomize = $d + $y + $mnth + $s;
        $id = $id . $rid3 . $randomize . $count . $y;

        if ($_FILES['file']['size'] >= 10242880) {
            set_pesan('File Lebih 10MB!', false);
            redirect('suratonline');
        }

        if ($_FILES['file']['name'] == null) {
            $file = '-';
        } else {
            $namafile = substr($_FILES['file']['name'], -7);
            $file = $jenis_surat . uniqid() . $namafile;
            $config['upload_path']          = './assets/uploads/berkas';
            $config['allowed_types']        = 'JPEG/JPG/PDF/PNG';
            $config['max_size']             = 10240; // 10MB
            $config['file_name']            = $file;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {
                $new_file = $this->upload->data('file_name');
                $this->db->set('file', $new_file);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $data = [
            'id' => $id,
            'nim' => $nim,
            'jenis_surat' => $jenis_surat,
            'file' => $file,
            'tanggal' => date('Y-m-d'),
            'status' => $status[1]
        ];

        $this->admin_model->insert('pengajuan_surat', $data);
        $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-check"></i> Selamat!</h5> Berhasil Mengajukan Surat! Berikut <b>ID</b> anda: <b>' . $id . '</b></div>');
        redirect('suratonline');
    }
}
