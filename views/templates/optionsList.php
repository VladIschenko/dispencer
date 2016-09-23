<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Список настроек</h1>
    </div>
    <!-- end  page header -->
</div>

<div class="panel panel-default  zero-padding col-md-12">
    <div class="panel-heading">
        Настройки
    </div>
    <div class="panel-body">

        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr>
                    <th>Действия</th>
                    <th>ID</th>
                    <th>ID устройства</th>
                    <th>Схема подключения</th>
                    <th>Порог срабатывания левого датчика уровня:</th>
                    <th>Порог срабатывания правого датчика уровня:</th>
                    <th>Начальный объем воды для 1 канала</th>
                    <th>Начальный объем воды для 2 канала</th>
                    <th>Начальный объем воды для 3 канала</th>
                    <th>Конечный объем воды для 1 канала</th>
                    <th>Конечный объем воды для 2 канала</th>
                    <th>Конечный объем воды для 3 канала</th>
                    <th>Начальный объем моющего средства для 1 канала</th>
                    <th>Начальный объем моющего средства для 2 канала</th>
                    <th>Начальный объем моющего средства для 3 канала</th>
                    <th>Конечный объем моющего средства для 1 канала</th>
                    <th>Конечный объем моющего средства для 2 канала</th>
                    <th>Конечный объем моющего средства для 3 канала</th>
                    <th>Объем воды для раствора</th>
                    <th>Объем моющего средства для раствора</th>
                    <th>Производительность насоса</th>
                    <th>Коэффициент расхода для 1 расходомера</th>
                    <th>Коэффициент расхода для 2 расходомера</th>
                    <th>Коэффициент расхода для 3 расходомера</th>
                    <th>Коэффициент расхода для 4 расходомера</th>
                    <th>Минимаьный интервал между санитациями</th>
                    <th>Максимальный интервал между санитациями</th>
                    <th>Время события</th>
                    <th>Время получения</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $options) { ?>
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
                        <td class="id"><?php echo $options['id']; ?></td>
                        <td><?php echo $options['device_id']; ?></td>
                        <td><?php echo $options['hw_config'] ?></td>
                        <td><?php echo $options['sensor_1']; ?></td>
                        <td><?php echo $options['sensor_2']; ?></td>
                        <td><?php echo $options['start_volume_1']; ?></td>
                        <td><?php echo $options['start_volume_2']; ?></td>
                        <td><?php echo $options['start_volume_3']; ?></td>
                        <td><?php echo $options['end_volume_1']; ?></td>
                        <td><?php echo $options['end_volume_2']; ?></td>
                        <td><?php echo $options['end_volume_3']; ?></td>
                        <td><?php echo $options['cleanser_volume_1']; ?></td>
                        <td><?php echo $options['cleanser_volume_2']; ?></td>
                        <td><?php echo $options['cleanser_volume_3']; ?></td>
                        <td><?php echo $options['cleanser_delay_1']; ?></td>
                        <td><?php echo $options['cleanser_delay_2']; ?></td>
                        <td><?php echo $options['cleanser_delay_3']; ?></td>
                        <td><?php echo $options['concentrate_volume']; ?></td>
                        <td><?php echo $options['water_mix_volume']; ?></td>
                        <td><?php echo $options['flow_speed_min']; ?></td>
                        <td><?php echo $options['flowmeter_performance_1']; ?></td>
                        <td><?php echo $options['flowmeter_performance_2']; ?></td>
                        <td><?php echo $options['flowmeter_performance_3']; ?></td>
                        <td><?php echo $options['flowmeter_performance_4']; ?></td>
                        <td><?php echo $options['sanitization_min_interval']; ?></td>
                        <td><?php echo $options['sanitization_max_interval']; ?></td>
                        <td><?php echo $options['time']; ?></td>
                        <td><?php echo $options['created_at']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>