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
                <p><a href="/beerlist" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-chevron-left"></span>К списку сортов</a></p>
                <h3>Добавить сорт пива</h3>
            </div>
            <div class="panel-body ">

                <div class="table-responsive">
                    <form method="POST" action="/beer/save">
                        <div class="form-group">
                            <label>Название</label>
                            <input name="name" type="text" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Примечание</label>
                            <input name="description" type="text" class="form-control" />
                        </div>
                        <?php if($_SESSION['type'] == 'god'){ ?>
                        <div class="form-group">
                            <label>Организация</label>
                            <input name="organisation" type="text" class="form-control" />
                        </div>
                        <?php } ?>
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