<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Список пользователей</h1>
    </div>
    <!-- end  page header -->
</div>


<div class="row">
    <!--Default Pannel, Primary Panel And Success Panel   -->
    <div class="col-lg-4">
        <div class="panel panel-info">
            <div class="panel-heading">
                По типу
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/control/userlist/type">
                    <table class="table col-lg-10">
                        <tbody>
                        <tr>
                            <td>
                                <select name="user-type" size="1" class="form-control">
                                    <option selected="selected">Все</option>
                                    <option>god</option>
                                    <option>superadmin</option>
                                    <option>admin</option>
                                    <option>technician</option>
                                    <option>superuser</option>
                                    <option>user</option>
                                </select>
                            </td>

                            <td>
                                <button id="singlebutton"  name="send_type" class="btn btn-primary" type="submit">Выбрать</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel panel-info">
            <div class="panel-heading">
                По названию организации
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/control/userlist/organisation">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>
                                <input name="organisation" type="text" class="form-control" />
                            </td>

                            <td>
                                <button id="singlebutton"  name="send_organisation" class="btn btn-primary" type="submit">Выбрать</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel panel-info">
            <div class="panel-heading">
                Поиск по базе
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/control/userlist/search">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>
                                <input name="search" type="text" class="form-control" />
                            </td>
                            <td>
                                <button id="singlebutton"  name="send_search" class="btn btn-primary" type="submit">Выбрать</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <!--End Default Pannel, Primary Panel And Success Panel   -->
</div>


<div class="row">
        <!-- Advanced Tables -->
        <div class="panel panel-default  zero-padding col-lg-12">
            <div class="panel-heading">
                Пользователи
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
                                    <th>Организация</th>
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
                                                    <li><a href="/edit/<?php echo $user['id']; ?>"><span class="glyphicon glyphicon-edit"></span>Редактировать</a>
                                                    </li>
                                                    <li><a href="/delete/<?php echo $user['id']; ?>"><span class="glyphicon glyphicon-remove"></span>Удалить</a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </td>
                                        <td class="id"><?php echo $user['id']; ?></td>
                                        <td><?php echo $user['login']; ?></td>
                                        <td><?php echo $user['first_name'] . " " . $user['last_name']; ?></td>
                                        <td><?php echo $user['group_name'] ?></td>
                                        <td><?php echo $user['description']; ?></td>
                                        <td><?php echo $user['organisation']; ?></td>
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
        <!--End Advanced Tables -->

