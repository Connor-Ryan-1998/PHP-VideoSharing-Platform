$(document).ready(function() {
        load_data();

        function load_data() {
            $.ajax({
                url: baseURL + "ajax/fetchRecent",
                method: "GET",
                success: function(data) {
                    $('#videoList').html("");
                    if (data == "") {
                        $('#videoList').html(data);
                    } else {
                        var obj = JSON.parse(data);
                        if (obj.length > 0) {
                            var items = [];
                            $.each(obj, function(i, val) {
                                items.push($('<div class="card" style="width: 18rem;">\
                                                <div class="card-body">\
                                                    <h5 class="card-title"><a href='+ baseURL+"video/SearchVideo/" + val.id+" class='text-decoration-none'>"+val.filename+'</a></h5>\
                                                    <video width="320" height="240" controls><source  src="' + baseURL+'uploads/' + val.filename + '" type="video/mp4"></video>\
                                                </div>\
                                            </div>'));
                                // items.push($("<h4><a href="+ baseURL+"video/SearchVideo/" + val.id+" class='text-decoration-none'>"+val.filename+"</a></h4>"));
                                // items.push($('<video width="320" height="240" controls><source  src="' + baseURL+'uploads/' + val.filename + '" type="video/mp4"></video>'));
                            });
                            $('#videoList').append.apply($('#videoList'), items);
                        } else {
                            $('#videoList').html("Not Found!");
                        };
                    };
                },              
            });
        }
});