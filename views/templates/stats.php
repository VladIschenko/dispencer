<div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Общая статистика</h1>
        </div>
        <!--End Page Header -->
    </div>






    <div class="row">
        <!--quick info section -->
        <div class="col-lg-4">
            <div class="alert alert-danger text-center">
                <i class="fa fa-calendar fa-3x"></i>&nbsp;<b>6 дней</b>  до следующей санитации

            </div>
        </div>
        <div class="col-lg-4">
            <div class="alert alert-success text-center">
                <i class="fa  fa-beer fa-3x"></i>&nbsp;<b>3942 литра </b> разлито за месяц
            </div>
        </div>
        <div class="col-lg-4">
            <div class="alert alert-info text-center">
                <i class="fa fa-rss fa-3x"></i>&nbsp;<b>8143 события</b> передано

            </div>
        </div>
        <!--end quick info section -->
    </div>

    <div class="row">
        <div class="col-lg-8">



            <!--Area chart example -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i>Расход по сортам на устройстве
                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                Выбор устройства
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#">00-07-a4-f9-a3-2b</a>
                                </li>
                                <li><a href="#">10-0b-d1-2f-11-0b</a>
                                </li>
                                <li><a href="#">00-04-a3-69-a9-0b</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="#">Все устройства</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <div id="morris-area-chart"></div>
                </div>

            </div>
            <!--End area chart example -->

        </div>


        <div class="col-lg-4">
            <!-- Donut Example-->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i>
                    Общий расход по сортам за месяц
                </div>
                <div class="panel-body">
                    <div id="morris-donut-chart"></div>
                </div>

            </div>
            <!--End Donut Example-->
        </div>
    </div>
