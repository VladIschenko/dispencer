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
        <div class="panel panel-default zero-padding col-md-8 col-md-offset-2">
            <div class="panel-heading">
                <h3>Выберите период и идентификатор устройства</h3>
            </div>
            <div class="panel-body ">

                <div class="table-responsive">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/processStats">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Дата начала</th>
                            <th>Дата конца</th>
                            <th>Ид устройства</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><input id="textinput" name="start_date" type="text" placeholder="Дата начала" class="form-control input-md datepicker-here" required=""></td>
                            <td><input id="textinput" name="end_date" type="text" placeholder="Дата конца" class="form-control input-md datepicker-here" required=""></td>
                            <td><input id="textinput" name="device_id" type="text" placeholder="ID" class="form-control input-md" value="00-04-a3-69-a9-0b" required=""></td>
                            <td>
                                <button id="singlebutton"  name="send_options" class="btn btn-primary" type="submit">Отправить</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                        </form>
                </div>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>

