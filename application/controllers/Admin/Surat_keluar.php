<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_keluar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Surat Keluar';

        $data['keluar'] = $this->db->get('surat_keluar')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/management_surat/keluar', $data);
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
            $data['title'] = 'Tambah Surat Keluar';
            $this->load->view('template/header', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('admin/management_surat/tkeluar', $data);
            $this->load->view('template/footer', $data);
        } else {
            $nama_surat =  $this->input->post("nama_surat", TRUE);
            $tanggal_surat =  $this->input->post("tanggal_surat", TRUE);
            $keterangan_surat =  $this->input->post("keterangan_surat", TRUE);

            $config['upload_path']          = './assets/uploads/surat_keluar';
            $config['allowed_types']        = 'pdf|doc|docx|jpg|jpeg|png';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_surat')) {

                $data = array('upload_data' => $this->upload->data());
                $file_surat = $data['upload_data']['file_name'];

                $save = [
                    'nama_surat_keluar' => $nama_surat,
                    'tanggal_surat_keluar' => date('Y-m-d', strtotime($tanggal_surat)),
                    'keterangan_surat_keluar' => $keterangan_surat,
                    'file_surat_keluar' => $file_surat
                ];

                $this->db->insert('surat_keluar', $save);
                set_pesan('Surat keluar Berhasil Ditambahkan!');
                redirect('admin/surat_keluar');
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
            $data['title'] = 'Edit Surat Keluar';
            $data['sm'] = $this->db->get_where('surat_keluar', ['id_surat_keluar' => $id])->row_array();

            $this->load->view('template/header', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('admin/management_surat/ekeluar', $data);
            $this->load->view('template/footer', $data);
        } else {
            $nama_surat =  $this->input->post("nama_surat", TRUE);
            $tanggal_surat =  $this->input->post("tanggal_surat", TRUE);
            $keterangan_surat =  $this->input->post("keterangan_surat", TRUE);

            $config['upload_path']          = './assets/uploads/surat_keluar';
            $config['allowed_types']        = 'pdf|doc|docx';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_surat')) {
                $data = $this->db->get_where('surat_keluar', ['id_surat_keluar' => $id])->row_array();
                unlink("./assets/uploads/surat_keluar/" . $data['file_surat_keluar']);

                $data = array('upload_data' => $this->upload->data());
                $file_surat = $data['upload_data']['file_name'];

                $update = [
                    'nama_surat_keluar' => $nama_surat,
                    'tanggal_surat_keluar' => date('Y-m-d', strtotime($tanggal_surat)),
                    'keterangan_surat_keluar' => $keterangan_surat,
                    'file_surat_keluar' => $file_surat
                ];

                $this->db->where('id_surat_keluar', $id);
                $this->db->update('surat_keluar', $update);
                set_pesan('Surat Keluar Berhasil di Edit');
                redirect('admin/surat_keluar');
            } else {

                $update = [
                    'nama_surat_keluar' => $nama_surat,
                    'tanggal_surat_keluar' => date('Y-m-d', strtotime($tanggal_surat)),
                    'keterangan_surat_keluar' => $keterangan_surat,
                ];

                $this->db->where('id_surat_keluar', $id);
                $this->db->update('surat_keluar', $update);
                set_pesan('Surat Keluar Berhasil di Edit');
                redirect('admin/surat_keluar');
            }
        }
    }

    public function delete($id)
    {
        $data = $this->db->get_where('surat_keluar', ['id_surat_keluar' => $id])->row_array();
        unlink("./assets/uploads/surat_keluar/" . $data['file_surat_keluar']);
        $this->db->where(['id_surat_keluar' => $id]);
        $this->db->delete('surat_keluar');
        set_pesan('Surat Keluar Berhasil di Delete');
        redirect('admin/surat_keluar');
    }
}
