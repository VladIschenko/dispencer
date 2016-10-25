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
                <p><a href="/devices/free" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-chevron-left"></span>К свободным устройствам</a></p>
                <h3>06-1a-12-4d-02-0c</h3>
            </div>
            <div class="panel-body ">

                <div class="table-responsive">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <td>ID устройства</td>
                            <td>06-1a-12-4d-02-0c</td>
                        </tr>
                        <tr>
                            <td>Пользователь</td>
                            <td>
                                <select name="sell" size="1" class="form-control">
                                        <option value="">Praha Nova</option>
                                        <option value="">Karat</option>
                                        <option value="">AltBier</option>
                                        <option value="">PivoBank</option>
                                </select>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="alert alert-success">
                        Если нужного пользователя нет в списке, вы можете <a href="/add-user">добавить</a> его.
                        После передачи покупателю станут доступны все данные и настройки устройства.
                    </div>
                    <?php if($_SESSION['type'] == 'god'){ ?>

                        <a href="#" class="btn btn-primary margin-left"><span class="glyphicon glyphicon-edit"></span>Подтвердить передачу</a>

                    <?php } ?>

                </div>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>