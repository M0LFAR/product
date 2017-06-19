<?php
use view\widget\Table;
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Поставки</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Перелік поставок
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-4  col-md-offset-4">
                            <a href="/purchases/create/" class="btn btn-lg btn-success btn-block">Відкрити сесію нової поставки </a>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#menu1">Активні сесії поставок</a></li>
                            <li><a data-toggle="tab" href="#menu2">Закриті сесії поставо</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="menu1" class="tab-pane fade in active">
                                <h3>Сесії поставок які зараз обробляються</h3>
                                <?php $tableProduct = new Table($model['openPurchases']);?>

                                <?php $tableProduct->field(['label'=>'Ім`я бази проставки', 'key'=>'base_name']);?>

                                <?php $tableProduct->field(['label'=>'Час початку', 'key'=>'date_start']); ?>

                                <?php $tableProduct->field(['label'=>'Вартість', 'key'=>'summa']);?>


                                <?php $tableProduct->field(['label'=>'Дії',
                                    'key'=>[
                                        ['key'=>'id_purchase', 'value'=>'<a href="/purchases/productList/{{key}}"><i class="fa fa-list-alt" aria-hidden="true"></i></a> '],
                                        ['key'=>'id_purchase', 'value'=>'<a href="/purchases/productList/{{key}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> '],
                                        ['key'=>'id_purchase', 'value'=>' <a href="/purchases/close/{{key}}"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a> '],
                                    ]
                                ]);

                                ;?>

                                <?php  $tableProduct->echo();?>

                            </div>

                            <div id="menu2" class="tab-pane fade">
                                <h3>Сесії які закриті і їхні товари доступні до продаж</h3>
                                <div class="row">
                                    <div class="col-lg-12">
                                <?php $tableProduct = new Table($model['closedPurchases']); ?>

                                <?php $tableProduct->field(['label'=>'Ім`я бази проставки', 'key'=>'base_name']);?>

                                <?php $tableProduct->field(['label'=>'Час початку', 'key'=>'date_start']); ?>

                                <?php $tableProduct->field(['label'=>'Час завершення', 'key'=>'date_finish']); ?>

                                <?php $tableProduct->field(['label'=>'Вартість', 'key'=>'summa']);?>

                                <?php $tableProduct->field(['label'=>'Дії',
                                    'key'=>[
                                        ['key'=>'id_purchase', 'value'=>'<a href="/purchases/productList/{{key}}"><i class="fa fa-list-alt" aria-hidden="true"></i></a> '],
                                        ['key'=>'id_purchase', 'value'=>'<a href="/purchases/productList/{{key}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> '],
                                    ]
                                ]);

                                ;?>
                                <?php  $tableProduct->echo();?>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
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
