
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Налаштування для облікового запису: "<?=$model['userName']?>"</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <?php if (isset($model['message'])):?>
            <div class="alert alert-warning">
                <strong>Увага!</strong>  <?=$model['message']?>
            </div>
            <?php endif;?>

            <div class="panel panel-default">
                <div class="panel-heading">
                   Налаштування
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <form method="post" role="form" action="/setting">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Старий пароль" name="old_password" type="password"  required>
                            </div>

                            <div class="form-group">
                                <input class="form-control" placeholder="Новий пароль" name="new_password" type="password"  required>
                            </div>

                            <div class="form-group">
                                <input class="form-control" placeholder="Повторіть новий пароль" name="repit_new_password" type="password"  required>
                            </div>

                            <!-- Change this to a button or input when using this as a form -->
                            <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="Змінити">
                        </fieldset>
                    </form>

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
