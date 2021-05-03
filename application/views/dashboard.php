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
                    <select name="chartType" id="chartType" class="form-control">
                        <option value="">Select Chart Type</option>
                        <option value="Column">Column</option>
                        <option value="Pie">Pie</option>
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
<script src="<?php echo base_url(); ?>assets/js/managementDashboard.js"></script>