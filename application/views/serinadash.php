<?php include('templates/serheader.php') ?>

<div class="main">
    <div class="col-md-6 row">
        <h3 id="dashtitle">Accounts Haven't Logged in Longer Than 90 Days
        </h3>
    </div>
    <div class="col-md-12 row">
        <div class="col-md-6" style="margin: auto; margin-top: 5%; font-size: 500%;text-align: center;">
            <div class="chart-container" style="width: 70%; margin: auto;  ">
                <h1>Total number: <span id="serTotal"></span></h1>
                <a href="/codeigniter/index.php/Welcome/getserinfo" class=" btn btn-sq-lg btn-success"  id="fullbtn">
                View Full Table
                </a>
            </div>
        </div>

        <div class="col-md-6">
            <div class="chart-container" style="width: 70%; margin: auto;">
                <canvas id="chart-area"></canvas>
            </div>
        </div>

        <div class="col-md-6 bartable">
            <div class="chart-container">
                <canvas id="dptchart"></canvas>
            </div>
        </div>

        <div class="col-md-6 bartable">
            <div class="chart-container">
                <canvas id="typechart"></canvas>
            </div>
        </div>
    </div>
</div>

<script type='text/javascript' src="<?php echo base_url('assets/serinfo.js');?>"></script>