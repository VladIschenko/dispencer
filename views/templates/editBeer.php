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
                <h3><?php echo $data['name']; ?></h3>
            </div>
            <div class="panel-body">

                <div class="table-responsive">
                    <form method="POST" action="/beer/update/<?php echo $data['id'];?>">
                        <div class="form-group">
                            <label>Название</label>
                            <input name="name" type="text" class="form-control" value="<?php echo $data['name'];?>" />
                        </div>
                        <div class="form-group">
                            <label>Примечание</label>
                            <input name="description" type="text" class="form-control" value="<?php echo $data['description'];?>" />
                        </div>
                        <div class="form-group">
                            <label>Организация</label>
                            <input name="organisation" type="text" class="form-control" value="<?php echo $data['organisation'];?>" />
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