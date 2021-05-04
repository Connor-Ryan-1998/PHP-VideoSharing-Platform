$(document).ready(function() {
    $("#chatBotForm").submit(function(e) {
        e.preventDefault();
    });

    $("#submitBotQuestion").click(function(e) {
        const mainDiv = document.getElementById("chatBotChat");
        let userDiv = document.createElement("div");
        userDiv.id = "userChat";
        var input = $("#chatBotInput").val();
        userDiv.innerHTML = `You: <span id="user-response">${input}</span>`;
        if (input != ""){
            mainDiv.appendChild(userDiv);
        }

        ///Clear Value on input
        $("#chatBotInput").val("");
    });
});