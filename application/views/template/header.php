<html>

<head>
    <title>INFS3202 Video Sharing Platform</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
</head>

<body>
    <script>
        // Show select image using file input.
        function readURL(input) {
            $('#default_img').show();
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#select')
                        .attr('src', e.target.result)
                        .width(300)
                        .height(200);

                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <nav class="navbar avbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">INFS3202 Video Sharing Platform</a>

        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>MainPage"> Home </a>
            </li>
        </ul>

        <form class="form-inline my-2 my-lg-0 justify-content-center w-100">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <?php if (!$this->session->userdata('logged_in')) : ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>login"> Login </a>
                    </li>
                <?php endif; ?>
                <?php if ($this->session->userdata('logged_in')) : ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>login/logout"> Logout </a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>Profile"> Profile </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">