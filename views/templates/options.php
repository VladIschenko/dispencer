
<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/viewStats">
    <fieldset>

        <legend>Выберите дату и id устройства</legend>

        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Период</label>
            <div class="col-md-4">
                <input id="textinput" name="start_date" type="text" placeholder="Дата начала" class="form-control input-md datepicker-here" required="">
        </div>
            </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput"></label>
            <div class="col-md-4">
                <input id="textinput" name="end_date" type="text" placeholder="Дата конца" class="form-control input-md datepicker-here" required="">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="selectbasic">ID устройства</label>
            <div class="col-md-4">
                <select id="selectbasic" name="device_id" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton"></label>
            <div class="col-md-4">
                <button id="singlebutton"  name="send_options" class="btn btn-primary">Отправить</button>
            </div>
        </div>

    </fieldset>
</form>

