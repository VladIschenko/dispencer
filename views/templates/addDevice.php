<div class="row" xmlns="http://www.w3.org/1999/html">
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
                <h3>Добавить устройство</h3>
            </div>
            <div class="panel-body ">

                <div class="table-responsive">
                    <form method="POST" action="/control/devices/save">
                        <div class="alert alert-success">
                            <div class="form-group">
                                <label>ID Устройства</label>
                                <input name="device-id" type="text" class="form-control" />
                            </div>
                            <em>Для добавления устройства достаточно только ID, остальные пункты не обязательны и могут быть добавлены позднее</em>
                        </div>
                        <div class="form-group">
                            <label>Организация</label>
                            <input name="organisation" type="text" class="form-control" maxlength="25"/>
                        </div>
                        <div class="form-group">
                            <label>Дата установки</label>
                            <input name="installation-date" value="" class="datepickerTimeField form-control" maxlength="25">
                        </div>
                        <p class="text-primary">Адрес установки</p>
                        <div class="form-group">
                            <label>Город</label>
                            <input name="installation-city" type="text" class="form-control" maxlength="100"/>
                        </div>
                        <div class="form-group">
                            <label>Улица</label>
                            <input name="installation-street" type="text" class="form-control" maxlength="100"/>
                        </div>
                        <div class="form-group">
                            <label>Дом</label>
                            <input name="installation-house-number" type="text" class="form-control" maxlength="100"/>
                        </div>
                        </br>
                        </br>
                        <div class="form-group">
                            <label>Инвентарный номер</label>
                            <input name="inventory-number" type="text" class="form-control" maxlength="30"/>
                        </div>
                        <div class="form-group">
                            <label>Установщик устройства</label>
                            <input name="installer-name" type="text" class="form-control" maxlength="25"/>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Добавить</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>