<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Сорта пива</h1>
    </div>
    <!-- end  page header -->
    <div class="pull-left">
        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="">
            <table class="table">
                <tbody>
                <tr>
                    <td>
                        <input name="search" type="text" class="form-control" placeholder="..."/>
                    </td>
                    <td>
                        <button id="singlebutton"  name="send_search" class="btn btn-primary" type="submit">Поиск</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
    <div class="pull-left">
        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="">
            <table class="table">
                <tbody>
                <tr>
                    <td>
                        <a href="/beer/add" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>Добавить сорт</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>

<div class="row">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <i class="fa fa-bar-chart-o fa-fw"></i>Список сортов
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Действия</th>
                        <th>Название</th>
                        <th>Описание</th>
                        <?php if($_SESSION['type'] == 'god'){ ?>
                            <th>Организация</th>
                        <?php } ?>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $beer) { ?>
                        <tr>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-cog"></i>
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="/beer/edit/<?php echo $beer['id']; ?>"><span class="glyphicon glyphicon-edit"></span>Редактировать</a>
                                        </li>
                                        <li><a href="/beer/delete/<?php echo $beer['id']; ?>"><span class="glyphicon glyphicon-remove"></span>Удалить</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <td class="id"><?php echo $beer['name']; ?></td>
                            <td><?php echo $beer['description']; ?></td>
                            <?php if($_SESSION['type'] == 'god'){ ?>
                                <td><?php echo $beer['organisation']; ?></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>