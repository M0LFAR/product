<?php
use view\widget\Table;
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Торгові бази</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Перелік баз
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <?php $tableProduct = new Table(); var_dump($model);?>

                    <?php $tableProduct->field(['label'=>'Найменування продукта',  'value'=>$model->fetchAll()]);?>

                    <?php $tableProduct->field(['label'=>'Ціна',  'value'=>$model->fetchAll(PDO::FETCH_COLUMN, 1)]);?>

                    <?php $tableProduct->field(['label'=>'', 'type'=>'button', 'icon'=>'','value'=>'product/'.$model->fetchAll(PDO::FETCH_COLUMN, 0),]);?>

                    <?php $tableProduct->field(['label'=>'Дії', 'type'=>'href', 'icon'=>'fa fa-pencil-square-o', 'value'=>'']);?>

                    <?php  $tableProduct->echo();?>
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
