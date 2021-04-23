<script src="<?php echo base_url(); ?>assets/js/videoDetail.js"></script>
<div class="row justify-content-center h-100">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <h1 class="text-center">Video</h1>
                <div class=" container" id="videoDetail">
                </div>
                <?php echo form_open_multipart('upload/upload_comment'); ?>
                <div class="row justify-content-center">
                    <div class="col-md-4 col-md-offset-6 centered">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Add your comments here!" name="comments">
                            <br>
                            <input type="submit" value="Add Comment" />
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
                <div class="container" id="videoComments">
                </div>
                <div id="fb-root"></div>
                <div class="fb-share-button" data-layout="button_count" data-href=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>>
                </div>
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div>
</div>
<br>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    function getURL() {
        alert("The URL of this page is: " + window.location.href);
    }
</script>