$(document).ready(function() {
    $("#chatBotForm").submit(function(e) {
        e.preventDefault();
    });

    $("#submitBotQuestion").click(function(e) {
        const mainDiv = document.getElementById("chatBotChat");

        //Creates your Question to be submitted
        let userDiv = document.createElement("div");
        userDiv.id = "userChat";
        var userinput = $("#chatBotInput").val();
        userDiv.innerHTML = `<span id="user-response">You: ${userinput}</span>`;


        ///Creates Bot to be submitted
        let botDiv = document.createElement("div");
        botDiv.id = "botChat";
        console.log(botResponse(userinput));
        var botinput = botResponse(userinput);
        console.log(botinput);
        botDiv.innerHTML = `<span id="bot-response">HelpBot: ${botinput}</span>`;

        ///Adds to chat
        if (userinput != ""){
            mainDiv.appendChild(userDiv);
            mainDiv.appendChild(botDiv);
        }

        ///Clear Value on input
        $("#chatBotInput").val("");
    });

    //Bot Response
    function botResponse(input) {
        $.ajax({
            url: baseURL + "ajax/botResponse",
            method: "POST",
            data: {
                'input': input
            },
            dataType: "JSON",
            success: function(data) {
                console.log(String(data[0]["filename"]));
                return String(data[0]["filename"]);              
            }             
        });
    }
});