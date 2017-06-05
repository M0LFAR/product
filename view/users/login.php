<div class="container">
    <div class="row">

        <div class="col-md-4 col-md-offset-4 login-panel-1 label-home">

            <span class="glyphicon glyphicon-apple grean"></span>
            <h1 class="grean " style="font-family: times, serif; font-size:34pt; font-style:italic;">Продуктовий магазин</h1>
            <h5>Використані технології mysql, php, bootstrap</h5>
        </div>
        <div class="col-md-4 col-md-offset-4">

            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Будь ласка, авторизуйтесь</h3>
                </div>
                <div class="panel-body">
                    <form method="post" role="form" action="/login/">
                        <fieldset>
                            <div class="form-group">
                                <select class="form-control " name="idUser">
                                    <?php foreach($model['usersList'] as $user ):?>
                                    <option value="<?=$user['id']?>"><?=$user['name']?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Пароль" name="password" type="password" value="" required>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Запам'ятати мене">
                                    Запам'ятати мене
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <input type="submit" name="submit"  class="btn btn-lg btn-success btn-block" value="Вхід">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <p class="pull-left">© ЧНУ 2017</p>
    </div>
</footer>