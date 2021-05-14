</body>
<!-- Chat bot to assist user -->
<!-- <div class="chat-popup float-right" id="chatBotForm">
    <form class="form-container" id="chatBotForm">
        <h1>ChatBot</h1>
        <div id="chatBotChat"></div>
        <div><input id="chatBotInput" type="text" placeholder="Ask me anything!" autocomplete="off" /></div>
        <button class="SubmitQuestion" id="submitBotQuestion">Submit</button>
    </form>
</div> -->
<footer>
    <div class="chat-popup float-right" id="chatBotForm">
        <form class="form-container" id="chatBotForm">
            <h1>ChatBot</h1>
            <div id="chatBotChat"></div>
            <div><input id="chatBotInput" type="text" placeholder="Ask me anything!" autocomplete="off" /></div>
            <button class="SubmitQuestion" id="submitBotQuestion">Submit</button>
        </form>
    </div>
    <div class="container bg-dark text-white w-100">
        <div class="row vcenter">
            <div class="col-xs-6">
                <p> Connor Ryan S4434200 &copy; : 2021-<?php echo date("Y"); ?></p>
                <button class="open-button " onclick="toggleFormState()">Chatbot</button>
            </div>
        </div>
    </div>
</footer>
<script src="<?php echo base_url(); ?>assets/js/footer.js"></script>
<script>
    function toggleFormState() {
        var chatBotForm = document.getElementById("chatBotForm");
        if (chatBotForm.style.display === "block") {
            chatBotForm.style.display = "none";
        } else {
            chatBotForm.style.display = "block"
        }
    }
</script>

</html>