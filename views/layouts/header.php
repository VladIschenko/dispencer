<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beerbook</title>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="../../public/js/jquery-3.1.0.js"></script>
    <link href="../../public/css/datepicker.min.css" rel="stylesheet" type="text/css">
    <link href="../../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../public/css/style.css" rel="stylesheet">
    <script src="../../public/js/datepicker.min.js"></script>
    <script src="../../public/js/amcharts.js"></script>
    <script src="../../public/js/serial.js"></script>
    <script src="../../public/js/dataloader.min.js" type="text/javascript"></script>
</head>
<body class="grey">

<div class="container">
    <div class="wrapper">
    <!-- Static navbar -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">Beerbook</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <?php if(!isset($_SESSION['login'])) {?>
                    <li><a href="/">Вход</a></li>
                    <?php } ?>
                    <?php if(isset($_SESSION['login'])) {?>
                        <li><a href="/user/<?php echo $_SESSION['id']?>">Мой профиль</a></li>
                        <li><a href="/stats">Статистика</a></li>
                        <li><a href="/userlist">Список пользователей</a></li>
                        <li><a href="/add-user">Добавить пользователя</a></li>
                    <li><a href="/logout">Выйти</a></li>
                    <?php } ?>
                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>