<?php
use view\widget\Table;
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Здійснення покупки</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Каса
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <?php $tableProduct = new Table($model['product']->fetchAll()); ?>

                    <?php $tableProduct->field(['label'=>'Назва', 'key'=>'product_name']);?>

                    <?php $tableProduct->field(['label'=>'Наявно', 'key'=>'unit_value']);?>

                    <?php $tableProduct->field(['label'=>'Вартість', 'key'=>'price_in_time']);?>

                    <?php $tableProduct->field(['label'=>'Кількість', 'key'=>'contact_phone', 'value'=>'<input id="number" placeholder="кількість" type="number" value="1" min="1" max="12">']);?>

                    <?php $tableProduct->field(['label'=>'Дії',
                            'key'=>[['key'=>'id', 'value'=>'<a href="/product/edit/{{key}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> '],
                                ['key'=>'id', 'value'=>' <a href="/product/cart/{{key}}"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a> '],
                            ]
                        ]);
                    ;?>

                    <?php  $tableProduct->echo();?>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>


        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Чек
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6  col-md-offset-3">
                            <a href="/cassa/close/" class="btn btn-lg btn-success btn-block">Закрити чек</a>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-12">
                    <?php $tableProduct = new Table($model['cart']->fetchAll()); ?>

                    <?php $tableProduct->field(['label'=>'Назва продукта', 'key'=>'product_name']);?>

                    <?php $tableProduct->field(['label'=>'Кількість', 'key'=>'unit_value']);?>

                    <?php $tableProduct->field(['label'=>'Вартість', 'key'=>'price_in_time']);?>

                    <?php $tableProduct->field(['label'=>'Дії',
                        'key'=>[['key'=>'id', 'value'=>'<a href="/product/edit/{{key}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> '],
                            ['key'=>'id', 'value'=>' <a href="/cassa/back/{{key}}"><i class="fa fa-reply" aria-hidden="true"></i></a> '],
                        ]
                    ]);
                    ;?>

                    <?php  $tableProduct->echo();?>
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
