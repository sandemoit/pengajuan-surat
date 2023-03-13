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
}
