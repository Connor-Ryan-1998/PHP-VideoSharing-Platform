$(document).ready(function() {
    google.charts.load('current', {
        packages: ['corechart', 'bar']
    });
    google.charts.setOnLoadCallback();

    $('#users').change(function() {
        var user = $(this).val();
        if (user != '') {
            load_monthwise_data(user, 'User Uploaded files by date: ');
        }
    });

    function load_monthwise_data(user, title) {
        var temp_title = title + ' ' + user;
        $.ajax({
            url: baseURL + "managementDashboard/fetch_data",
            method: "POST",
            data: {
                'user': user
            },
            dataType: "JSON",
            success: function(data) {
                drawMonthwiseChart(data, temp_title);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown, data) {
                alert("Status: " + textStatus);
                alert("Error: " + errorThrown);
            }
        })
    }

    function drawMonthwiseChart(chart_data, chart_main_title) {
        var jsonData = chart_data; ///array of json?
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

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_area'));


        chart.draw(data, options);
    }


});