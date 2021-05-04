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
                <?php echo form_open(base_url() . 'profile/updatePersonnelData'); ?>
                <h2 class="text-center">Personnel Data</h2>
                <div class="form-group">
                    <input type="text" readonly class="form-control" placeholder="Username" value=<?php echo $username; ?> name="username">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="EmailAddress" value=<?php echo $emailAddress; ?> name="emailAddress">
                </div>
                <div class="form-group">
                    <?php if ($isVerified) : ?>
                        <div class="form-group">
                            <input type="text" class="form-control" readonly placeholder="Verification Code" value=<?php echo $userUID; ?> name="verificationCode">
                            <input class="form-check-input" type="checkbox" value="" id="isVerified" checked disabled>
                            <label class="form-check-label" for="isVerified">
                                Verified
                            </label>
                        </div>
                    <?php else : ?>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Verification Code" name="verificationCode">
                            <input class="form-check-input" type="checkbox" value="" id="isVerified" disabled>
                            <label class="form-check-label" for="isVerified">
                                Verified
                            </label>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Update Data</button>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="col-sm">
                <h2 class="text-center">Additional Data</h2>
                <a href="<?php echo base_url(); ?>managementDashboard" class="btn btn-dark btn-info" role="button">Management Dashboard</a>
            </div>
        </div>
    </div>
    <button class="open-button" onclick="openForm()">Chat</button>
    <!-- Chat bot to assist user -->
    <div class="chat-popup" id="myForm">
        <form action="/action_page.php" class="form-container">
            <h1>Chat</h1>

            <label for="msg"><b>Message</b></label>
            <textarea placeholder="Type message.." name="msg" required></textarea>

            <button type="submit" class="btn">Send</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>
</div>
<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>

<div class="main"> </div>