<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Список пользователей</h1>
    </div>
    <!-- end  page header -->
</div>
<div class="row">
    <div class="col-lg-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
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
                                    <th>Примечания</th>
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
                                        <td><?php echo $user['description']; ?></td>
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
        <!--End Advanced Tables -->
    </div>
</div>

