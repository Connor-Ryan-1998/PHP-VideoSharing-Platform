$(document).ready(function() {
    $("#chatBotForm").submit(function(e) {
        e.preventDefault();
    });

    $("#submitBotQuestion").click(function(e) {
        const mainDiv = document.getElementById("chatBotChat");

        //Creates your Question to be submitted
        let userDiv = document.createElement("div");
        userDiv.id = "userChat";
        var input = $("#chatBotInput").val();
        userDiv.innerHTML = `<span id="user-response">You: ${input}</span>`;


        ///Creates Bot to be submitted
        let botDiv = document.createElement("div");
        botDiv.id = "botChat";
        var input = botResponse();
        botDiv.innerHTML = `<span id="bot-response">HelpBot: ${input}</span>`;

        ///Adds to chat
        if (input != ""){
            mainDiv.appendChild(userDiv);
            mainDiv.appendChild(botDiv);
        }

        ///Clear Value on input
        $("#chatBotInput").val("");
    });

    //Bot Response
    function botResponse() {
        $.ajax({
            url: baseURL + "ajax/botResponse",
            method: "GET",
            success: function(data) {
                var obj = JSON.parse(data);
                console.log(obj);
                return obj[0];              
            },
            error: function() {
                return "Sorry, I dont have an answer for that!"
            }              
        });
    }
});