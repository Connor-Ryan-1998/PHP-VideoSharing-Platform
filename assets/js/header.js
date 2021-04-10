$(document).ready(function() {
    // load_data();

    // // Initialize 
    $("#search_text").autocomplete({
        source: function(request, response) {
            // Fetch data
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
            console.log(ui.item);
            window.location.replace(baseURL+"video/SearchVideo/" + ui.item.value);
            return false;
        }
    });
});


            // load_data();

            // function load_data(query) {
            //     $.ajax({
            //         url: "<?php echo base_url(); ?>ajax/fetch",
            //         method: "GET",
            //         data: {
            //             query: query
            //         },
            //         success: function(response) {
            //             $('#result').html("");
            //             if (response == "") {
            //                 $('#result').html(response);
            //             } else {
            //                 var obj = JSON.parse(response);
            //                 if (obj.length > 0) {
            //                     var items = [];
            //                     $.each(obj, function(i, val) {
            //                         items.push($("<h4>").text(val.filename));
            //                         if (val.filename.includes("jpg")) {
            //                             items.push($('<img width="320" height="240" src="' + '<?php echo base_url(); ?>/uploads/' + val.filename + '" />'));
            //                         } else {
            //                             items.push($('<video width="320" height="240" controls><source  src="' + '<?php echo base_url(); ?>/uploads/' + val.filename + '" type="video/mp4"></video>'));
            //                         }
            //                     });
            //                     $('#result').append.apply($('#result'), items);
            //                 } else {
            //                     $('#result').html("Not Found!");
            //                 };
            //             };
            //         }
            //     });
            // }
            // $('#search_text').keyup(function() {
            //     var search = $(this).val();
            //     if (search != '') {
            //         load_data(search);
            //     } else {
            //         load_data();
            //     }
            // });