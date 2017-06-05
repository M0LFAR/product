<?php
use view\widget\Table;
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Продукти</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Перелік продукції
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>
                                Назва
                            </th>
                            <th>
                                Наявно
                            </th>
                            <th>
                                Вартість
                            </th>
                            <th>
                                Дії
                            </th>
                        </tr>
                        </thead>
                    <tbody>
                        <?php
                        foreach ($model->fetchAll() as $row):?>
                        <tr class="odd gradeX">
                            <td class="center">
                                <?=$row['1'];?>
                            </td>
                            <td class="center">
                                <?=$row['unit_value'].' '.$row['name'];?>
                            </td>
                            <td class="center">
                                <?=$row['price_in_time'].'грн за 1/'.$row['name'];?>
                            </td>
                            <td class="center">
                                <a href="/product/edit/<?=$row['id']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                <a href="/product/cart/<?=$row['id']?>"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a>

                                <a href="/product/view/<?=$row['id']?>"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    </tbody>
                        <?php endforeach;?>
                    </table>
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
