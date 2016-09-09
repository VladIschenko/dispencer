<?php

namespace Graph;

use Controllers\DeviceController;

$device = new DeviceController();
$data = $device->processStats();
//echo $device::$startDate;
?>

<div class="col-lg-6 col-lg-offset-3">
    <div id="chartdiv" style="width: 550px; height: 400px;"></div>
</div>

<div class="form-horizontal">
    <legend>График расхода моющих средств с <?php echo $device::$startDate ?> по
        <?php echo $device::$endDate ?> для устройства с ID <?php echo $device::$deviceId ?> </legend>
</div>

</div>
</div>
</body>
<!--<footer class="footer">-->
<!--    <div class="container">-->
<!--        <p class="text-muted">&copy; 2016 Vlad Ischenko</p>-->
<!--    </div>-->
<!--</footer>-->
</html>

<script type="text/javascript">

    var chartData = <?php echo json_encode($data); ?>;


    AmCharts.ready(function() {

        var chart = new AmCharts.AmSerialChart();
        chart.dataProvider = chartData;
        chart.categoryField = "time_sanitization";
        var graph = new AmCharts.AmGraph();
        graph.valueField = "concentrate_volume";
        graph.type = "line";

        graph.bullet = "round";
        graph.lineColor = "#D2691E";
        graph.fillAlphas = 0.2;

//        var categoryAxis = chart.categoryAxis;
//        categoryAxis.autoGridCount  = false;
//        categoryAxis.gridCount = chartData.length;
//        categoryAxis.gridPosition = "start";
//        categoryAxis.labelRotation = 90;

        chart.addGraph(graph);
        chart.write('chartdiv');
    });
</script>






