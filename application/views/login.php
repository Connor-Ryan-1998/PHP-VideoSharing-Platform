<div class="container h-100">
    <div class="col-4 offset-4">
        <?php echo form_open(base_url() . 'login/check_login'); ?>
        <h2 class="text-center">Login</h2>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" required="required" name="username">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" required="required" name="password">
        </div>
        <div class="form-group">
            <?php echo $error; ?>
        </div>
        <div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?> " data-callback="enableBtn"></div>
        <div class="form-group">
            <button type="submit" id="loginBtn" class="btn btn-primary btn-block" disabled="disabled">Log in</button>
        </div>
        <!-- <?php echo "<a href='$login_url'><img class='fb' src=" . base_url() . "images/fb.png" . "></a>"; ?> -->
        <div class="clearfix">
            <label class="float-left form-check-label"><input type="checkbox" name="remember"> Remember me</label>
            <a href="<?php echo base_url(); ?>forgotPassword" class="float-right">Forgot Password?</a>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

<script type="text/javascript">
    function enableBtn() {
        document.getElementById("loginBtn").disabled = false;
    }
</script>