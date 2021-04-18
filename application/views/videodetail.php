<script src="<?php echo base_url(); ?>assets/js/videoDetail.js"></script>
<div class="row justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-sm">
                One of three columns
            </div>
            <div class="col-sm">
                Video
                <div class="container" id="videoDetail">

                </div>
                Comments
                <?php echo form_open_multipart('upload/do_upload'); ?>
                <div class="row justify-content-center">
                    <div class="col-md-4 col-md-offset-6 centered">
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Add your comments here!" name="comments">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="upload" />
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="col-sm">
                Main area for data2
            </div>
        </div>
    </div>
</div>
<h3></h3>
<div class="main"> </div>