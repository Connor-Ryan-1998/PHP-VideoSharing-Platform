<div class="row justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-sm">
                Upload Video
                <?php echo form_open_multipart('upload/do_upload'); ?>
                <div class="row justify-content-center">
                    <div class="col-md-4 col-md-offset-6 centered">
                        <div class="form-group">
                            <input type="file" name="userfile" size="20" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Description" name="description">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="upload" />
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="col-sm">
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