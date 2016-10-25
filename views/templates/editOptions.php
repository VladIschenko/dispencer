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
                <h3><?php echo $data['device_id']; ?></h3>
            </div>
            <div class="panel-body ">
                <form name="options" method="POST" action="/options/update/<?php echo $data['device_id']; ?>">
                <div class="table-responsive">

                    <div class="alert alert-warning text-center">
                        <i class="fa fa-wrench fa-3x"></i>&nbsp;<b>Изменить конфигурацию</b>

                    </div>
                    <h4>Общие настройки</h4>
                    <table class="table table-bordered table-hover text-center">
                        <tbody>
                        <tr>
                            <td> Конфигурация</td>
                            <td>
                                <select class="form-control" name="scheme" id="scheme">
                                    <option selected value="HW_BASE">HW_BASE</option>
                                    <option value="HW_PLUMBING">HW_PLUMBING</option>
                                    <option value="HW_MIXER_1FM">HW_MIXER_1FM</option>
                                    <option value="HW_MIXER_4FM">HW_MIXER_4FM</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Пороговое сопротивление жидкости для 1-го датчика уровня</td>
                            <td>
                                <input name="sensor1" type="number" min="1" max="255" class="form-control" value="<?php echo $data['sensor_1'];?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Пороговое сопротивление жидкости для 2-го датчика уровня</td>
                            <td>
                                <input name="sensor2" type="number" min="1" max="255" class="form-control" value="<?php echo $data['sensor_2'];?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Производительность насоса, мл/сек</td>
                            <td>
                                <input name="flowSpeedMin" type="number" min="1" max="65000" class="form-control" value="<?php echo $data['flow_speed_min'];?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Текущее время/дата:</td>
                            <td id="time">
                                <input type="hidden"  id="htime">
                            </td>
                        </tr>
                        <tr>
                            <td>Сменить время на:</td>
                            <td id="newtime">
                                <input class="form-control" type="date" name="date" id="date">
                                <input class="form-control" type="time" name="time" id="time">
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
                            <td>
                                <input name="startVolume1" type="number" min="1" max="65000" class="form-control" value="<?php echo $data['start_volume_1'];?>"/>
                            </td>
                            <td>
                                <input name="startVolume2" type="number" min="1" max="65000" class="form-control" value="<?php echo $data['start_volume_2'];?>"/>
                            </td>
                            <td>
                                <input name="startVolume3" type="number" min="1" max="65000" class="form-control" value="<?php echo $data['start_volume_3'];?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Объем воды для 2 промывки, мл</td>
                            <td>
                                <input name="endVolume1" type="number" min="1" max="65000" class="form-control" value="<?php echo $data['end_volume_1'];?>"/>
                            </td>
                            <td>
                                <input name="endVolume2" type="number" min="1" max="65000" class="form-control" value="<?php echo $data['end_volume_2'];?>"/>
                            </td>
                            <td>
                                <input name="endVolume3" type="number" min="1" max="65000" class="form-control" value="<?php echo $data['end_volume_3'];?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Объем моющего раствора для санитации, мл</td>
                            <td>
                                <input name="cleanserVolume1" type="number" min="1" max="65000" class="form-control" value="<?php echo $data['cleanser_volume_1'];?>"/>
                            </td>
                            <td>
                                <input name="cleanserVolume2" type="number" min="1" max="65000" class="form-control" value="<?php echo $data['cleanser_volume_2'];?>"/>
                            </td>
                            <td>
                                <input name="cleanserVolume3" type="number" min="1" max="65000" class="form-control" value="<?php echo $data['cleanser_volume_3'];?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Время удержания моющего раствора в системе, сек</td>
                            <td>
                                <input name="cleanserDelay1" type="number" min="1" max="65000" class="form-control" value="<?php echo $data['cleanser_delay_1'];?>"/>
                            </td>
                            <td>
                                <input name="cleanserDelay2" type="number" min="1" max="65000" class="form-control" value="<?php echo $data['cleanser_delay_2'];?>"/>
                            </td>
                            <td>
                                <input name="cleanserDelay3" type="number" min="1" max="65000" class="form-control" value="<?php echo $data['cleanser_delay_3'];?>"/>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <h4>Настройки санитации</h4>
                    <table class="table table-bordered table-hover text-center">
                        <tbody>
                        <tr>
                            <td>Объем концентрата, необходимый для приготовления раствора, мл</td>
                            <td>
                                <input name="concentrate" id="concentrate" min="1" max="65000" class="form-control" type="number" value="<?php echo $data['concentrate_volume'];?>">
                            </td>
                            </td>
                        </tr>
                        <tr>
                            <td>Объем воды для приготовления раствора из концентрата, мл</td>
                            <td>
                                <input name="waterMixVolume" id="waterMixVolume" min="1" max="65000" class="form-control" type="number" value="<?php echo $data['water_mix_volume'];?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Минимальный интервал между санитациями, мн</td>
                            <td>
                                <input name="sanitizationMinInterval" id="sanitizationMinInterval" min="1" max="65000" class="form-control" type="number" value="<?php echo $data['sanitization_min_interval'];?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Максимальный интервал между санитациями, мн</td>
                            <td>
                                <input name="sanitizationMaxInterval" id="sanitizationMaxInterval" min="1" max="65000" class="form-control" type="number" value="<?php echo $data['sanitization_max_interval'];?>">
                            </td>
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
                            <td>
                                <input class="form-control" step="1" type="number" name="flowmeterPerformance1" id="flowmeterPerformance1" min="1" max="65000" value="<?php echo $data['flowmeter_performance_1']; ?>">
                            </td>
                            <td>
                                <input class="form-control" step="1" type="number" name="flowmeterPerformance2" id="flowmeterPerformance2" min="1" max="65000" value="<?php echo $data['flowmeter_performance_2']; ?>">
                            </td>
                            <td>
                                <input class="form-control" step="1" type="number" name="flowmeterPerformance3" id="flowmeterPerformance3" min="1" max="65000" value="<?php echo $data['flowmeter_performance_3']; ?>">

                            </td>
                            <td>
                                <input class="form-control" step="1" type="number" name="flowmeterPerformance4" id="flowmeterPerformance4" min="1" max="65000" value="<?php echo $data['flowmeter_performance_4']; ?>">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                    <div class="form-group">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Сохранить</button>
                    </div>
                </form>
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
        pageDate.innerHTML= year + '-' + month + '-' + day + ' ' + hour + ':' + minutes + ':' + seconds + ' ' + ampm;
        setTimeout("countTimeOnDevice();",1000);
    }

    countTimeOnDevice();

</script>