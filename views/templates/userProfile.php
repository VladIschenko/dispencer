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
                <p><a href="/userlist" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-chevron-left"></span>К списку пользователей</a></p>
                <h3><?php echo $data['login']; ?></h3>
            </div>
            <div class="panel-body ">

                <div class="table-responsive">
                    <p>Информация о пользователе</p>
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <td>Логин</td>
                            <td><?php echo $data['login']; ?></td>
                        </tr>
                        <tr>
                            <td>Статус</td>
                            <td><?php echo $data['role']; ?></td>
                        </tr>
                        <tr>
                            <td>Дата регистрации</td>
                            <td><?php echo $data['created_at']; ?></td>
                        </tr>
                        <tr>
                            <td>Электронный адрес</td>
                            <td><?php echo $data['email']; ?></td>
                        </tr>
                        <tr>
                            <td>Имя и фамилия</td>
                            <td><?php echo $data['first_name'] . " " . $data['last_name']; ?></td>
                        </tr>
                        <tr>
                            <td>Примечание</td>
                            <td><?php echo $data['description']; ?></td>
                        </tr>
                        <tr>
                            <td>Телефонный номер</td>
                            <td><?php echo $data['phone']; ?></td>
                        </tr>
                        <tr>
                            <td>Единицы измерения</td>
                            <td><?php echo $data['measurement']; ?></td>
                        </tr>
                        <tr>
                            <td>Язык</td>
                            <td><?php echo $data['lang']; ?></td>
                        </tr>
                        </tbody>
                    </table>
                    <a href="/edit/<?php echo $data['id']; ?>" class="btn btn-primary margin-left"><span class="glyphicon glyphicon-edit"></span>Редактировать</a>
                    <a href="user/<?php echo $user['id']; ?>" class="btn btn-danger margin-left"><span class="glyphicon glyphicon-remove"></span>Удалить</a>
                </div>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>