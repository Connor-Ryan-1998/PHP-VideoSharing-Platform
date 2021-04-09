<html>

<head>
    <title>Video Sharing Platform</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
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
            <ul class="nav justify-content-center">
            </ul>
            <form class="form-inline my-2 my-lg-0 mx-auto">
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
        <script>
            $(document).ready(function() {
                load_data();

                // // Initialize 
                // $("#search_text").autocomplete({
                //     source: function(request, response) {
                //         // Fetch data
                //         $.ajax({
                //             url: "<?php echo base_url(); ?>ajax/fileList",
                //             type: 'post',
                //             dataType: "json",
                //             data: {
                //                 search: request.term
                //             },
                //             success: function(data) {
                //                 response(data);
                //             }
                //         });
                //     },
                //     select: function(event, ui) {
                //         // Set selection
                //         $('#search_text').val(ui.item.label); // display the selected text
                //         return false;
                //     }
                // });

                function load_data(query) {
                    $.ajax({
                        url: "<?php echo base_url(); ?>ajax/fetch",
                        method: "GET",
                        data: {
                            query: query
                        },
                        success: function(response) {
                            $('#result').html("");
                            if (response == "") {
                                $('#result').html(response);
                            } else {
                                var obj = JSON.parse(response);
                                if (obj.length > 0) {
                                    var items = [];
                                    $.each(obj, function(i, val) {
                                        items.push($("<h4>").text(val.filename));
                                        if (val.filename.includes("jpg")) {
                                            items.push($('<img width="320" height="240" src="' + '<?php echo base_url(); ?>/uploads/' + val.filename + '" />'));
                                        } else {
                                            items.push($('<video width="320" height="240" controls><source  src="' + '<?php echo base_url(); ?>/uploads/' + val.filename + '" type="video/mp4"></video>'));
                                        }
                                    });
                                    $('#result').append.apply($('#result'), items);
                                } else {
                                    $('#result').html("Not Found!");
                                };
                            };
                        }
                    });
                }
                $('#search_text').keyup(function() {
                    var search = $(this).val();
                    if (search != '') {
                        load_data(search);
                    } else {
                        load_data();
                    }
                });
            });
        </script>