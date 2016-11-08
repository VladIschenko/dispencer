<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beerbook</title>
    <link href="../../public/css/bootstrap.min.css" rel="stylesheet" />
</head>
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
                <h1>Вы не авторизованы! <small><font face="Tahoma" color="red">Error 401</font></small></h1>
            </div>
            <div class="panel-body ">

                <p>Для совершения выбранного действия вы должны войти на сайт как пользователь</p>
                <a href="/" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> Войти</a>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>
</html>

<?php header("HTTP/1.0 401 Unauthorized"); ?>