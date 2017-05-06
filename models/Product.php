<?php



class Product
{

    /** Returns single news items with specified id
     * @rapam integer &id
     */

    public static function getProductItemByID($id)
    {
        $id = intval($id);
            $db = SingleDb::getConnection();
            $result = $db->query('SELECT * FROM news WHERE id=' . $id);

            /*$result->setFetchMode(PDO::FETCH_NUM);*/
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $newsItem = $result->fetch();

            return $newsItem;
        }

    /**
     * Returns an array of news items
     */
    public static function getProductList() {

        $db = SingleDb::getConnection();
        $result  = array();
        $result = $db->query('SELECT * FROM `products`;');
        return $result;
    }
}