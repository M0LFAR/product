<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>mysql</title>

    <link rel="stylesheet" href="/web/css/main.css">
    <!-- Bootstrap Core CSS -->
    <link href="/web/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/web/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/web/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/web/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
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
                    <form method="post" role="form">
                        <fieldset>
                            <div class="form-group">
                                <select class="form-control " name="permision">
                                    <option>Адміністратор</option>
                                    <option>Складовщик</option>
                                    <option>Касир</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Пароль" name="password" type="password" value="">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Запам'ятати мене">
                                    Запам'ятати мене
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <input type="button" href="index.html" class="btn btn-lg btn-success btn-block" value="Вхід">
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

        <p class="pull-right">"Комп'ютерні науки"</p>
    </div>
</footer>


<!-- jQuery -->
<script src="/web/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/web/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="/web/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="/web/dist/js/sb-admin-2.js"></script>

</body>

</html>
