<div style="margin-left:23%;">
    <div class="container">
        <div class="col-md-5">
        <div class="panel-heading">
            <h2>Добавить пользователя</h2>
        </div>
        <div class="panel-body">
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
</div>
</div>
</div>