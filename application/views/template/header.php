<html>

<head>
    <title>Video Sharing Platform</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/header.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?php echo base_url(); ?>mainpage">Video Sharing Platform</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>profile"> Profile </a>
                    <a href="<?php echo base_url(); ?>upload"> Upload </a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <?php echo form_open('ajax'); ?>
                <input class="form-control mr-sm-2" type="search" id="search_text" placeholder="Search" name="search" aria-label="Search">
                <button id="resultButton" class="btn btn-outline-success my-2 my-sm-0" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> </button>
                <?php echo form_close(); ?>
                <ul class="navbar-nav my-lg-0">
                    <?php if (!$this->session->userdata('logged_in')) : ?>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>login"> Login </a>
                            <a href="<?php echo base_url(); ?>registration"> Register </a>
                        </li>
                    <?php endif; ?>
                    <?php if ($this->session->userdata('logged_in')) : ?>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>login/logout"> Logout </a>
                        </li>
                    <?php endif; ?>
                </ul>
        </div>
    </nav>
    <div class="container">
        <div class="collapse" id="collapseExample">
            <div class="card card-body" id="result">
            </div>
        </div>
        <style>
            #resultButton.btn.collapsed:before {
                content: 'Show Result';
            }

            #resultButton.btn:before {
                content: 'Hide Result';
            }
        </style>