<div class="container h-100">
    <div class="col-4 offset-4">
        <?php echo form_open(base_url() . 'resetpassword/resetPassword'); ?>
        <h2 class="text-center">Reset Password</h2>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="email Address" required="required" name="emailAddress">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Reset Token" required="required" name="resetToken">
        </div>
        <div class="form-group">
            <?php echo $error; ?>
        </div>
        <div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?> " data-callback="enableBtn"></div>
        <div class="form-group">
            <button type="submit" id="submitbtn" class="btn btn-primary btn-block" disabled="disabled">Submit</button>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

<script type="text/javascript">
    function enableBtn() {
        document.getElementById("submitbtn").disabled = false;
    }
</script>+