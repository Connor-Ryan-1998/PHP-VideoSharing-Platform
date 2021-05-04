<script src="<?php echo base_url(); ?>assets/js/video.js"></script>
<div class="row justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h2>Recommended Videos</h2>
                <div class="container" id="recommendedVideoList">
                    <!-- Content here -->
                </div>
            </div>
            <div class="col-sm bg-light">
                <h2>Recently Uploaded Videos</h2>
                <div class="container" id="videoList">
                    <!-- Content here -->
                </div>
            </div>
            <div class="col-sm">
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
        </div>
    </div>
</div>
<br>