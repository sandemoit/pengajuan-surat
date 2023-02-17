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
        $judul = [
            'title' => 'Home - Kelurahan Pulau',
            'sub_title' => ''
        ];

        $this->load->view('frontend/header', $judul);
        $this->load->view('frontend/home', $data);
        $this->load->view('frontend/footer', $data);
    }
}
