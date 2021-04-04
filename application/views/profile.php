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
                Personnel Data
                <?php echo $username; ?>
            </div>
        </div>
    </div>
</div>
<h3></h3>
<div class="main"> </div>