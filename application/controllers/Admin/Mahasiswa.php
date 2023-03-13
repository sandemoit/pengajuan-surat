<?php
defined('BASEPATH') or exit('No direct script access allowed');
define('DRUPAL_ROOT', getcwd());
require_once DRUPAL_ROOT . '/vendor/autoload.php';

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

        $this->form_validation->set_rules('nim', 'Nim', 'required|trim|is_unique[mahasiswa.nim]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('tmpt_lhr', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lhr', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('rt', 'RT', 'required|trim');
        $this->form_validation->set_rules('rw', 'RW', 'required|trim');
        $this->form_validation->set_rules('nowa', 'No WA', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('admin/mahasiswa/tambah', $data);
            $this->load->view('template/footer', $data);
        } else {
            $insert = [
                'nim' => $this->input->post('nim', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'tmpt_lhr' => $this->input->post('tmpt_lhr', TRUE),
                'tgl_lhr' => date('Y-m-d', strtotime($this->input->post("tgl_lhr", TRUE))),
                'alamat' => $this->input->post('alamat', TRUE),
                'rt' => $this->input->post('rt', TRUE),
                'rw' => $this->input->post('rw', TRUE),
                'nowa' => $this->input->post('nowa', TRUE)
            ];

            $this->Admin_model->insert('mahasiswa', $insert);
            set_pesan('Data berhasil diubah!');
            redirect('admin/mahasiswa');
        }
    }

    public function import_excel()
    {
        $data['title'] = 'Edit Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $upload_status =  $this->uploadDoc();
            if ($upload_status != false) {
                $inputFileName = 'assets/uploads/mahasiswa/' . $upload_status;
                $inputTileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputTileType);
                $spreadsheet = $reader->load($inputFileName);
                $sheet = $spreadsheet->getSheet(0);
                $count_Rows = 0;
                foreach ($sheet->getRowIterator() as $row) {
                    $nim = $spreadsheet->getActiveSheet()->getCell('A' . $row->getRowIndex());
                    $nama = $spreadsheet->getActiveSheet()->getCell('B' . $row->getRowIndex());
                    $tmpt_lhr = $spreadsheet->getActiveSheet()->getCell('C' . $row->getRowIndex());
                    $tgl_lhr = $spreadsheet->getActiveSheet()->getCell('D' . $row->getRowIndex());
                    $alamat = $spreadsheet->getActiveSheet()->getCell('E' . $row->getRowIndex());
                    $rt = $spreadsheet->getActiveSheet()->getCell('F' . $row->getRowIndex());
                    $rw = $spreadsheet->getActiveSheet()->getCell('G' . $row->getRowIndex());
                    $nowa = $spreadsheet->getActiveSheet()->getCell('H' . $row->getRowIndex());
                    $data = array(
                        'nim' => $nim,
                        'nama' => $nama,
                        'tmpt_lhr' => $tmpt_lhr,
                        'tgl_lhr' => $tgl_lhr,
                        'alamat' => $alamat,
                        'rt' => $rt,
                        'rw' => $rw,
                        'nowa' => $nowa,
                    );

                    $this->db->insert('siswa', $data);
                    $count_Rows++;
                }
                set_pesan('Successfulyy Data Imported!');
                redirect('admin/mahasiswa/import_excel');
            } else {
                set_pesan('File is not uploaded!', FALSE);
                redirect('admin/mahasiswa/import_excel');
            }
        } else {
            $this->load->view('template/header', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('admin/mahasiswa/import', $data);
            $this->load->view('template/footer', $data);
        }
    }

    public function uploadDoc()
    {
        $uploadPath = 'assets/uploads/mahasiswa/';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, TRUE); // FOR CREATING DIRECTORY IF ITS NOT EXIST
        }
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size'] = 10000;
        $config['file_name'] = $_FILES['mahasiswa']['name'];

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('mahasiswa')) {
            $this->upload->display_errors();
            return false;
        } else {
            $data = $this->upload->data();
            return $data['file_name'];
        }
    }

    public function edit($nim)
    {
        $data['title'] = 'Edit Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['mahasiswa'] = $this->db->get_where('mahasiswa', ['nim' => $nim])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('tmpt_lhr', 'Tempat Lahir', 'required|trim');
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

            $this->Admin_model->update('mahasiswa', 'nim', $nim, $update);
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

    public function deleteall()
    {
        $hapus = $this->db->empty_table('mahasiswa');
        if ($hapus) {
            set_pesan('Data Telah Terhapus Semua!');
        } else {
            set_pesan('Data Gagal Terhapus!', false);
        }
        redirect('admin/mahasiswa');
    }
}
