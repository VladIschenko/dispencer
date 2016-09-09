<div class="container error">
    <div class="row">
        <div class="span12">
            <div class="hero-unit center">
                <h1>Вы не авторизованы! <small><font face="Tahoma" color="red">Error 401</font></small></h1>
                <br />
                <p>Для совершения выбранного действия вы должны войти на сайт как пользователь</p>
                <a href="/" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> Войти</a>
            </div>
        </div>
    </div>
</div>

<?php header("HTTP/1.0 401 Unauthorized"); ?>