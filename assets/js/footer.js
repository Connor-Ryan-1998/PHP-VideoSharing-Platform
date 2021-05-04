$(document).ready(function() {
    function toggleFormState() {
        var chatBotForm = document.getElementById("myForm");
        if (chatBotForm.style.display === "block") {
            chatBotForm.style.display = "none";
        } else {
            chatBotForm.style.display = "block"
        }
    }
});