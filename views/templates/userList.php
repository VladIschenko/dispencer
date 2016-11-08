<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Пользователи</h1>
    </div>
    <!-- end  page header -->
    <div class="pull-left">
        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/control/userlist/search">
            <table class="table">
                <tbody>
                <tr>
                    <td>
                        <input name="search" id="search" type="text" class="form-control" placeholder="..."/>
                    </td>
                    <td>
                        <button class="btn btn-primary" type="submit">Поиск</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
    <div class="pull-left">
        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/control/device/search">
            <table class="table">
                <tbody>
                <tr>
                    <td>
                        <a href="/add-user" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>Добавить пользователя</a>
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
            <i class="fa fa-bar-chart-o fa-fw"></i>Пользователи
            <div class="pull-left">
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                        Тип пользователя
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li><a href="/control/userlist">Все</a>
                        </li>
                        <li><a href="/userlist/type/god">god</a>
                        </li>
                        <li><a href="/userlist/type/superadmin">superadmin</a>
                        </li>
                        <li><a href="/userlist/type/admin">admin</a>
                        </li>
                        <li><a href="/userlist/type/technician">technician</a>
                        </li>
                        <li><a href="/userlist/type/superuser">superuser</a>
                        </li>
                        <li><a href="/userlist/type/user">user</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Действия</th>
                        <th>ID</th>
                        <th>Логин</th>
                        <th>Имя и фамилия</th>
                        <th>Статус</th>
                        <th>Примечания</th>
                        <?php if($_SESSION['type'] == 'god'){ ?>
                            <th>Организация</th>
                        <?php } ?>
                        <th>Телефонный номер</th>
                        <th>Ед.измерения</th>
                        <th>Язык</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $user) { ?>
                        <tr>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-cog"></i>
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="/user/<?php echo $user['id']; ?>"><span class="glyphicon glyphicon-open"></span>Просмотр</a>
                                        </li>
                                        <?php if($_SESSION['type'] == 'god'){ ?>

                                            <li><a href="/edit/<?php echo $user['id']; ?>"><span class="glyphicon glyphicon-edit"></span>Редактировать</a>
                                            </li>
                                            <li><a href="/delete/<?php echo $user['id']; ?>"><span class="glyphicon glyphicon-remove"></span>Удалить</a>
                                            </li>

                                        <?php } ?>


                                    </ul>
                                </div>
                            </td>
                            <td class="id"><?php echo $user['id']; ?></td>
                            <td><?php echo $user['login']; ?></td>
                            <td><?php echo $user['first_name'] . " " . $user['last_name']; ?></td>
                            <td><?php echo $user['group_name'] ?></td>
                            <td><?php echo $user['description']; ?></td>
                            <?php if($_SESSION['type'] == 'god'){ ?>
                                <td><?php echo $user['organisation']; ?></td>
                            <?php } ?>
                            <td><?php echo $user['phone']; ?></td>
                            <td><?php echo $user['measurement']; ?></td>
                            <td><?php echo $user['lang']; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


