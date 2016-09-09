
<h3>Список пользователей</h3>
<table class="table table-hover userlist">
    <thead>
    <tr>
        <th>ID</th>
        <th>Логин</th>
        <th>Имя и фамилия</th>
        <th>Примечания</th>
        <th>Телефонный номер</th>
        <th>Ед.измерения</th>
        <th>Язык</th>
        <th></th>
        <th>Действия</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $user) { ?>
        <tr>
            <td class="id"><?php echo $user['id']; ?></td>
            <td><?php echo $user['login']; ?></td>
            <td><?php echo $user['first_name'] . " " . $user['last_name']; ?></td>
            <td><?php echo $user['description']; ?></td>
            <td><?php echo $user['phone']; ?></td>
            <td><?php echo $user['measurement']; ?></td>
            <td><?php echo $user['lang']; ?></td>
            <td>
                <a href="/user/<?php echo $user['id']; ?>" class="btn btn-sm btn-default margin-left"><span class="glyphicon glyphicon-eye-open"></span>Просмотр</a>
            </td>
            <td>
                <a href="/edit/<?php echo $user['id']; ?>" class="btn btn-sm btn-primary margin-left"><span class="glyphicon glyphicon-edit"></span>Редактировать</a>
            </td>
            <td>
                <a href="/delete/<?php echo $user['id']; ?>" class="btn btn-sm btn-danger margin-left"><span class="glyphicon glyphicon-remove"></span>Удалить</a>
            </td>

        </tr>
    <?php } ?>
    </tbody>
</table>