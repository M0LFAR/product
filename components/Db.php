<?php
namespace  components;
class Db
{
    public static function getConnection()
    {
        $params = include(ROOT . '/config/db_params.php');
        $ver = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new \PDO($ver, $params['user'], $params['password']);
        $db->exec("set names utf8");
        return $db;
    }


    /*
     * @function  - призначена для виконня sql запиту і поверннея факту вдалого виконання
     *
     * @$query  - sql запит
     *
     * @return - boolean
     *
     */
    public static function queryExecute($query){
        $db = self::getConnection();
        $queryResult = $db->query($query);
        $result = $db->prepare($queryResult);

        return $result->execute();

    }


    /*
     * @function  - призначена для виконня sql запиту і поверннея резульатата виконання
     *
     * @$query  - sql запит
     *
     * @$first - якщо значення true повертає перше значення, якщо false масив, по замовчування масив
     *
     * @$assoc - якщо значення true, повертаємо асоціативний масив, інакше нумерований !ВАЖЛИВО не враховується при виводі одного занчення
     *
     *
     * @return [mixed] - повертає функція одине чи набір значень у вигляді масиву для вхідного SQL запиту
     */
    public static function queryReturn($query, bool $first=false, bool $assoc=true){
        $db = self::getConnection();

        $result = $db->query($query);


        $fetchMod = $assoc ? \PDO::FETCH_ASSOC : \PDO::FETCH_NUM;
        $result->setFetchMode($fetchMod);
        $result = $result->fetchAll();

        return $first ? self::recursArrayShift($result) : $result;

    }

    public static function recursArrayShift($params){
        if (is_array($params))
            return self::recursArrayShift(array_shift($params));
        else
            return $params;
    }
}