<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
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
        $data['title'] = 'Mahasiswa';

        $data['mahasiswa'] = $this->Admin_model->get('mahasiswa');

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/mahasiswa/mahasiswa', $data);
        $this->load->view('template/footer', $data);
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Tambah Mahasiswa';

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/mahasiswa/tambah', $data);
        $this->load->view('template/footer', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['mahasiswa'] = $this->db->get_where('mahasiswa', ['id' => $id])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('tmp_lhr', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lhr', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('rt', 'RT', 'required|trim');
        $this->form_validation->set_rules('rw', 'RW', 'required|trim');
        $this->form_validation->set_rules('nowa', 'No WA', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('template/header', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('admin/mahasiswa/edit', $data);
            $this->load->view('template/footer', $data);
        } else {

            $update = [
                'nama' => $this->input->post('nama', TRUE),
                'tmpt_lhr' => $this->input->post('tmpt_lhr', TRUE),
                'tgl_lhr' => date('Y-m-d', strtotime($this->input->post("tgl_lhr", TRUE))),
                'alamat' => $this->input->post('alamat', TRUE),
                'rt' => $this->input->post('rt', TRUE),
                'rw' => $this->input->post('rw', TRUE),
                'nowa' => $this->input->post('nowa', TRUE)
            ];

            $this->Admin_model->update('mahasiswa', 'id', $id, $update);
            set_pesan('Data berhasil diubah!');
            redirect('admin/mahasiswa');
        }
    }

    public function delete($id)
    {
        $id = encode_php_tags($id);
        $this->Admin_model->delete('mahasiswa', 'id', $id);
        set_pesan('Data berhasil dihapus!');
        redirect('admin/mahasiswa');
    }
}
