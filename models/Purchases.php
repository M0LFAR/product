<?php
namespace models;
use components\Db;

class Purchases
{
    /**
     * @param bool $open закриті чи відкриті сесії поставок
     * @return array
     */
    public static function getListPurchases($open=false){

        if ($open)
        $sql='SELECT `base`.name as `base_name`, `purchases`.`date_finish`, `purchases`.`id_purchase`, `purchases`.`date_start`, `purchases`.`summa`  FROM `purchases` INNER JOIN `base` on base.id_base = purchases.base_id WHERE (`purchases`.`date_finish` IS NULL) ORDER BY id_purchase';
        else
        $sql='SELECT `base`.name as `base_name`, `purchases`.`date_finish`, `purchases`.`id_purchase`, `purchases`.`date_start`, `purchases`.`summa`  FROM `purchases` INNER JOIN `base` on base.id_base = purchases.base_id WHERE (`purchases`.`date_finish` IS NOT NULL) ORDER BY id_purchase';

        return DB::queryExecuteToArray($sql);
    }

    public static function open($id_base){
        $sql = 'INSERT INTO `purchases` (`id_purchase`, `base_id`,`date_start`) VALUES (NULL, :idBase, :time_do);';

        return DB::queryExecuteToArray($sql, array(
                ':idBase'=>[ 'value'=>$id_base, 'type'=>'int'],
                ':time_do'=>[ 'value'=>date("Y-m-d H:i:s"), 'type'=>'int'],
            )
        );

    }

    public static function purchasesClose($id){
        $sql='UPDATE purchases SET date_finish=:time_do WHERE id_purchase = :idPurchases;';
        return DB::queryExecuteToArray($sql, array(
                ':idPurchases'=>[ 'value'=>$id, 'type'=>'int'],
                ':time_do'=>[ 'value'=>date("Y-m-d H:i:s"), 'type'=>'int'],
            )
        );
    }

}