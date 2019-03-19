<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.1.11
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>EHub - Dashboard</title>
    <!-- Icons-->
    <link href="<?php echo base_url(); ?>assets/css/coreui-icons.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/flag-icon.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="<?php echo base_url(); ?>assets/css/admin_css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/datatables.min.css" rel="stylesheet">

</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="<?php echo base_url() ?>user/account">
        <h5 class="navbar-brand-full">Welcome, <?php echo $this->session->userdata('group') == 1 ? 'Lecturer': 'Student';?></h5>
        <h3 class="navbar-brand-minimized">Welcome, <?php echo ucfirst($this->session->userdata('username')) ?></h3>
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav navbar-nav d-md-down-none">
        <li class="nav-item px-3">
            <a class="nav-link" href="#">Dashboard</a>
        </li>
        <li class="nav-item px-3">
            <a class="nav-link" href="#">Users</a>
        </li>
        <li class="nav-item px-3">
            <a class="nav-link" href="#">Settings</a>
        </li>
    </ul>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item d-md-down-none">
            <a class="nav-link" href="#">
                <i class="icon-bell"></i>
                <span class="badge badge-pill badge-danger">5</span>
            </a>
        </li>
        <li class="nav-item d-md-down-none">
            <a class="nav-link" href="#">
                <i class="icon-list"></i>
            </a>
        </li>
        <li class="nav-item d-md-down-none">
            <a class="nav-link" href="#">
                <i class="icon-location-pin"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img class="img-avatar" src="<?php echo base_url(); ?>assets/img/avatars/6.jpg" alt="admin@bootstrapmaster.com">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                    <strong>Account</strong>
                </div>
                <a class="dropdown-item" href="<?php echo base_url(); ?>user/logout">
                    <i class="fa fa-lock"></i> Logout</a>
            </div>
        </li>
    </ul>
    <button class="navbar-toggler aside-menu-toggler d-md-down-none" type="button" data-toggle="aside-menu-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <button class="navbar-toggler aside-menu-toggler d-lg-none" type="button" data-toggle="aside-menu-show">
        <span class="navbar-toggler-icon"></span>
    </button>
</header>
<div class="app-body">
    <div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() ?>user/account">
                        <i class="nav-icon icon-speedometer"></i> Dashboard
                        <span class="badge badge-primary">NEW</span>
                    </a>
                </li>
                <li class="nav-title">MANAGEMENT</li>
                <?php

                if($this->session->userdata('group') == 1) {


                ?>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() ?>admin/test_scores">
                        <i class="nav-icon icon-drop"></i> Test Scores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() ?>admin/exam_scores">
                        <i class="nav-icon icon-pencil"></i> Exam Scores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() ?>admin/supervisors">
                        <i class="nav-icon icon-pencil"></i> Supervisors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() ?>admin/counsellors">
                        <i class="nav-icon icon-pencil"></i> Counselling</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>user/logout">
                        <i class="nav-icon icon-pencil"></i> Logout</a>
                </li>

                <?php

                } else {

                ?>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="nav-icon icon-drop"></i> Download Semester PDFs, Brochures and Time Table</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url() ?>admin/supervisors">
                            <i class="nav-icon icon-pencil"></i> Supervisors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url() ?>admin/counsellors">
                            <i class="nav-icon icon-pencil"></i> Counselling</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="nav-icon icon-pencil"></i> View Scores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>user/logout">
                            <i class="nav-icon icon-pencil"></i> Logout</a>
                    </li>

                <?php

                }

                ?>


            </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>