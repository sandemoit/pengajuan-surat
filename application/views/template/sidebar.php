<!-- Page Body Start-->
<div class="page-body-wrapper">
    <!-- Page Sidebar Start-->
    <div class="sidebar-wrapper" sidebar-layout="stroke-svg">
        <div>
            <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light" src="<?php echo base_url('assets') ?>/images/logo/logo.png" alt=""><img class="img-fluid for-dark" src="<?php echo base_url('assets') ?>/images/logo/logo_dark.png" alt=""></a>
                <div class="back-btn"><i class="fa fa-angle-left"></i></div>
                <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
            </div>
            <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="<?php echo base_url('assets') ?>/images/logo/logo-icon.png" alt=""></a></div>
            <nav class="sidebar-main">
                <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                <div id="sidebar-menu">
                    <ul class="sidebar-links" id="simple-bar">
                        <li class="back-btn"><a href="index.html"><img class="img-fluid" src="<?php echo base_url('assets') ?>/images/logo/logo-icon.png" alt=""></a>
                            <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                        </li>
                        <li class="sidebar-main-title">
                            <div>
                                <h6 class="lan-1">General</h6>
                            </div>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?= site_url('admin/dashboard') ?>">
                                <svg class="stroke-icon">
                                    <use href="<?php echo base_url('assets') ?>/svg/icon-sprite.svg#stroke-home"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="<?php echo base_url('assets') ?>/svg/icon-sprite.svg#fill-home"></use>
                                </svg><span>Dashboard</span></a></li>
                        <li class="sidebar-list">

                        <li class="sidebar-main-title">
                            <div>
                                <h6 class="lan-8">Applications</h6>
                            </div>
                        </li>
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title" href="javascript:;">
                                <svg class="stroke-icon">
                                    <use href="<?php echo base_url('assets') ?>/svg/icon-sprite.svg#stroke-email"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="<?php echo base_url('assets') ?>/svg/icon-sprite.svg#fill-email"></use>
                                </svg><span>Management Surat </span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="<?= site_url('admin/pengajuan') ?>">Pengajuan Surat</a></li>
                                <li><a href="<?= site_url('admin/surat_masuk') ?>">Surat Masuk</a></li>
                                <li><a href="<?= site_url('admin/surat_keluar') ?>">Surat Keluar</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?= site_url('admin/mahasiswa') ?>">
                                <svg class="stroke-icon">
                                    <use href="<?php echo base_url('assets') ?>/svg/icon-sprite.svg#stroke-user"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="<?php echo base_url('assets') ?>/svg/icon-sprite.svg#fill-user"></use>
                                </svg><span>Mahasiswa</span></a>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?= site_url('manapegawai') ?>">
                                <svg class="stroke-icon">
                                    <use href="<?php echo base_url('assets') ?>/svg/icon-sprite.svg#stroke-file"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="<?php echo base_url('assets') ?>/svg/icon-sprite.svg#fill-file"></use>
                                </svg><span>Management Pegawai</span></a>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?= site_url('manauser') ?>">
                                <svg class="stroke-icon">
                                    <use href="<?php echo base_url('assets') ?>/svg/icon-sprite.svg#stroke-user"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="<?php echo base_url('assets') ?>/svg/icon-sprite.svg#fill-user"></use>
                                </svg><span>Management User</span></a>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?= site_url('manauser') ?>">
                                <svg class="stroke-icon">
                                    <use href="<?php echo base_url('assets') ?>/svg/icon-sprite.svg#stroke-internationalization"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="<?php echo base_url('assets') ?>/svg/icon-sprite.svg#stroke-internationalization"></use>
                                </svg><span>Konfigurasi Aplikasi</span></a>
                        </li>
                    </ul>
                </div>
                <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </nav>
        </div>
    </div>
    <!-- Page Sidebar Ends-->
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3><?= $title; ?></h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard') ?>">
                                    <svg class="stroke-icon">
                                        <use href="<?php echo base_url('assets') ?>/svg/icon-sprite.svg#stroke-home"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active"><?= $title; ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->