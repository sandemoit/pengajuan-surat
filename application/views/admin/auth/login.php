<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="sandi maulidika">

    <link rel="icon" href="<?php echo base_url('assets') ?>/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo base_url('assets') ?>/images/favicon.png" type="image/x-icon">
    <title>Cuba - <?= $title ?></title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/vendors/slick.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/vendors/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/vendors/animate.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/style.css">
    <link id="color" rel="stylesheet" href="<?php echo base_url('assets') ?>/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/responsive.css">
</head>

<body>
    <!-- login page start-->
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <div>
                        <div><a class="logo" href="index.html"><img class="img-fluid for-light" src="<?php echo base_url('assets') ?>/images/logo/logo.png" alt="looginpage"><img class="img-fluid for-dark" src="<?php echo base_url('assets') ?>/images/logo/logo_dark.png" alt="looginpage"></a></div>
                        <div class="login-main">
                            <form method="POST" action="<?= site_url('admin/auth') ?>" class="theme-form">
                                <h4>Sign in to account</h4>
                                <p>Enter your email & password to login</p>
                                <?php echo $this->session->flashdata('message') ?>
                                <div class="form-group">
                                    <label class="col-form-label">Email Address</label>
                                    <input class="form-control" type="text" name="email" id="email" placeholder="Test@gmail.com">
                                    <?= form_error('email', '<small class="text-danger" pl-3>', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="form-input position-relative">
                                        <input class="form-control" type="password" name="password" id="password" placeholder="*********">
                                        <div class="show-hide"><span class="show"> </span></div>
                                        <?= form_error('password', '<small class="text-danger" pl-3>', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="checkbox1" type="checkbox">
                                        <label class="text-muted" for="checkbox1">Remember password</label>
                                    </div><a class="link" href="forget-password.html">Forgot password?</a>
                                    <div class="text-end mt-3">
                                        <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- latest jquery-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!-- Bootstrap js-->
        <script src="<?php echo base_url('assets') ?>/js/bootstrap/bootstrap.bundle.min.js"></script>
        <!-- feather icon js-->
        <script src="<?php echo base_url('assets') ?>/js/icons/feather-icon/feather.min.js"></script>
        <script src="<?php echo base_url('assets') ?>/js/icons/feather-icon/feather-icon.js"></script>
        <!-- scrollbar js-->
        <script src="<?php echo base_url('assets') ?>/js/scrollbar/simplebar.js"></script>
        <script src="<?php echo base_url('assets') ?>/js/scrollbar/custom.js"></script>
        <!-- Sidebar jquery-->
        <script src="<?php echo base_url('assets') ?>/js/config.js"></script>
        <!-- Plugins JS start-->
        <script src="<?php echo base_url('assets') ?>/js/sidebar-menu.js"></script>
        <script src="<?php echo base_url('assets') ?>/js/slick/slick.min.js"></script>
        <script src="<?php echo base_url('assets') ?>/js/slick/slick.js"></script>
        <script src="<?php echo base_url('assets') ?>/js/header-slick.js"></script>
        <script src="<?php echo base_url('assets') ?>/js/height-equal.js"></script>
        <script src="<?php echo base_url('assets') ?>/js/alert.js"></script>
        <!-- Plugins JS Ends-->
        <!-- Theme js-->
        <script src="<?php echo base_url('assets') ?>/js/script.js"></script>
        <!-- Plugin used-->
    </div>
</body>

</html>