<?php
function is_logged_in()
{
    $ci = get_instance();
    $ci->session->userdata('email') || redirect('admin/auth');
}

function userdata($field)
{
    $ci = get_instance();
    $ci->load->model('Admin_model', 'admin');

    $userId = $ci->session->userdata('login_session')['user'];
    return $ci->admin->get('user', ['id' => $userId])[$field];
}

function set_pesan($message, $tipe = true) //ini untuk menampilkan message
{
    $ci = get_instance();
    if ($tipe) {
        $ci->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Selamat!</strong> ' . $message . '</button>
    </div>');
    } else {
        $ci->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Maaf!</strong> ' . $message . '</button>
    </div>');
    }
}
