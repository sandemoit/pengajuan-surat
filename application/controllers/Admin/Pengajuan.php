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

        $data['pengaju'] = $this->Admin_model->get_pengajuan();

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/management_surat/pengajuan', $data);
        $this->load->view('template/footer', $data);
    }

    public function updateStatus($id)
    {
        $options = [
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

        $status = $this->input->post('status');

        if ($status == 5) {
            $pSurat = $this->db->get_where('pengajuan_surat', ['id' => $id])->row_array();
            $pndk = $this->db->get_where('karyawan', ['nosurat' => $pSurat['NOSURAT']])->row_array();
            $dateNow = date('Y-m-d');

            // Mengenerate No Surat
            $kode_terakhir = $this->db->query('SELECT * FROM surat_keluar ORDER BY LEFT(keterangan_surat_keluar, 3) ASC');
            $kode_baru = $kode_terakhir + 1;
            $y = date('Y');
            $bulan = date('n');
            $romawi = getRomawi($bulan);
            $mnth = $romawi;
            $kode = str_pad($kode_baru, 3, '0', STR_PAD_LEFT);
            $keterangan_surat_keluar = $kode . "/PT.GAS" . "/DU" . "/" . $mnth . "/" . $y;

            $save = [
                'nama_surat_keluar' => '[' . $pndk['nama'] . '-' . $pndk['hal'] . ']-Surat ' . $options[$pSurat['jenis_surat']],
                'tanggal_surat_keluar' => date('Y-m-d', strtotime($dateNow)),
                'keterangan_surat_keluar' => $keterangan_surat_keluar
            ];

            $this->db->insert('surat_keluar', $save);
        };

        $this->db->set('status', $status);
        $this->db->where(['id' => $id]);
        $this->db->update('pengajuan_surat');

        set_pesan('Status Surat Masuk Has ben update!');
        redirect('admin/pengajuan');
    }

    public function delete($id)
    {
        $id = encode_php_tags($id);
        $this->Admin_model->delete('pengajuan_surat', 'id', $id);
        set_pesan('Surat Masuk successfully delete');
        redirect('admin/pengajuan');
    }
}
