<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header"></h1>
    </div>
    <!-- end  page header -->
</div>
<div class="row">
    <div class="col-lg-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default zero-padding col-md-8 col-md-offset-2">
            <div class="panel-heading">
                <h3>График расхода воды</h3>
            </div>
            <div class="panel-body ">
                <div id="myfirstchart" style="height: 250px;"></div>
            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>

<script>new Morris.Area({
        // ID of the element in which to draw the chart.
        element: 'myfirstchart',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: <?php echo json_encode($data)?>,
        // The name of the data record attribute that contains x-values.
        xkey: 'Дата',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['Объем'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Израсходовано литров'],
        lineColors: ['#3498DB'],
        gridTextColor: ['#ACADAC'],
        xLabelMargin: 25,
        padding: 50,
        xLabels: "day",
        resize: true

    });</script>





