<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header"></h1>
    </div>
    <!-- end  page header -->
</div>
<form method="POST" action="/conf-devices/save/<?php echo $data['id']; ?>">
<div class="row">
<div class="col-md-offset-2">

<div class="row col-lg-5">
    <div class="panel panel-default height200">
        <div class="panel-heading">
            Настройка сортов пива на каналах устройства
        </div>
        <div class="panel-body">
            <ul class="nav nav-pills">
                <li class="active"><a href="#home-pills" data-toggle="tab">Канал 1</a>
                </li>
                <li><a href="#profile-pills" data-toggle="tab">Канал 2</a>
                </li>
                <li><a href="#messages-pills" data-toggle="tab">Канал 3</a>
                </li>
            </ul>

            <div class="tab-content">
                <?php $sorts = array_values(array_slice($data, -3, 3, true)); ?>
                <div class="tab-pane fade in active" id="home-pills">
                    <select id="channel1" name="channel1" size="1" class="form-control margin-top-15"
                            onclick="processFirst()">
                        <?php if(!isset($sorts[0]['name'])){ ?>
                            <option value="<?php echo null ?>">Не менять</option>
                            <?php for ($i=0;$i<count($data)-13;$i++) { ?>
                                <option value="<?php echo $data[$i][0] ?>"><?php echo $data[$i][0] ?></option>
                            <?php } ?>
                        <?php }else{?>
                            <option value="<?php echo $sorts[0]['name']; ?>">Не менять</option>
                            <?php for ($i=0;$i<count($data)-16;$i++) { ?>
                                <option value="<?php echo $data[$i][0] ?>"><?php echo $data[$i][0] ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="tab-pane fade" id="profile-pills">
                    <select id="channel2" name="channel2" size="1" class="form-control margin-top-15"
                            onclick="processSecond()">
                        <?php if(!isset($sorts[1]['name'])){ ?>
                        <option value="<?php echo null ?>">Не менять</option>
                            <?php for ($i=0;$i<count($data)-13;$i++) { ?>
                                <option value="<?php echo $data[$i][0] ?>"><?php echo $data[$i][0] ?></option>
                            <?php } ?>
                        <?php }else{?>
                            <option value="<?php echo $sorts[1]['name']; ?>">Не менять</option>
                            <?php for ($i=0;$i<count($data)-16;$i++) { ?>
                                <option value="<?php echo $data[$i][0] ?>"><?php echo $data[$i][0] ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="tab-pane fade" id="messages-pills">
                    <select id="channel3" name="channel3" size="1" class="form-control margin-top-15"
                            onclick="processThird()">
                        <?php if(!isset($sorts[2]['name'])){ ?>
                            <option value="<?php echo null ?>">Не менять</option>
                            <?php for ($i=0;$i<count($data)-13;$i++) { ?>
                                <option value="<?php echo $data[$i][0] ?>"><?php echo $data[$i][0] ?></option>
                            <?php } ?>
                        <?php }else{?>
                            <option value="<?php echo $sorts[2]['name']; ?>">Не менять</option>
                            <?php for ($i=0;$i<count($data)-16;$i++) { ?>
                                <option value="<?php echo $data[$i][0] ?>"><?php echo $data[$i][0] ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <input type="hidden" name = "device-id" value="<?php echo $data['device_id']; ?>">
                <input type="hidden" name = "id" value="<?php echo $data['id']; ?>">
            </div>
        </div>
    </div>
</div>

<div class="col-lg-5">
    <div class="panel panel-default height200">
        <div class="panel-heading">
            Текущая конфигурация
        </div>
        <div class="panel-body">
            <ol>
                <li>
                    <div id="channel1item" class="text-success">
                        <?php if(!isset($sorts[0]['name'])) {echo "";}else{echo $sorts[0]['name'];} ?>
                    </div>
                </li>
                <li>
                    <div id="channel2item" class="text-success">
                        <?php if(!isset($sorts[1]['name'])) {echo "";}else{echo $sorts[1]['name'];} ?>
                    </div>
                </li>
                <li>
                    <div id="channel3item" class="text-success">
                        <?php if(!isset($sorts[2]['name'])) {echo "";}else{echo $sorts[2]['name'];} ?>
                    </div>
                </li>
            </ol>
        </div>
        <button type="submit" class="btn btn-primary channel-button">Применить конфигурацию</button>
    </div>
</div>

</div>
</div>
</form>

<div class="row ">
        <!-- Advanced Tables -->
        <div class="panel panel-default zero-padding col-md-8 col-md-offset-2">
            <div class="panel-heading">
                <p>
                    <a href="/control/devices" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-chevron-left"></span>К списку устройств</a>
                    <a href="/control/options/<?php echo $data['device_id']; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-chevron-left"></span>Настройки</a>
                    <a href="/control/logs/<?php echo $data['device_id']; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-chevron-left"></span>События</a>
                </p>
                <h3><?php echo $data['device_id']; ?></h3>
            </div>
            <div class="panel-body">

                <div class="table-responsive">
                    <p>Информация об устройстве</p>
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <td>ID устройства</td>
                            <td><?php echo $data['device_id']; ?></td>
                        </tr>
                        <tr>
                            <td>ID покупателя</td>
                            <td><?php echo $data['customer_id']; ?></td>
                        </tr>
                        <tr>
                            <td>Организация</td>
                            <td><?php echo $data['organisation']; ?></td>
                        </tr>
                        <tr>
                            <td>Дата установки</td>
                            <td><?php echo $data['installation_date']; ?></td>
                        </tr>
                        <tr>
                            <td>Адрес установки</td>
                            <td><?php echo $data['installation_address']; ?></td>
                        </tr>
                        <tr>
                            <td>Инвентарный номер</td>
                            <td><?php echo $data['inventory_number']; ?></td>
                        </tr>
                        <tr>
                            <td>Установщик</td>
                            <td><?php echo $data['installer_name']; ?></td>
                        </tr>
                        <tr>
                            <td>СМС-уведомления о событиях</td>
                            <td>
                                <a href="/control/devices/sms/<?php echo $data['id']; ?>"
                                   class="<?php if($data['sms_notifications'] == 1){
                                       echo 'btn btn-danger ';
                                   }elseif($data['sms_notifications'] == 0){
                                       echo 'btn btn-success';
                                   }?>"
                                ><span class="glyphicon glyphicon-remove">
                            <?php if($data['sms_notifications'] == 1){
                                echo "Отключить";
                            }elseif($data['sms_notifications'] == 0){
                                echo "Включить";
                            }?></span>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <a href="/devices/edit/<?php echo $data['id']; ?>" class="btn btn-primary margin-left"><span class="glyphicon glyphicon-edit"></span>Редактировать</a>
                    <a href="user/<?php echo $data['id']; ?>" class="btn btn-danger margin-left"><span class="glyphicon glyphicon-remove"></span>Удалить</a>
                    <a href="/control/devices/firmware/<?php echo $data['device_id']; ?>" class="btn btn-success margin-left"><span class="glyphicon glyphicon-remove"></span>Обновить прошивку</a>
                </div>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>

<script>
    function processFirst()
    {
        var channel1 = document.getElementById("channel1");
        var selectedItem = channel1.options[channel1.selectedIndex].value;
        var channel1Item = document.getElementById("channel1item");
        channel1Item.innerHTML = selectedItem;
    }
    function processSecond()
    {
        var channel1 = document.getElementById("channel2");
        var selectedItem = channel1.options[channel1.selectedIndex].value;
        var channel1Item = document.getElementById("channel2item");
        channel1Item.innerHTML = selectedItem;
    }
    function processThird()
    {
        var channel1 = document.getElementById("channel3");
        var selectedItem = channel1.options[channel1.selectedIndex].value;
        var channel1Item = document.getElementById("channel3item");
        channel1Item.innerHTML = selectedItem;
    }
</script>