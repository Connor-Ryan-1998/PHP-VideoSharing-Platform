$(document).ready(function() {
        load_data();

        function load_data() {
            $.ajax({
                url: baseURL + "ajax/fetchVideoDetail",
                method: "GET",
                success: function(data) {
                    $('#videoDetail').html("");
                    if (data == "") {
                        $('#videoDetail').html(data);
                    } else {
                        var obj = JSON.parse(data);
                        if (obj.length > 0) {
                            var items = [];
                            $.each(obj, function(i, val) {
                                items.push($("<h4>").text(val.filename));
                                items.push($('<video width="320" height="240" controls><source  src="' + baseURL+'uploads/' + val.filename + '" type="video/mp4"></video>'));
                                items.push($("<h4>").text(val.description));
                            });
                            $('#videoDetail').append.apply($('#videoDetail'), items);
                        } else {
                            $('#videoDetail').html("Not Found!");
                        };
                    };
                },              
            });
        }
});