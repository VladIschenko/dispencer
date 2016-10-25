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
                <p>
<!--                    <a href="/control/options" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-chevron-left"></span>К списку настроек</a>-->
                    <a href="/control/devices" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-chevron-left"></span>К списку всех устройств</a>
                    <a href="/control/devices/<?php echo $data['tableDeviceId']; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-chevron-left"></span>Управление устройством</a>
                </p>
                <h3><?php echo $data['deviceUid']; ?></h3>
            </div>
            <div class="panel-body ">

                <div class="table-responsive">
                    <div class="alert alert-info text-center">
                        <i class="fa fa-wrench fa-3x"></i>&nbsp;<b>Конфигурация устройства</b>

                    </div>
                    <h4>Общие настройки</h4>
                    <table class="table table-bordered table-hover text-center">
                        <tbody>
                        <tr>
                            <td> Конфигурация</td>
                            <td><?php echo $data['hw_config']; ?></td>
                        </tr>
                        <tr>
                            <td>Пороговое сопротивление жидкости для 1-го датчика уровня</td>
                            <td><?php echo $data['sensor_1']; ?></td>
                        </tr>
                        <tr>
                            <td>Пороговое сопротивление жидкости для 2-го датчика уровня</td>
                            <td><?php echo $data['sensor_2']; ?></td>
                        </tr>
                        <tr>
                            <td>Производительность насоса, мл/сек</td>
                            <td><?php echo $data['flow_speed_min']; ?></td>
                        </tr>
                        <tr>
                            <td>Текущее время/дата:</td>
                            <td id="time">
                                <input type="hidden"  id="htime">
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <h4>Настройки санитации</h4>
                    <table class="table table-bordered table-hover text-center">
                        <tbody>
                        <tr>
                            <td></td>
                            <td>1 канал</td>
                            <td>2 канал</td>
                            <td>3 канал</td>
                        </tr>
                        <tr>
                            <td>Объем воды для 1 промывки, мл</td>
                            <td><?php echo $data['start_volume_1']; ?></td>
                            <td><?php echo $data['start_volume_2']; ?></td>
                            <td><?php echo $data['start_volume_3']; ?></td>
                        </tr>
                        <tr>
                            <td>Объем воды для 2 промывки, мл</td>
                            <td><?php echo $data['end_volume_1']; ?></td>
                            <td><?php echo $data['end_volume_2']; ?></td>
                            <td><?php echo $data['end_volume_3']; ?></td>
                        </tr>
                        <tr>
                            <td>Объем моющего раствора для санитации, мл</td>
                            <td><?php echo $data['cleanser_volume_1']; ?></td>
                            <td><?php echo $data['cleanser_volume_2']; ?></td>
                            <td><?php echo $data['cleanser_volume_3']; ?></td>
                        </tr>
                        <tr>
                            <td>Время удержания моющего раствора в системе, сек</td>
                            <td><?php echo $data['cleanser_delay_1']; ?></td>
                            <td><?php echo $data['cleanser_delay_2']; ?></td>
                            <td><?php echo $data['cleanser_delay_3']; ?></td>
                        </tr>
                        </tbody>
                    </table>

                    <h4>Настройки санитации</h4>
                    <table class="table table-bordered table-hover text-center">
                        <tbody>
                        <tr>
                            <td>Объем концентрата, необходимый для приготовления раствора, мл</td>
                            <td><?php echo $data['concentrate_volume']; ?></td>
                        </tr>
                        <tr>
                            <td>Объем воды для приготовления раствора из концентрата, мл</td>
                            <td><?php echo $data['water_mix_volume']; ?></td>
                        </tr>
                        <tr>
                            <td>Минимальный интервал между санитациями, мн</td>
                            <td><?php echo $data['sanitization_min_interval']; ?></td>
                        </tr>
                        <tr>
                            <td>Максимальный интервал между санитациями, мн</td>
                            <td><?php echo $data['sanitization_max_interval']; ?></td>
                        </tr>
                        </tbody>
                    </table>

                    <h4>Настройки расходомеров</h4>
                    <table class="table table-bordered table-hover text-center">
                        <tbody>
                        <tr>
                            <td></td>
                            <td>1 расходомер</td>
                            <td>2 расходомер</td>
                            <td>3 расходомер</td>
                            <td>4 расходомер</td>
                        </tr>
                        <tr>
                            <td>Тиков расходомера на один литр</td>
                            <td><?php echo $data['flowmeter_performance_1']; ?></td>
                            <td><?php echo $data['flowmeter_performance_2']; ?></td>
                            <td><?php echo $data['flowmeter_performance_3']; ?></td>
                            <td><?php echo $data['flowmeter_performance_4']; ?></td>
                        </tr>
                        </tbody>
                    </table>

                    <?php if($_SESSION['type'] == 'god'){ ?>

                        <a href="/options/edit/<?php echo $data['deviceUid']; ?>" class="btn btn-primary margin-left"><span class="glyphicon glyphicon-edit"></span>Редактировать</a>

                    <?php } ?>
                </div>
            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>

<script>

    function addZero(number)
    {
        if(number<10)
        {
            number = '0' + number;
        }
        return number;
    }

    function countTimeOnDevice()
    {
        var date = Date.parse("<?php echo $data['time']; ?>");
        var now = Date.parse(new Date());
        var lastUpdate = Date.parse("<?php echo $data['updated_at']; ?>");
        var currentTime = new Date(date+now-lastUpdate);

        var seconds = addZero(currentTime.getSeconds());
        var minutes = addZero(currentTime.getMinutes());
        var hour = addZero(currentTime.getHours());

        var year = addZero(currentTime.getFullYear());
        var month = addZero(currentTime.getMonth());
        var day = addZero(currentTime.getDate());

        var ampm = (currentTime.getHours() >= 12) ? "PM" : "AM";

        var pageDate = document.getElementById('time');
        if(isNaN(year)){
            pageDate.innerHTML= '';
        }else{
            pageDate.innerHTML= year + '-' + month + '-' + day + ' ' + hour + ':' + minutes + ':' + seconds + ' ' + ampm;
        }
        setTimeout("countTimeOnDevice();",1000);
    }

    countTimeOnDevice();

</script>