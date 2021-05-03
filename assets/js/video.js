$(document).ready(function() {
        load_data();
        requestPermission();

        function requestPermission(){
            Notification.requestPermission().then(function(permission) { console.log('permiss', permission)});
            console.log('permiss');
        }
        console.log('permiss');
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
                                items.push($('<div class="card" style="width: 100%;">\
                                                <div class="card-body">\
                                                    <h5 class="card-title"><a href='+ baseURL+"video/SearchVideo/" + val.id+" class='text-decoration-none'>"+val.filename+'</a></h5>\
                                                    <video width="256" height=144" controls><source  src="' + baseURL+'uploads/' + val.filename + '" type="video/mp4"></video>\
                                                    <p>Created by '+ val.username + '<br> Time: ' + val.createddatetime + '</p>\
                                                </div>\
                                            </div>'));
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