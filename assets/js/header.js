$(document).ready(function() {

    Notification.requestPermission().then(function(permission) { console.log('permiss', permission)});
    if (window.Notification && Notification.permission === "granted")
    {
        var i = 0;
        var interval = window.setInterval(function () {
            // Thanks to the tag, we should only see the "Hi! 9" notification
            var n = new Notification("Hi! " + i, {tag: 'soManyNotification'});
            if (i++ == 9) {
              window.clearInterval(interval);
            }
          }, 200);   
    }
    $("#search_text").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: baseURL + "ajax/fileList",
                type: 'post',
                dataType: "json",
                data: {
                    search: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        select: function(event, ui) {
            // Set selection
            $('#search_text').val(ui.item.label); // display the selected text
            window.location.replace(baseURL+"video/SearchVideo/" + ui.item.value);
            return false;
        }
    });
});
