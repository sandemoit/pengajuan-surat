<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi extends CI_Controller
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
        $data['title'] = 'Form Konfigurasi Website';

        $data['konfigurasi'] = $this->db->get('konfigurasi')->row_array();

        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('nohp', 'No Handphone', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('admin/konfigurasi', $data);
            $this->load->view('template/footer', $data);
        } else {

            $id = $this->input->post('id', TRUE);
            $update = [
                'nama_perusahaan' => $this->input->post('nama_perusahaan', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'nohp' => $this->input->post('nohp', TRUE),
                'email' => $this->input->post('email', TRUE),
            ];

            $where = array(
                'id' => $id
            );

            $this->db->set($update);
            $this->db->where($where);
            $this->db->update('konfigurasi');
            set_pesan('Data berhasil diubah!');
            redirect('admin/konfigurasi');
        }
    }

    public function updatelogo()
    {
        $config['upload_path'] = './assets/images/logo/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('logo')) {
            // jika gagal upload, tampilkan pesan error
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('logo', '<div class="alert alert-danger">Logo gagal diupdate</div>');
            redirect('admin/konfigurasi');
        } else {
            // jika sukses upload, ambil data file yang diupload
            $data = $this->upload->data();
            $file_name = $data['file_name'];
            // simpan nama file ke database
            $this->db->set('logo', $file_name);
            $this->db->update('konfigurasi');
            $this->session->set_flashdata('logo', '<div class="alert alert-success">Logo berhasil diupdate</div>');
            redirect('admin/konfigurasi');
        }
    }
}
