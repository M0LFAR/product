<?php
namespace models;
use  components\Db;
class Users
{

    const ADMIN_ROLE_ID = 1;
    const STORAGE_ROLE_ID = 2;
    const TELLER_ROLE_ID = 3;



    public static function validationPassword($idUser, $password)
    {
        $query = "SELECT IS_VALID_PASSWORD($idUser, '$password');";
        $validPassword = Db::queryReturn($query, true);




        if($validPassword) {

            $hash = md5(self::generateCode(10));
            $role = self::getRoleById($idUser);

            setcookie("id", $idUser, time() + 60 * 60 * 24 * 30, "/");
            setcookie("role", $role, time() + 60 * 60 * 24 * 30, "/");
            $cookieSetHash = setcookie("hash", $hash, time() + 60 * 60 * 24 * 30, "/");

            session_start();
            $_SESSION['id'] = $idUser;

            $querySetHash = "CALL `SET_HASH`(".$idUser.", '".$hash."');";

            return  $cookieSetHash && Db::queryReturn($querySetHash, true);
        }

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

    public static function logOut(){
        unset($_SESSION['id']);
        setcookie("id", '', time() - 3600000, "/");
        setcookie("role", '', time() - 3600000, "/");
        setcookie("hash", '', time() - 3600000, "/");
    }
 /*
 *
 * @return int Role
 *
 */
    private static function getRoleById($idUser)
    {
        $roleQuery = "SELECT `GET_ROLE_BY_ID`(".$idUser.");";
        return  DB::queryReturn($roleQuery, true);
    }


    public static function getUserId(){
        if (isset($_SESSION['id']))
            $id = $_SESSION['id'];
        else
            $id=$_COOKIE['id'];

        return $id;
    }

    public static function isAdmin()
    {

        return self::getUserId()===static::ADMIN_ROLE_ID;
    }

    public static function isStorage()
    {

        return self::getUserId()===static::STORAGE_ROLE_ID;
    }

    public static function isTeller()
    {
        return self::getUserId()===static::TELLER_ROLE_ID;
    }

    public static function isGuest()
    {
        d(self::getUserId());
        return in_array(self::getUserId(), [static::TELLER_ROLE_ID, static::STORAGE_ROLE_ID, static::ADMIN_ROLE_ID] );
    }

    public static function getNameForUser($id){
        $users=
             [
               self::ADMIN_ROLE_ID=>'Адміністратор',
             self::STORAGE_ROLE_ID=>'Складовщик',
             self::TELLER_ROLE_ID =>'Касир',
            ];

        return $users[$id];
    }

    public static function getUsersList()
    {
        return DB::queryReturn('CALL `GET_USERS_LIST`();');

    }

    public static function getListMessages($limit=100){

            return DB::queryReturn('SELECT `user_id`, `content`, `date` FROM `notes`  ORDER BY `date` DESC LIMIT '.$limit);

    }
    public static function insertMessages($userId, $messages){
        $sql='INSERT INTO `notes` ( `user_id`, `date`, `content`) VALUES ('.$userId.', '.time().', "'.$messages.'");';
        $db = DB::getConnection();
        return $db->query($sql);
    }
}