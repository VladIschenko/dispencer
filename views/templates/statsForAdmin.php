<div class="row">
    <!-- Page Header -->
    <div class="col-lg-12">
        <h1 class="page-header">Статистика по продажам</h1>
    </div>
    <!--End Page Header -->
</div>

<div class="row">
    <!--quick info section -->
    <div class="col-lg-3">
        <div class="alert alert-warning text-center">
            <i class="fa  fa-pencil fa-3x"></i>&nbsp;<b><a href="/control/userlist">217</a> </b>пользователей
        </div>
    </div>
    <div class="col-lg-3">
        <div class="alert alert-warning text-center">
            <i class="fa  fa-pencil fa-3x"></i>&nbsp;<b><a href="/userlist/type/admin">32</a> </b>покупателя
        </div>
    </div>
    <div class="col-lg-3">
        <div class="alert alert-info text-center">
            <i class="fa fa-rss fa-3x"></i>&nbsp;<b><a href="/devices/installed">66</a> </b>работающих устройств
        </div>
    </div>
    <div class="col-lg-3">
        <div class="alert alert-info text-center">
            <i class="fa fa-rss fa-3x"></i>&nbsp;<b><a href="/devices/free">34</a> </b>свободных устройства
        </div>
    </div>
    <!--end quick info section -->
</div>

<div class="row">
    <div class="col-lg-8">



        <!--Area chart example -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i>Продажи устройств по месяцам
            </div>

            <div class="panel-body">
                <div id="sell"></div>
            </div>

        </div>
        <!--End area chart example -->
        <!--Simple table example -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i>Крупнейшие клиенты
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Покупатель</th>
                                    <th>Количество устройств</th>
                                    <th>Количество сортов пива</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Praha Nova</td>
                                    <td>22</td>
                                    <td>14</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Pivobank</td>
                                    <td>17</td>
                                    <td>25</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>AltBier</td>
                                    <td>16</td>
                                    <td>8</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Probka</td>
                                    <td>12</td>
                                    <td>14</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <!-- /.row -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!--End simple table example -->

    </div>


    <div class="col-lg-4">
        <!-- Donut Example-->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i>Расход по стандартным сортам
            </div>
            <div class="panel-body">
                <div id="morris-donut-chart"></div>
            </div>
        </div>
        <!--End Donut Example-->
    </div>



    <div class="col-lg-4">
        <div class="panel panel-primary text-center no-boder">
            <div class="panel-body green">
                <i class="fa fa-beer fa-3x" aria-hidden="true"></i>
                <h3>11</h3>
            </div>
            <div class="panel-footer">
                            <span class="panel-eyecandy-title">Устройств продано за текущий месяц
                            </span>
            </div>
        </div>
        <div class="panel panel-primary text-center no-boder">
            <div class="panel-body green">
                <i class="fa fa-user fa-3x" aria-hidden="true"></i>
                <h3>32</h3>
            </div>
            <div class="panel-footer">
                            <span class="panel-eyecandy-title">Новых пользователя за месяц
                            </span>
            </div>
        </div>
    </div>

</div>




