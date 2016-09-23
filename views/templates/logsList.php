<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Список логов</h1>
    </div>
    <!-- end  page header -->
</div>

<div class="panel panel-default  zero-padding col-md-12">
    <div class="panel-heading">
        Пользователи
    </div>
    <div class="panel-body">

        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr>
                    <th>Действия</th>
                    <th>ID</th>
                    <th>Тип</th>
                    <th>Канал</th>
                    <th>Объем</th>
                    <th>Время события</th>
                    <th>Device_id</th>
                    <th>ID события</th>
                    <th>Время получения</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $logs) { ?>
                    <tr>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-cog"></i>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#"><span class="glyphicon glyphicon-open"></span>Просмотр</a>
                                    </li>
                                    <li><a href="#"><span class="glyphicon glyphicon-edit"></span>Редактировать</a>
                                    </li>
                                    <li><a href="#"><span class="glyphicon glyphicon-remove"></span>Удалить</a>
                                    </li>

                                </ul>
                            </div>
                        </td>
                        <td class="id"><?php echo $logs['id']; ?></td>
                        <td><?php echo $logs['type']; ?></td>
                        <td><?php echo $logs['channel'] ?></td>
                        <td><?php echo $logs['volume']; ?></td>
                        <td><?php echo $logs['time']; ?></td>
                        <td><?php echo $logs['device_id']; ?></td>
                        <td><?php echo $logs['event_uid']; ?></td>
                        <td><?php echo $logs['created_at']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>