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
                <h3>Отправить смс</h3>
            </div>
            <div class="panel-body ">

                <div class="table-responsive">
                    <form method="POST" action="/test">
                        <div class="form-group">
                            <label>Текст сообщения</label>
                            <input name="message" type="text" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Сорт</label>
                            <input name="sort" type="text" class="form-control" />
                        </div>
                        <div class="form-group">
                            <button class="btn btn-lg btn-primary btn-block" type="submit" onclick="alert('Отправлено')">Отправить</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>