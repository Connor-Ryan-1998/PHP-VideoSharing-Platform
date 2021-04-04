<div class="row justify-content-center">
    <?php echo form_open_multipart('upload/do_upload'); ?>
    <div class="col-md-4 col-md-offset-6 centered">
        <?php echo $error; ?>
        <div class="form-group">
            <input type="file" name="userfile" size="20" />
        </div>
        <div class="form-group">
            <input type="submit" value="upload" />
        </div>
    </div>
    <?php echo form_close(); ?>
    <form class="form-inline my-2 my-lg-0">
        <?php echo form_open('ajax'); ?>
        <input class="form-control mr-sm-2" type="search" id="search_text" placeholder="Search" name="search" aria-label="Search">
        <button id="resultButton" class="btn btn-outline-success my-2 my-sm-0" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> </button>
        <?php echo form_close(); ?>
</div>
<h3></h3>
<div class="main"> </div>