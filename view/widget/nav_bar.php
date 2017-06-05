  <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand home-label" href="/">
                <span class="glyphicon glyphicon-apple"></span>
                <h1 class="label grean" >Продуктовий магазин</h1>
            </a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    <?php
                    $listMessageClean = \models\Users::getListMessages(3);
                    foreach ($listMessageClean as $message):?>
                        <li>
                            <a href="#">
                                <div>
                                    <strong><?=\models\Users::getNameForUser($message['user_id']);?></strong>
                                    <span class="pull-right text-muted">
                                        <em><?=date('h:m d/m/y', $message['date'])?></em>
                                    </span>
                                </div>
                                <div><?=$message['content']?></div>
                            </a>
                        </li>
                    <?php endforeach;
                    unset($listMessageClean);
                    ?>

                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="/messages/">
                            <strong>Читати всі повідомлення</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-messages -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> Налаштування профіля</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Доступ</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="/logout/"><i class="fa fa-sign-out fa-fw"></i> Вихід</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>

<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Пошук...">
                    <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="/cassa/"><i class="fa fa-table fa-fw"></i> Каса</a>
            </li>
            <li>
                <a href="/statistic"><i class="fa fa-bar-chart-o fa-fw"></i> Статистика</a>
            </li>
            <li>
                <a href="forms.html"><i class="fa fa-archive fa-fw"></i> Продукти</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-shopping-basket"></i> Продажі<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#"><i class="fa fa-ticket"></i> Чеки</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-shopping-basket"></i> Продана продукція</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-truck"></i> Поставка<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#"><i class="fa fa-clipboard"></i> Список поставок</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-file-o"></i> Відкриті сесії</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-file"></i> Закриті сесії</a>
                    </li>
                    <li>
                        <a href="/base/"><i class="fa fa-user" aria-hidden="true"></i> Поставщики</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
             <li>
                <a href="/messages/"><i class="fa fa-envelope fa-fw"></i> Повідомлення</a>
            </li>
               <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Акаунт<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> Налаштування профіля</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Доступ</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="/logout/"><i class="fa fa-sign-out fa-fw"></i> Вихід</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
         
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>