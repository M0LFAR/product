<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Повідомлення</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Повідомлення для відправки
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form action="/messages/" method="post">
                    <div class="form-group">
                        <label for="message"class="h4 ">Повідомлення</label>
                        <textarea name="message" class="form-control" rows="5" placeholder="Введіть своє повідомлення для відправки" required></textarea>
                    </div>
                    <input type="submit" name="submit" class="btnbtn-success btn-lg pull-right" value="Відправити ">
                    <div id="msgSubmit" class="h3 text-center hidden">Повідомлення відправлено!</div>
                    </form>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->

        <div class="panel panel-default">
            <div class="panel-heading">
                Перелік повідомлень
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">

                <?php
                $iconForUser=[
                        '1'=>'success',
                        '2'=>'info',
                        '3'=>'warning'
                ];

                foreach ($model as $message):?>

                    <div class="alert alert-<?=$iconForUser[$message['user_id']]?>">
                        <strong><?=\models\Users::getNameForUser($message['user_id']);?></strong> <?=$message['content']?> <p><?=date('h:m d/m/y', $message['date'])?><p>
                    </div>

                <?php endforeach;?>

            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>

    </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
