<!---->
<!--<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/viewStats">-->
<!--    <fieldset>-->
<!---->
<!--        <legend>Выберите дату и id устройства</legend>-->
<!---->
<!--        <div class="form-group">-->
<!--            <label class="col-md-4 control-label" for="textinput">Период</label>-->
<!--            <div class="col-md-4">-->
<!--                <input id="textinput" name="start_date" type="text" placeholder="Дата начала" class="form-control input-md datepicker-here" required="">-->
<!--        </div>-->
<!--            </div>-->
<!--        <div class="form-group">-->
<!--            <label class="col-md-4 control-label" for="textinput"></label>-->
<!--            <div class="col-md-4">-->
<!--                <input id="textinput" name="end_date" type="text" placeholder="Дата конца" class="form-control input-md datepicker-here" required="">-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        <div class="form-group">-->
<!--            <label class="col-md-4 control-label" for="selectbasic">ID устройства</label>-->
<!--            <div class="col-md-4">-->
<!--                <select id="selectbasic" name="device_id" class="form-control">-->
<!--                    <option value="1">1</option>-->
<!--                    <option value="2">2</option>-->
<!--                    <option value="3">3</option>-->
<!--                </select>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        <div class="form-group">-->
<!--            <label class="col-md-4 control-label" for="singlebutton"></label>-->
<!--            <div class="col-md-4">-->
<!--                <button id="singlebutton"  name="send_options" class="btn btn-primary">Отправить</button>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--    </fieldset>-->
<!--</form>-->

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
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/viewStats">
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
                            <td>
                                <select id="selectbasic" name="device_id" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </td>
                            <td>
                                <button id="singlebutton"  name="send_options" class="btn btn-primary" type="submit">Отправить</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                        </
                </div>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>