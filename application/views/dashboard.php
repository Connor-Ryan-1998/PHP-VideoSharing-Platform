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
            success: function(data) {
                console.log(data);
                drawMonthwiseChart(data, temp_title);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown, data) {
                console.log(data);
                alert("Status: " + textStatus);
                alert("Error: " + errorThrown);
            }
        })
    }

    function drawMonthwiseChart(chart_data, chart_main_title) {
        console.log(chart_data);
        var jsonData = chart_data;
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'CreatedDateTime');
        data.addColumn('string', 'filename');

        $.each(jsonData, function(i, jsonData) {
            var month = jsonData.month;
            var profit = parseFloat($.trim(jsonData.profit));
            data.addRows([
                [month, profit]
            ]);
        });

        var options = {
            title: chart_main_title,
            hAxis: {
                title: "CreatedDateTime"
            },
            vAxis: {
                title: 'filename'
            },
            chartArea: {
                width: '80%',
                height: '85%'
            }
        }

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_area'));

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