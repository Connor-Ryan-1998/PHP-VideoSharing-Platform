</body>
<!-- Chat bot to assist user -->
<div class="chat-popup float-right" id="chatBotForm" style="display: none;">
    <form class="form-container">
        <h1>ChatBot</h1>

        <label for="msg"><b>Message</b></label>
        <textarea></textarea>
        <div><input id="input" type="text" placeholder="Say something..." autocomplete="off" /></div>
        <div id="chatBotChat"></div>


        <button type="submit" class="btn">Send</button>
    </form>
</div>
<footer>
    <div class="container bg-dark text-white w-100">
        <div class="row vcenter">
            <div class="col-xs-6">
                <p> Connor Ryan S4434200 &copy; : 2021-<?php echo date("Y"); ?></p>
                <button class="open-button " onclick="toggleFormState()">Chatbot</button>
            </div>
        </div>
    </div>
</footer>
<script>
    function toggleFormState() {
        var chatBotForm = document.getElementById("chatBotForm");
        if (chatBotForm.style.display === "block") {
            chatBotForm.style.display = "none";
        } else {
            chatBotForm.style.display = "block"
        }
    }
    document.addEventListener("DOMContentLoaded", () => {
        const inputField = document.getElementById("input")
        inputField.addEventListener("keydown", function(e) {
            if (e.code === "Enter") {
                let input = document.getElementById("input").value;
                document.getElementById("user").innerHTML = input;
                output(input);
            }
        });
    });
    const trigger = [
        //0 
        ["hi", "hey", "hello"],
        //1
        ["how are you", "how are things"],
        //2
        ["what is going on", "what is up"],
        //3
        ["happy", "good", "well", "fantastic", "cool"],
        //4
        ["bad", "bored", "tired", "sad"],
        //5
        ["tell me story", "tell me joke"],
        //6
        ["thanks", "thank you"],
        //7
        ["bye", "good bye", "goodbye"]
    ];
    const reply = [
        //0 
        ["Hello!", "Hi!", "Hey!", "Hi there!"],
        //1
        [
            "Fine... how are you?",
            "Pretty well, how are you?",
            "Fantastic, how are you?"
        ],
        //2
        [
            "Nothing much",
            "Exciting things!"
        ],
        //3
        ["Glad to hear it"],
        //4
        ["Why?", "Cheer up buddy"],
        //5
        ["What about?", "Once upon a time..."],
        //6
        ["You're welcome", "No problem"],
        //7
        ["Goodbye", "See you later"],
    ];
    const alternative = [
        "Same",
        "Go on...",
        "Try again",
        "I'm listening...",
        "Bro..."
    ];

    function compare(triggerArray, replyArray, text) {
        let item;
        for (let x = 0; x < triggerArray.length; x++) {
            for (let y = 0; y < replyArray.length; y++) {
                if (triggerArray[x][y] == text) {
                    items = replyArray[x];
                    item = items[Math.floor(Math.random() * items.length)];
                }
            }
        }
        return item;
    }
    const robot = ["How do you do, fellow human", "I am not a bot"];

    function output(input) {
        let product;
        let text = input.toLowerCase().replace(/[^\w\s\d]/gi, "");
        text = text
            .replace(/ a /g, " ")
            .replace(/i feel /g, "")
            .replace(/whats/g, "what is")
            .replace(/please /g, "")
            .replace(/ please/g, "");

        //compare arrays
        //then search keyword
        //then random alternative

        if (compare(trigger, reply, text)) {
            product = compare(trigger, reply, text);
        } else if (text.match(/robot/gi)) {
            product = robot[Math.floor(Math.random() * robot.length)];
        } else {
            product = alternative[Math.floor(Math.random() * alternative.length)];
        }

        //update DOM
        addChat(input, product);
    }

    function addChat(input, product) {
        const chatBotChatDiv = document.getElementById("chatBotChat");
        let userDiv = document.createElement("div");
        userDiv.id = "user";
        userDiv.innerHTML = `You: <span id="user-response">${input}</span>`;
        chatBotChatDiv.appendChild(userDiv);

        let botDiv = document.createElement("div");
        botDiv.id = "bot";
        botDiv.innerHTML = `Chatbot: <span id="bot-response">${product}</span>`;
        chatBotChatDiv.appendChild(botDiv);
    }
</script>

</html>