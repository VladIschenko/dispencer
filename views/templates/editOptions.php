
<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header"></h1>
    </div>
    <!-- end  page header -->
</div>
<script src="../../assets/scripts/jquery.1.4.2.js"></script>
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
                <form name="options" id="options" method="POST" action="/options/update/<?php echo $data['device_id']; ?>">
                <div class="table-responsive">

                    <div class="alert alert-warning text-center">
                        <i class="fa fa-wrench fa-3x"></i>&nbsp;<b>Изменить конфигурацию</b>

                    </div>
                    <h4>Общие настройки</h4>
                    <table class="table table-bordered table-hover text-center">
                        <tbody>
                        <tr>
                            <td>Текущая конфигурация</td>
                            <td>
                                <?php echo $data['hw_config'];?>
                            </td>
                        </tr>
                        <tr>
                            <td>Сменить конфигурацию на <p><i><h6>Оставьте пустым. если хотите сохранить текущую</i></h6></p></td>
                            <td>
                                <select class="form-control" name="scheme" id="scheme">
                                    <option selected value=""></option>
                                    <option value="HW_BASE">HW_BASE</option>
                                    <option value="HW_PLUMBING_1FM">HW_PLUMBING_1FM</option>
                                    <option value="HW_PLUMBING_4FM">HW_PLUMBING_4FM</option>
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
                            <td>Сменить время на: <p><i><h6>Оставьте пустым. если хотите сохранить текущее</i></h6></p></td>
                            <td>
                                <input name="newtime" id="newtime" class="datepickerTimeField form-control">
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
                        <a href="javascript:testDate()" class="btn btn-lg btn-primary btn-block" type="submit">Сохранить</a>
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

    function calcTime(offset) {
        var d = new Date();
        var utc = d.getTime() - (d.getTimezoneOffset() * 60000);
        var nd = new Date(utc + (3600000*offset));
        return nd.toLocaleString();
    }


    function countTimeOnDevice()
    {
        var date = Date.parse("<?php echo $data['time']; ?>");
        var now = new Date(Date.now());
//        alert(offset);
        now = Date.parse(now);
//        alert(now);
        var lastUpdate = Date.parse("<?php echo $data['last_time_update']; ?>");
        var currentTime = new Date(date+now-lastUpdate);
        var offset = currentTime.getTimezoneOffset();


//        alert(offset);

        var seconds = addZero(currentTime.getSeconds());
        var minutes = addZero(currentTime.getMinutes());
        var hour = addZero(currentTime.getHours() + 3);

//        alert(hour);
        var year = addZero(currentTime.getFullYear());
        var month = addZero(currentTime.getMonth() + 1);
        var day = addZero(currentTime.getDate());

        var ampm = (currentTime.getHours() >= 12) ? "PM" : "AM";

        var testMinutes = minutes - offset;
//        alert(testMinutes);
        if(testMinutes > 60)
        {
            minutes = offset - minutes;
            if(minutes < 0) {minutes *= -1;}
//            alert(minutes);
            if(minutes < 0 || minutes > 60)
            {
                hour = hour - Math.floor(minutes/60);
//                alert(hour);
                minutes = minutes%60;
//                alert(minutes);
                if(hour > 24)
                {
                    day = day - Math.floor(hour/24);
                    hour = hour%24;
                }
            }
        }else{
            if(testMinutes < 0){
                offset = offset * -1;
                minutes = offset - minutes;
                if(minutes < 0) {minutes *= -1;}
                if(minutes < 0 || minutes > 60)
                {
                    hour = hour - Math.floor(minutes/60)*-1;
                    minutes = minutes%60;
                    if(hour > 24)
                    {
                        day = day - Math.floor(hour/24)*-1;
                        hour = hour%24;
                    }
                }
            }else{
                minutes = testMinutes;
            }
        }


        var pageDate = document.getElementById('time');
        if(isNaN(year)){
            pageDate.innerHTML= '';
        }else{
            pageDate.innerHTML= year + '-' + month + '-' + day + ' ' + addZero(hour) + ':' + addZero(minutes) + ':' + seconds + ' ' + ampm;
        }
//        alert(140%60);
        setTimeout("countTimeOnDevice();",1000);
    }

    countTimeOnDevice();


    function testDate()
    {
        var date = document.getElementById("newtime").value;
        alert(date);
        var t = date.match(/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/);
        if(t===null)
            alert("Пожалуйста, используйте для ввода даты следующий формат: гггг-мм-дд чч-мм-сс");

        var y=+t[1], m=+t[2], d=+t[3], h=+t[4], min=+t[5], s=+t[6];

        if(m>=1 && m<=12 && d>=1 && d<=31 && h>=0 && h<24 && min>=0 && min<=60&& s>=0 && s<=60){
            document.getElementById('options').submit();
        }else{
            alert("Пожалуйста, используйте для ввода даты следующий формат: гггг-мм-дд чч-мм-сс");
        }
    }

</script>
<script src="../../assets/scripts/jquery.1.4.2.js"></script>

