<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_masuk extends CI_Controller
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
        $data['title'] = 'Surat Masuk';

        $data['masuk'] = $this->db->get('surat_masuk')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/management_surat/masuk', $data);
        $this->load->view('template/footer', $data);
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_surat', 'Nama Surat', 'required');
        $this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'required');
        $this->form_validation->set_rules('keterangan_surat', 'Keterangan Surat', 'required');
        // $this->form_validation->set_rules('file_surat', 'File Surat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tambah Surat Masuk';
            $this->load->view('template/header', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('admin/management_surat/tmasuk', $data);
            $this->load->view('template/footer', $data);
        } else {
            $nama_surat =  $this->input->post("nama_surat", TRUE);
            $tanggal_surat =  $this->input->post("tanggal_surat", TRUE);
            $keterangan_surat =  $this->input->post("keterangan_surat", TRUE);

            $config['upload_path']          = './assets/uploads/surat_masuk';
            $config['allowed_types']        = 'pdf|doc|docx';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_surat')) {

                $data = array('upload_data' => $this->upload->data());
                $file_surat = $data['upload_data']['file_name'];

                $save = [
                    'nama_surat_masuk' => $nama_surat,
                    'tanggal_surat_masuk' => date('Y-m-d', strtotime($tanggal_surat)),
                    'keterangan_surat_masuk' => $keterangan_surat,
                    'file_surat_masuk' => $file_surat
                ];

                $this->db->insert('surat_masuk', $save);
                set_pesan('Surat Masuk Berhasil Ditambahkan!');
                redirect('admin/surat_masuk');
            }
        }
    }

    public function edit($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_surat', 'Nama Surat', 'required');
        $this->form_validation->set_rules('tanggal_surat', 'Keterangan', 'required');
        $this->form_validation->set_rules('keterangan_surat', 'Keterangan', 'required');
        // $this->form_validation->set_rules('file_surat', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Surat Masuk';
            $data['sm'] = $this->db->get_where('surat_masuk', ['id_surat_masuk' => $id])->row_array();

            $this->load->view('template/header', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('admin/management_surat/emasuk', $data);
            $this->load->view('template/footer', $data);
        } else {
            $nama_surat =  $this->input->post("nama_surat", TRUE);
            $tanggal_surat =  $this->input->post("tanggal_surat", TRUE);
            $keterangan_surat =  $this->input->post("keterangan_surat", TRUE);
            // $file_surat =  $this->input->post("file_surat", TRUE);

            $config['upload_path']          = './assets/uploads/surat_masuk';
            $config['allowed_types']        = 'pdf|doc|docx';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_surat')) {
                $data = $this->db->get_where('surat_masuk', ['id_surat_masuk' => $id])->row_array();
                unlink("./assets/uploads/surat_masuk/" . $data['file_surat_masuk']);

                $data = array('upload_data' => $this->upload->data());
                $file_surat = $data['upload_data']['file_name'];

                $update = [
                    'nama_surat_masuk' => $nama_surat,
                    'tanggal_surat_masuk' => date('Y-m-d', strtotime($tanggal_surat)),
                    'keterangan_surat_masuk' => $keterangan_surat,
                    'file_surat_masuk' => $file_surat
                ];

                $this->db->where('id_surat_masuk', $id);
                $this->db->update('surat_masuk', $update);
                set_pesan('Surat Masuk Berhasil di Edit');
                redirect('admin/surat_masuk');
            } else {

                $update = [
                    'nama_surat_masuk' => $nama_surat,
                    'tanggal_surat_masuk' => date('Y-m-d', strtotime($tanggal_surat)),
                    'keterangan_surat_masuk' => $keterangan_surat,
                ];

                $this->db->where('id_surat_masuk', $id);
                $this->db->update('surat_masuk', $update);
                set_pesan('Surat Masuk Berhasil di Edit');
                redirect('admin/surat_masuk');
            }
        }
    }

    public function delete($id)
    {
        $data = $this->db->get_where('surat_masuk', ['id_surat_masuk' => $id])->row_array();
        unlink("./assets/uploads/surat_masuk/" . $data['file_surat_masuk']);
        $this->db->where(['id_surat_masuk' => $id]);
        $this->db->delete('surat_masuk');
        set_pesan('Surat Masuk Berhasil di Delete');
        redirect('admin/surat_masuk');
    }
}
