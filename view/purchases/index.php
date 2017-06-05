<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">

            <?php $tableProduct=new \view\widget\Table();?>

            <?php $tableProduct->field(['label'=>'Ціна',  'value'=>$model->fetchAll(PDO::FETCH_COLUMN, 1)]);?>

            <?php $tableProduct->field(['label'=>'Кількість', 'type'=>'button', 'icon'=>'','value'=>'product/'.$model->fetchAll(PDO::FETCH_COLUMN, 0),]);?>

            <?php $tableProduct->field(['label'=>'Значення кількості', 'type'=>'href', 'icon'=>'fa fa-pencil-square-o', 'value'=>'']);?>

            <?php $tableProduct->field(['label'=>'Дії', 'type'=>'href', 'icon'=>'fa fa-pencil-square-o', 'value'=>'']);?>
            </div>
        </div>
    </div>
</div>