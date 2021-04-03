<div class="container">
    <div class="col-4 offset-4">
        <?php echo form_open(base_url() . 'registration/check_registration'); ?>
        <h2 class="text-center">Registration</h2>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" required="required" name="username">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" required="required" name="password">
        </div>
        <div class="form-group">
            <input type="emailAddress" class="form-control" placeholder="emailAddress" required="required" name="emailAddress">
        </div>
        <div class="form-group">
            <?php echo $error; ?>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Register Account</button>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
