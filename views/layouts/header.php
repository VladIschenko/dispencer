<?php if(isset($_SESSION['login'])) { ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beerbook</title>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
<!--    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>-->
<!--    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>-->

    <script src="../../public/js/jquery-3.1.0.js"></script>

    <script src="../../public/js/amcharts.js"></script>
    <script src="../../public/js/serial.js"></script>
    <script src="../../public/js/dataloader.min.js" type="text/javascript"></script>


    <link href="../../public/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="../../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../../assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="../../assets/css/style.css" rel="stylesheet" />
    <link href="../../assets/css/latest.css" rel="stylesheet" />
    <link href="../../assets/css/main-style.css" rel="stylesheet" />

    <link href="../../assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />


    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

<!--    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>-->

</head>
<body>
<!--  wrapper -->
<div id="wrapper">
    <!-- navbar top -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
        <!-- navbar-header -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                <img src="../../assets/img/logo.png" alt="" />
            </a>
        </div>
        <!-- end navbar-header -->
        <!-- navbar-top-links -->
        <ul class="nav navbar-top-links navbar-right">
            <!-- main dropdown -->

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="top-label label label-warning">5</span>  <i class="fa fa-bell fa-3x"></i>
                </a>
                <!-- dropdown alerts-->
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i>New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-twitter fa-fw"></i>3 New Followers
                                <span class="pull-right text-muted small">12 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-envelope fa-fw"></i>Message Sent
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-tasks fa-fw"></i>New Task
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-upload fa-fw"></i>Server Rebooted
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- end dropdown-alerts -->
            </li>


            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-3x"></i>
                </a>
                <!-- dropdown user-->
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="/user/<?php echo $_SESSION['id'] ?>"><i class="fa fa-user fa-fw"></i>Мой профиль</a>
                    </li>
<!--                    <li><a href="#"><i class="fa fa-gear fa-fw"></i>Settings</a>-->
<!--                    </li>-->
                    <li class="divider"></li>
                    <li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i>Выход</a>
                    </li>
                </ul>
                <!-- end dropdown-user -->
            </li>


            <!-- end main dropdown -->
        </ul>
        <!-- end navbar-top-links -->

    </nav>
    <!-- end navbar top -->

    <!-- navbar side -->
    <nav class="navbar-default navbar-static-side" role="navigation">
        <!-- sidebar-collapse -->
        <div class="sidebar-collapse">
            <!-- side-menu -->
            <ul class="nav" id="side-menu">
                <li>
                    <!-- user image section-->
                    <div class="user-section">
                        <div class="user-section-inner">
                            <img src="../../assets/img/user.jpg" alt="">
                        </div>
                        <div class="user-info">
                            <div><strong>
                                    <a href="/user/<?php echo $_SESSION['id'] ?>">
                                        <?php echo $_SESSION['login']?></a>
                                </strong></div>
                            <div class="user-text-online">
                                <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Онлайн
                            </div>
                        </div>
                    </div>
                    <!--end user image section-->
                </li>
                <li class="sidebar-search">
                    <!-- search section-->
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Поиск...">
                        <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                    </div>
                    <!--end search section-->
                </li>
                <?php if(isset($_SESSION['type']) and $_SESSION['type'] == 'god') {?>
                    <li>
                        <a href="/statistics"><i class="fa fa-bar-chart-o fa-fw" aria-hidden="true"></i>
                            Общая статистика</a>
                    </li>
                    <li>
                        <a href="/control/statistics"><i class="fa fa-usd" aria-hidden="true"></i>
                            Статистика по продажам</a>
                    </li>
                            <li>
                                <a href="/control/userlist"><i class="fa fa-user" aria-hidden="true"></i>Пользователи</a>
                            </li>
                            <li>
                                <a href="/control/devices"><i class="fa fa-tachometer" aria-hidden="true"></i>
                                    Устройства</a>
                            </li>
<!--                            <li>-->
<!--                                <a href="/control/options">Настройки</a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="/control/logs">Логи</a>-->
<!--                            </li>-->
                            <li>
                                <a href="/beerlist"><i class="fa fa-beer" aria-hidden="true"></i>Сорта пива</a>
                            </li>

<!--                    <li>-->
<!--                        <a href="/send"><i class="fa fa-plus" aria-hidden="true"></i>Отправить смс</a>-->
<!--                    </li>-->

                <?php }else{ ?>

                <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Панели управления<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="/userlist">Пользователями</a>
                        </li>
                        <li>
                            <a href="/control/devices">Устройствами</a>
                        </li>
                        <li>
                            <a href="/beerlist">Сортами пива</a>
                        </li>
                    </ul>
                    <!-- second-level-items -->
                </li>

                <?php } ?>

            </ul>
            <!-- end side-menu -->
        </div>
        <!-- end sidebar-collapse -->
    </nav>
    <!-- end navbar side -->
    <!--  page-wrapper -->
    <div id="page-wrapper">

        <?php } ?>
