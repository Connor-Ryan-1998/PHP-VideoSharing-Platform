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
                <div id="fb-root"></div>
                <div class="fb-share-button" data-href=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?> data-layout="button_count">
                </div>
            </div>
            <div class="col-sm">
                Main area for data2
            </div>
        </div>
    </div>
</div>
<h3></h3>
<div class="main"> </div>
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