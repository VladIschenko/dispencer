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
                <h3>Добавить пользователя</h3>
            </div>
            <div class="panel-body ">

                <div class="table-responsive">
                                <form method="POST" action="/save-user">
                                    <div class="form-group">
                                        <label>Логин</label>
                                        <input name="login" type="text" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Пароль</label>
                                        <input name="password" type="password" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Повторите пароль</label>
                                        <input name="repeat_password" type="password" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Тип пользователя</label>
                                        <select name="group" size="1" class="form-control">
                                            <option selected="selected">god</option>
                                            <option>superadmin</option>
                                            <option>admin</option>
                                            <option>technician</option>
                                            <option>superuser</option>
                                            <option>user</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Электронный адрес</label>
                                        <input name="email" type="text" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Имя</label>
                                        <input name="firstname" type="text" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Фамилия</label>
                                        <input name="lastname" type="text" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Описание</label>
                                        <input name="description" type="text" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Организация</label>
                                        <input name="organisation" type="text" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Телефон</label>
                                        <input name="phone" type="text" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Единицы измерения</label>
                                        <select name="measurement" size="1" class="form-control">
                                            <option selected="selected">liter</option>
                                            <option>ounce</option>
                                            <option>pint</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Язык</label>
                                        <select name="lang" size="1" class="form-control">
                                            <option selected="selected">ru</option>
                                            <option>en</option>
                                        </select>
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