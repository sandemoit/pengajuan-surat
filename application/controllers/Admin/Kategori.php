<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
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
        $data['title'] = 'Kategori Surat';

        $data['kategori'] = $this->Admin_model->get('kategori');

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/jenis_kategori/kategori', $data);
        $this->load->view('template/footer', $data);
    }

    public function save()
    {
        $id = $this->input->post('save');

        $this->form_validation->set_rules('nama_kategori', 'Kategori', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            redirect('admin/kategori');
        } else {
            if (empty($id)) {

                $data = [
                    'nama_kategori' => $this->input->post('nama_kategori', TRUE)
                ];

                $this->db->insert('kategori', $data);
                set_pesan('Kategori Surat berhasil di input');
                redirect('admin/kategori');
            } else {
                $data = [
                    'nama_kategori' => $this->input->post('nama_kategori', TRUE)
                ];

                $this->db->where('id', $id);
                $this->db->update('kategori', $data);
                set_pesan('Kategori Surat berhasil di perbarui');
                redirect('admin/kategori');
            }
        }
    }

    public function delete($id)
    {
        $id = encode_php_tags($id);
        $this->Admin_model->delete('kategori', 'id', $id);
        set_pesan('Data berhasil dihapus!');
        redirect('admin/kategori');
    }
}
