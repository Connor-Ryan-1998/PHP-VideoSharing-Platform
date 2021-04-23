$(document).ready(function() {
        load_data();
        load_Comments();

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
                                items.push($('<video width="560" height="420" controls><source  src="' + baseURL+'uploads/' + val.filename + '" type="video/mp4"></video>'));
                                items.push($("<h4>").text("Description"));
                                items.push($('<div class="card" style="width: 100%;">\
                                                <div class="card-body">\
                                                    <p class="card-text">' + val.description + '</p>\
                                                </div>\
                                            </div>'));
                            });
                            $('#videoDetail').append.apply($('#videoDetail'), items);
                        } else {
                            $('#videoDetail').html("Not Found!");
                        };
                    };
                },              
            });
        }
        function load_Comments() {
            $.ajax({
                url: baseURL + "ajax/fetchVideoDetailComments",
                method: "GET",
                success: function(data) {
                    $('#videoComments').html("");
                    if (data == "") {
                        $('#videoComments').html(data);
                    } else {
                        var obj = JSON.parse(data);
                        if (obj.length > 0) {
                            var items = [];                           
                            $.each(obj, function(i, val) {
                                console.log(val.CreatedDateTime);
                                items.push($('<div class="card" style="width: 100%;">\
                                                    <div class="card-body">\
                                                        <h5 class="card-title">' + val.user + ' @ ' + (val.CreatedDateTime).ToString() + '</h5>\
                                                        <p class="card-text">' + val.comments + '</p>\
                                                    </div>\
                                                </div>'));
                            });
                            $('#videoComments').append.apply($('#videoComments'), items);
                        } else {
                            $('#videoComments').html("No Comments yet!");
                        };
                    };
                },              
            });
        }
});