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

            /*$result->setFetchMode(PDO::FETCH_NUM);*/
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $newsItem = $result->fetch();

            return $newsItem;
        }


    public static function getProductList() {

        $db = Db::getConnection();
        $result = $db->query('SELECT products.`id`, products.`name`,`unit_value`, `units`.`name`, `change_price`.`price_in_time`  FROM `products`
                              INNER JOIN `units` on units.id_units = products.unit_id 
                              INNER JOIN `change_price` on change_price.product_id = products.id;');
        return $result;

    }

    public static function getProduct($id){

        $db =Db::getConnection();
        $db->prepare("SELECT `name` FROM `products` WHERE id=:id");
        $db->bindValue(':id', $id, \PDO::PARAM_INT);

        return $db->execute();
    }
}