<?php
namespace  models;
use components\Db;
class Products
{
    public static function getProductItemByID($id)
    {
        $id = intval($id);
            $db = Db::getConnection();
            $result = $db->query('SELECT * FROM news WHERE id=' . $id);

            $result->setFetchMode(\PDO::FETCH_ASSOC);

            $newsItem = $result->fetch();

            return $newsItem;
        }


    public static function getProductList() {
        $db = Db::getConnection();
        $result = $db->query('SELECT products.`id`, products.`name` as `product_name`, `unit_value`, `units`.`name`, `change_price`.`price_in_time`  FROM `products`
                              INNER JOIN `units` on units.id_units = products.unit_id 
                              INNER JOIN `change_price` on change_price.product_id = products.id;');

        return $result;
    }


    public static function   getProductForPurchase($id_purchases) {

        $sql = 'SELECT products.`id`, products.`name` as `product_name`, `unit_value`, `units`.`name`, `change_price`.`price_in_time`, `stucture_purchases`.`product_id`  FROM `products`
                              right outer join `stucture_purchases` on `stucture_purchases`.`product_id`=products.`id` 
                              INNER JOIN `units` on units.id_units = products.unit_id 
                              INNER JOIN `change_price` on change_price.product_id = products.id
                               WHERE `stucture_purchases`.`purshases_id` = :id_purchases
                          ;';

        return DB::queryExecuteToArray($sql, array(
            ':id_purchases'=>[ 'value'=>$id_purchases, 'type'=>'int'],
        ));
    }
}