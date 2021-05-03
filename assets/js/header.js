$(document).ready(function() {

    Notification.requestPermission().then(function(permission) { console.log('permiss', permission)});
    if (Notification.permission === "granted")
    {
        console.log('foo');
        navigator.serviceWorker.getRegistration().then(function(reg) {
            reg.showNotification('Hello world!');
          });
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
