<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Список устройств</h1>
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
                <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/control/devices">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>
                                <select name="device-type" size="1" class="form-control">
                                    <option selected="selected">Установленные</option>
                                    <option>Свободные</option>
                                    <option>Проданные</option>
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
                <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/control/devices">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>
                                <select name="device-organisation" size="1" class="form-control">
                                    <?php foreach ($data as $organisation) { ?>
                                    <option value="<?php echo $organisation['organisation'] ?>"><?php echo $organisation['organisation'] ?></option>
                                    <?php } ?>
                                </select>
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
                <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/control/device/search">
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