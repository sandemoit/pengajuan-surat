<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis extends CI_Controller
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
        $data['title'] = 'Jenis Surat';
        $data['jenis'] = $this->Admin_model->get('jenis');

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/jenis_kategori/jenis', $data);
        $this->load->view('template/footer', $data);
    }

    public function save()
    {
        $id = $this->input->post('save');

        $this->form_validation->set_rules('nama_jenis', 'Jenis', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            redirect('admin/jenis');
        } else {
            if (empty($id)) {

                $data = [
                    'nama_jenis' => $this->input->post('nama_jenis', TRUE)
                ];

                $this->db->insert('jenis', $data);
                set_pesan('Jenis Surat berhasil di input');
                redirect('admin/jenis');
            } else {
                $data = [
                    'nama_jenis' => $this->input->post('nama_jenis', TRUE)
                ];

                $this->db->where('id', $id);
                $this->db->update('jenis', $data);
                set_pesan('Jenis Surat berhasil di perbarui');
                redirect('admin/jenis');
            }
        }
    }

    public function delete($id)
    {
        $id = encode_php_tags($id);
        $this->Admin_model->delete('jenis', 'id', $id);
        set_pesan('Data berhasil dihapus!');
        redirect('admin/jenis');
    }
}
