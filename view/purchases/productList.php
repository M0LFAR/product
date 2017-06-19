<?php
use view\widget\Table;
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Список продуктів</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Інформація про продукти та їх поставки
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                <div class="row">

                    <?php if (isset($model['product'])):?>
                    <?php $tableProduct = new Table($model['product']); ?>

                    <?php $tableProduct->field(['label'=>'Назва', 'key'=>'product_name']);?>

                    <?php $tableProduct->field(['label'=>'Наявно', 'key'=>'unit_value']);?>

                    <?php $tableProduct->field(['label'=>'Вартість', 'key'=>'price_in_time']);?>

                    <?php $tableProduct->field(['label'=>'Дії', 'key'=>'contact_phone']);?>

                    <?php $tableProduct->field(['label'=>'Дії',
                        'key'=>[['key'=>'id', 'value'=>'<a href="/product/edit/{{key}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> '],
                            ['key'=>'id', 'value'=>' <a href="/product/cart/{{key}}"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a> '],
                        ]
                    ]);
                    ;?>
                    <?php  $tableProduct->echo();?>
                <!-- /.panel-body -->
                    <?php  endif;?>

                    <?php if (!isset($model['product'])):?>

                        <h5>Дана поставка не містить поки продуктів!</h5>
                    <?php  endif;?>
                </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
