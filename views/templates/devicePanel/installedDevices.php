<?php if($_SESSION['type'] != 'god') { ?>

<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Устройства</h1>
    </div>
    <!-- end  page header -->
</div>

<?php } ?>


<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Устройства</h1>
    </div>
    <!-- end  page header -->
    <div class="pull-left">
        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/control/device/search">
            <table class="table">
                <tbody>
                <tr>
                    <td>
                        <input name="search" type="text" class="form-control" placeholder="..."/>
                    </td>
                    <td>
                        <button class="btn btn-primary" type="submit">Поиск</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
    <div class="pull-left">
            <table class="table">
                <tbody>
                <tr>
                    <td>
                        <a href="/control/devices/add" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>Добавить устройство</a>
                    </td>
                </tr>
                </tbody>
            </table>
    </div>
</div>

<div class="row">
<div class="panel panel-primary">
    <div class="panel-heading">
        <i class="fa fa-bar-chart-o fa-fw"></i><?php echo $data[0]['title']; ?>
        <div class="pull-left">
            <div class="btn-group">
                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                    Тип устройств
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="/control/devices">Все</a>
                    </li>
                    <li><a href="/devices/free">Свободные</a>
                    </li>
                    <li><a href="/devices/sold">Проданные</a>
                    </li>
                    <li><a href="/devices/installed">Установленные</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="panel-body">
        <div class="table-responsive">
            <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/processStats">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Действия</th>
                        <th>ID</th>
                        <th>Device_id</th>
                        <th>Покупатель</th>
                        <th>Дата установки</th>
                        <th>Адрес установки</th>
                        <th>Инвентарный номер</th>
                        <th>Установщик</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $device) { ?>
                        <tr>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-cog"></i>
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="/control/logs/<?php echo $device['device_id']; ?>"><span class="glyphicon glyphicon-list-alt"></span>Просмотр событий</a>
                                        </li>
                                        <li><a href="/control/options/<?php echo $device['device_id']; ?>"><span class="fa fa-wrench"></span>Настройки</a>
                                        </li>
                                        <li><a href="/control/devices/<?php echo $device['id']; ?>"><span class="glyphicon glyphicon-open"></span>Управление</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <td class="id"><?php echo $device['id']; ?></td>
                            <td><?php echo $device['device_id']; ?></td>
                            <td><a href="/user/<?php echo $device['customer_id']; ?>"><?php echo $device['login']; ?></a></td>
                            <td><?php echo $device['installation_date']; ?></td>
                            <td><?php echo $device['installation_address']; ?></td>
                            <td><?php echo $device['inventory_number']; ?></td>
                            <td><?php echo $device['installer_name']; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
        </div>
    </div>

</div>
</div>
</div>