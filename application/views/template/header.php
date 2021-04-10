<html>

<head>
    <title>Video Sharing Platform</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/header.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?php echo base_url(); ?>video">Video Sharing Platform</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>profile"> Profile </a>
                    <a href="<?php echo base_url(); ?>video"> Video </a>
                    <a href="<?php echo base_url(); ?>upload"> Upload </a>
                    <?php if (!$this->session->userdata('logged_in')) : ?>
                        <a href="<?php echo base_url(); ?>login"> Login </a>
                        <a href="<?php echo base_url(); ?>registration"> Register </a>
                    <?php elseif ($this->session->userdata('logged_in')) : ?>
                        <a href="<?php echo base_url(); ?>login/logout"> Logout </a>
                    <?php endif; ?>
                </li>
            </ul>
            <ul class="nav justify-content-center">
                <form class="form-inline my-2 my-lg-0 mx-auto">
                    <?php echo form_open('ajax'); ?>
                    <input class="form-control mr-sm-2" type="search" id="search_text" placeholder="Search" name="search" aria-label="Search">
                    <button id="resultButton" class="btn btn-outline-success my-2 my-sm-0" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> </button>
                    <?php echo form_close(); ?>
            </ul>
        </div>
    </nav>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>