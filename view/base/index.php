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
                <div class="row">
                    <div class="col-lg-4  col-md-offset-4">
                        <a href="/base/create/" class="btn btn-lg btn-success btn-block">Добавити нову базу</a>
                    </div>
                </div>
                    <div class="col-lg-12" style="margin-top: 20px;">
                    <?php $tableProduct = new Table($model); ?>



                    <?php $tableProduct->field(['label'=>'Адрес', 'key'=>'address']);?>

                    <?php $tableProduct->field(['label'=>'Найменування бази', 'key'=>'name']);?>

                    <?php $tableProduct->field(['label'=>'Телефон директора', 'key'=>'directory_phone']);?>

                    <?php $tableProduct->field(['label'=>'Контактний телефон', 'key'=>'contact_phone']);?>

                    <?php $tableProduct->field(['label'=>'Дії',
                                                'key'=>[['key'=>'id_base', 'value'=>'<a href="/base/edit/{{key}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> '],
                                                        ['key'=>'id_base', 'value'=>'<a href="/base/delete/{{key}}"><i class="delete fa fa-trash-o" aria-hidden="true"></i></a> '],
                                                ]
                                                ]);

                    ;?>

                    <?php  $tableProduct->echo();?>
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
