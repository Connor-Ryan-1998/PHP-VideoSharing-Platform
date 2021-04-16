$(document).ready(function() {
        load_data();

        function load_data() {
            $.ajax({
                url: baseURL + "ajax/fetchRecent",
                method: "POST",
                success: function(data) {
                    console.log(data);
                    // $('#videoList').html("");
                    // if (data == "") {
                    //     $('#videoList').html(data);
                    // } else {
                    //     var obj = JSON.parse(data);
                    //     if (obj.length > 0) {
                    //         var items = [];
                    //         $.each(obj, function(i, val) {
                    //             items.push($("<h4>").text(val.filename));
                    //             items.push($('<video width="320" height="240" controls><source  src="' + '<?php echo base_url(); ?>/uploads/' + val.filename + '" type="video/mp4"></video>'));
                    //         });
                    //         $('#videoList').append.apply($('#videoList'), items);
                    //     } else {
                    //         $('#videoList').html("Not Found!");
                    //     };
                    // };
                },              
            });
        }
});