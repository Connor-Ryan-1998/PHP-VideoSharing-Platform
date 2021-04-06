<div class="row justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-sm">
                One of three columns
            </div>
            <div class="col-sm">
                <form class="form-inline my-2 my-lg-0">
                    <?php echo form_open('ajax'); ?>
                    <input class="form-control mr-sm-2" type="search" id="search_text" placeholder="Search" name="search" aria-label="Search">
                    <button id="resultButton" class="btn btn-outline-success my-2 my-sm-0" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> </button>
                    <?php echo form_close(); ?>
            </div>
            <div class="col-sm">
                <?php echo form_open(base_url() . 'profile/updatePersonnelData'); ?>
                <h2 class="text-center">Personnel Data</h2>
                <div class="form-group">
                    <input type="text" readonly class="form-control" placeholder="Username" value=<?php echo $username; ?> name="username">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="EmailAddress" value=<?php echo $emailAddress; ?> name="emailAddress">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" value=<?php echo $password; ?> required="required" name="password">
                </div>
                <div class="form-group">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Update Data</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<h3></h3>
<div class="main"> </div>