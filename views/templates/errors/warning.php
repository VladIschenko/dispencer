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
        <div class="panel panel-default zero-padding col-md-6 col-md-offset-3">
            <div class="panel-heading">
                <h1>Ошибка <small><font face="Tahoma" color="red">Error 400</font></small></h1>
            </div>
            <div class="panel-body">

                <p><?php echo $data['title']; ?></p>
                <a href="/" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> Вернуться на главную</a>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>

<?php header("HTTP/1.0 400 Bad Request"); ?>