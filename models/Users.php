<?php

class Users
{

    public static function getUsersList()
    {
        $db = Db::getConnection();
        $usersList = $db->query('CALL `GET_USERS_LIST`();');
        $usersList ->setFetchMode(PDO::FETCH_ASSOC);

        return $usersList;
    }

    public static function validationPassword($idUser, $password)
    {
        $db = Db::getConnection();

        $query = "SELECT IS_VALID_PASSWORD($idUser, '$password');";
        $resultValidation = $db->query($query);
        $resultValidation ->setFetchMode(PDO::FETCH_ORI_FIRST);


        if(current($resultValidation->fetch())) {
            $hash = md5(self::generateCode(10));

            $query = $db->query("CALL `SET_HASH`($idUser, '$hash');");
            setcookie("id", $idUser, time() + 60 * 60 * 24 * 30);
            setcookie("hash", $hash, time() + 60 * 60 * 24 * 30);

            return true;
        }

        return false;
    }




/*
 * isLogin() повертає значення чи авторизований користувач
 *
 * @return boolean
 */

    public static  function isLogin()
    {
        $db = Db::getConnection();
        // $result = $db->query('CALL ');
        //$usersList =  $result->setFetchMode(PDO::FETCH_ASSOC)->fetch();

        return false;
    }











    static function generateCode($length=6) {

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";

        $code = "";

        $clen = strlen($chars) - 1;
        while (strlen($code) < $length) {

            $code .= $chars[mt_rand(0,$clen)];
        }

        return $code;

    }
}