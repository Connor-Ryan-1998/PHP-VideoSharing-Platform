$(document).ready(function() {
    $("#chatBotForm").submit(function(e) {
        e.preventDefault();
    });

    $("#submitBotQuestion").click(function(e) {
        console.log('foo');
    });
});