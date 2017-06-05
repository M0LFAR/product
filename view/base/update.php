<?php
$batonValue="Редагувати";
$action=$_SERVER[REQUEST_URI];
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Редагувати</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Інформація про базу
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <?php var_dump($model);?>
                    <?php include_once('_form.php');?>
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
