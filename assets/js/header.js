Notification.requestPermission().then(function(permission) { console.log('permiss', permission)});
console.log('permiss');
$(document).ready(function() {

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
