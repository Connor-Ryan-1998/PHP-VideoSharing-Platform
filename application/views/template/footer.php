</body>
<!-- Chat bot to assist user -->
<div class="chat-popup" id="myForm" style="display: none;">
    <form action="/action_page.php" class="form-container">
        <h1>Chat</h1>

        <label for="msg"><b>Message</b></label>
        <textarea placeholder="Type message.." name="msg" required></textarea>

        <button type="submit" class="btn">Send</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </form>
</div>
<footer>
    <div class="container bg-dark text-white w-100">
        <div class="row vcenter">
            <div class="col-xs-6">
                <p> Connor Ryan S4434200 &copy; : 2021-<?php echo date("Y"); ?></p>
                <button class="open-button" onclick="toggleFormState()">Get Chatbot Help</button>
            </div>
        </div>
    </div>
</footer>

</html>