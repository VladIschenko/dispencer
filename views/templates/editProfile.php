<div class="container">
    <div class="col-md-5">
        <div class="panel-heading">
            <a href="/userlist" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-chevron-left"></span>К списку пользователей</a>
            <h2>Редактировать</h2>
        </div>
        <div class="panel-body">
            <form method="POST" action="/save-edit/<?php echo $data['id'];?>">
                <div class="form-group">
                    <label>Логин</label>
                    <input name="login" type="text" class="form-control" value="<?php echo $data['login'];?>" />
                </div>
                <div class="form-group">
                    <label>Электронный адрес</label>
                    <input name="email" type="text" class="form-control" value="<?php echo $data['email'];?>" />
                </div>
                <div class="form-group">
                    <label>Имя</label>
                    <input name="firstname" type="text" class="form-control" value="<?php echo $data['first_name'];?>" />
                </div>
                <div class="form-group">
                    <label>Фамилия</label>
                    <input name="lastname" type="text" class="form-control" value="<?php echo $data['last_name'];?>"/>
                </div>
                <div class="form-group">
                    <label>Описание</label>
                    <input name="description" type="text" class="form-control" value="<?php echo $data['description'];?>"/>
                </div>
                <div class="form-group">
                    <label>Телефон</label>
                    <input name="phone" type="text" class="form-control" value="<?php echo $data['phone'];?>"/>
                </div>
                <div class="form-group">
                    <label>Единицы измерения</label>
                    <select name="measurement" size="1" class="form-control" >
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
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Сохранить</button>
                </div>
            </form>
        </div>
    </div>