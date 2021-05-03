<div class="container">
    <br />
    <h3>Management Dashboard: Data Visualisation</h3>
    <br />
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-9">
                    <h3 class="panel-title">User Uploads</h3>
                </div>
                <div class="col-md-3">
                    <select name="users" id="users" class="form-control">
                        <option value="">Select User</option>
                        <?php
                        foreach ($user_list->result_array() as $row) {
                            echo '<option value="' . $row["username"] . '">' . $row["username"] . '</option>';
                        }
                        ?>

                    </select>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div id="chart_area" style="width: 1000px; height: 620px;"></div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        packages: ['corechart', 'bar']
    });
    google.charts.setOnLoadCallback();

    function load_monthwise_data(user, title) {
        var temp_title = title + ' ' + user;
        $.ajax({
            url: "<?php echo base_url(); ?>managementDashboard/fetch_data",
            method: "POST",
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

        // var chart = new google.visualization.ColumnChart(document.getElementById('chart_area'));
        var chart = new google.visualization.LineChart(document.getElementById('chart_area'));
        // var chart = new google.visualization.Table(document.getElementById('chart_area'));

        chart.draw(data, options);
    }
</script>

<script>
    $(document).ready(function() {
        $('#users').change(function() {
            var user = $(this).val();
            if (user != '') {
                load_monthwise_data(user, 'User Uploaded files by date: ');
            }
        });
    });
</script>