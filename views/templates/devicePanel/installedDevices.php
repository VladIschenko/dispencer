<div class="panel panel-default zero-padding col-md-12">
    <div class="panel-heading">
        <h3>Установленные устройства</h3>
    </div>
    <div class="panel-body ">
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
                                        <li><a href="/control/devices/<?php echo $device['id']; ?>"><span class="glyphicon glyphicon-open"></span>Просмотр</a>
                                        </li>
                                        <li><a href="#"><span class="glyphicon glyphicon-edit"></span>Редактировать</a>
                                        </li>
                                        <li><a href="#"><span class="glyphicon glyphicon-remove"></span>Удалить</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <td class="id"><?php echo $device['id']; ?></td>
                            <td><?php echo $device['device_id']; ?></td>
                            <td><a href="/user/<?php echo $device['customer_id']; ?>"><?php echo $device['login'][0]['login']; ?></a></td>
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