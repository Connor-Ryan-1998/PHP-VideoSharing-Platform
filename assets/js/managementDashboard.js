$(document).ready(function() {
    google.charts.load('current', {
        packages: ['corechart', 'bar']
    });
    google.charts.setOnLoadCallback();

    $('#users').change(function() {
        var user = $(this).val();
        var chart_type = $('#chartType').val();
        if (user != '') {
            load_userUpload_data(user, 'User Uploaded files by date: ', chart_type);
        }
    });

    function load_userUpload_data(user, title, chart_type) {
        var temp_title = title + ' ' + user;
        $.ajax({
            url: baseURL + "managementDashboard/fetch_data",
            method: "POST",
            data: {
                'user': user
            },
            dataType: "JSON",
            success: function(data) {
                drawUserUploadChart(data, temp_title, chart_type);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown, data) {
                alert("Status: " + textStatus);
                alert("Error: " + errorThrown);
            }
        })
    }

    function drawUserUploadChart(chart_data, chart_main_title, chart_type) {
        var jsonData = chart_data; 
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'dateCreated');
        data.addColumn('number', 'FileUploadedCount');
        console.log(jsonData);
        for (var i = 0; i < jsonData.length; i++) {
            dateCreated = jsonData[i].dateCreated;
            FileUploadedCount = jsonData[i].FileUploadedCount;
            console.log(FileUploadedCount);
            console.log(dateCreated);
            data.addRow([dateCreated, parseInt(FileUploadedCount)]);
        }


        var options = {
            title: chart_main_title,
            hAxis: {
                title: "Date Created"
            },
            vAxis: {
                title: 'File Uploaded Count'
            },
            chartArea: {
                width: '80%',
                height: '85%'
            }
        }
        if (chart_type == "Column")
        {
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_area'));
            chart.draw(data, options);
        }
    }


});