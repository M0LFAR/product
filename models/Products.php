<?php


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
        $result  = array();
        $result = $db->query('SELECT * FROM `products`;');
        return $result;
    }
}