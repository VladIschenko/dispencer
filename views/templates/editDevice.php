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
                <p><a href="/control/devices" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-chevron-left"></span>К списку устройств</a></p>
                <h3><?php echo $data['device_id']; ?></h3>
            </div>
            <div class="panel-body ">

                <div class="table-responsive">
                    <form method="POST" action="/devices/save/<?php echo $data['id'];?>">

                        <?php if($_SESSION['type'] == 'god') {?>

                        <div class="form-group">
                            <label>ID Устройства</label>
                            <input name="device-id" type="text" class="form-control" value="<?php echo $data['device_id'];?>" maxlength="20"/>
                        </div>
                        <div class="form-group">
                            <label>Заказчик</label>
                            <input name="customer" type="text" class="form-control" value="<?php echo $data['customer_id'];?>" maxlength="50"/>
                        </div>
                        <div class="form-group">
                            <label>Организация</label>
                            <input name="organisation" type="text" class="form-control" value="<?php echo $data['organisation'];?>" maxlength="50"/>
                        </div>

                        <?php }?>

                        <div class="form-group">
                            <label>Дата установки</label>
                            <input name="installation-date" type="text" class="form-control" value="<?php echo $data['installation_date'];?>" maxlength="50"/>
                        </div>
                        <p class="text-primary">Адрес установки</p>
                        <div class="form-group">
                            <label>Город</label>
                            <input name="installation-city" type="text" class="form-control" value="<?php echo $data['installation_city'];?>" maxlength="100"/>
                        </div>
                        <div class="form-group">
                            <label>Улица</label>
                            <input name="installation-street" type="text" class="form-control" value="<?php echo $data['installation_street'];?>" maxlength="100"/>
                        </div>
                        <div class="form-group">
                            <label>Дом</label>
                            <input name="installation-house-number" type="text" class="form-control" value="<?php echo $data['installation_house_number'];?>" maxlength="100"/>
                        </div>
                        </br>
                        </br>
                        <div class="form-group">
                            <label>Инвентарный номер</label>
                            <input name="inventory-number" type="text" class="form-control" value="<?php echo $data['inventory_number'];?>" maxlength="30"/>
                        </div>
                        <div class="form-group">
                            <label>Установщик</label>
                            <input name="installer-name" type="text" class="form-control" value="<?php echo $data['installer_name'];?>" maxlength="50"/>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Сохранить</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>