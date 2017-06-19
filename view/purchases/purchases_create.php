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
                    Вибиріть базу з якої здійснюється постака
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <form method="post" role="form" action="/purchases/create/">
                        <fieldset>
                            <div class="form-group">
                                <select class="form-control " name="id_base">
                                    <?php foreach($model as $base ):?>
                                        <option value="<?=$base['id_base']?>"><?=$base['name']?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <input type="submit" name="submit"  class="btn btn-lg btn-success btn-block" value="Відкрити поставку">
                        </fieldset>
                    </form>
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