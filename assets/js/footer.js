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
        var input = $("#chatBotInput").val();
        botDiv.innerHTML = `<span id="bot-response">HelpBot: ${input}</span>`;
        if (input != ""){
            mainDiv.appendChild(userDiv);
            mainDiv.appendChild(botDiv);
        }

        ///Clear Value on input
        $("#chatBotInput").val("");
    });
});