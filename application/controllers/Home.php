<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('galery_model', 'galery');
    }

    public function index()
    {
        $data['profil'] = $this->galery->profil();
        $title = [
            'title' => 'Home - Permohonan Surat Pengantar',
            'sub_title' => ''
        ];

        $this->load->view('frontend/header', $title);
        $this->load->view('frontend/home', $data);
        $this->load->view('frontend/footer', $data);
    }
}
