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
                            <td><?php echo $data['installation_date']; ?></td>
                        </tr>
                        <tr>
                            <td>Координаты</td>
                            <td><?php echo $data['gps']; ?></td>
                        </tr>
                        <tr>
                            <td>Инвентарный номер</td>
                            <td><?php echo $data['inventory_number']; ?></td>
                        </tr>
                        <tr>
                            <td>Установщик</td>
                            <td><?php echo $data['installer_name']; ?></td>
                        </tr>
                        </tbody>
                    </table>
                    <a href="/edit/<?php echo $data['id']; ?>" class="btn btn-primary margin-left"><span class="glyphicon glyphicon-edit"></span>Редактировать</a>
                    <a href="user/<?php echo $data['id']; ?>" class="btn btn-danger margin-left"><span class="glyphicon glyphicon-remove"></span>Удалить</a>
                    <a href="user/<?php echo $data['id']; ?>" class="btn btn-success margin-left"><span class="glyphicon glyphicon-remove"></span>Обновить прошивку</a>
                </div>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>