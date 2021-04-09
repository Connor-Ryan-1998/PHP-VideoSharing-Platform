$(document).ready(function() {
    // load_data();

    // // Initialize 
    $("#search_text").autocomplete({
        source: function(request, response) {
            // Fetch data
            $.ajax({
                url: "<?php echo base_url(); ?>ajax/fileList",
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
            return false;
        }
    });
});