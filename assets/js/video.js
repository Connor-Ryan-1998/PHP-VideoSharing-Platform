$(document).ready(function() {
        load_data();

        function load_data() {
            console.log("ruh ro");
            $.ajax({
                url: baseURL + "ajax/fetchRecent",
                method: "GET",
                data: {
                    filename : query
                },
                success: function(response) {
                    $('#videoList').html("");
                    if (response == "") {
                        $('#videoList').html(response);
                    } else {
                        var obj = JSON.parse(response);
                        if (obj.length > 0) {
                            var items = [];
                            $.each(obj, function(i, val) {
                                items.push($("<h4>").text(val.filename));
                                items.push($('<video width="320" height="240" controls><source  src="' + '<?php echo base_url(); ?>/uploads/' + val.filename + '" type="video/mp4"></video>'));
                            });
                            $('#videoList').append.apply($('#videoList'), items);
                        } else {
                            $('#videoList').html("Not Found!");
                        };
                    };
                },
                error: function() {
                    console.log("ruh ro");
                 }                
            });
        }
});