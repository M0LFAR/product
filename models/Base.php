<?php
namespace models;
use components\Db;

class Base
{

    public $name;
    public $address;
    public $contact_phone;
    public $directory_phone;
    public $id;

    public function __construct($id)
    {
        if(isset($id))
        {
            $baseSQL =DB::queryReturn('SELECT `id_base`, `name`, `address`, `directory_phone`, `contact_phone` FROM `base`  WHERE id_base='.$id);

            $this->id=$id;
            $this->name= $baseSQL[0]['name'];
            $this->address=$baseSQL[0]['address'];
            $this->contact_phone=$baseSQL[0]['contact_phone'];
            $this->directory_phone=$baseSQL[0]['directory_phone'];

        }

    }

    static function getBaseList(){
        $db = DB::getConnection();
        //$db->bindValue(':list', '1', PDO::PARAM_STR);
        $db->query();


    }

    static function addNewBase(){

    }


    public function  save(){
        $db = DB::getConnection();
        if(isset($this->id)){
            $sql = 'UPDATE table_name SET `name` = "'.$this->name.'", `address` = "'.$this->address.'",`contact_phone` = '.$this->contact_phone.',  `contact_phone` = '.$this->directory_phone.', WHERE id_base='.$this->id;
        }else {
            $sql = 'INSERT INTO `base` (`id_base`, `name`, `address`, `directory_phone`, `contact_phone`) VALUES (NULL, :name_base,  :address, :director_phone ,:contact_phone);';
        }
        $prep = $db->prepare($sql);

        $prep ->bindValue(':contact_phone', $this->contact_phone, \PDO::PARAM_INT);
        $prep ->bindValue(':director_phone', $this->directory_phone , \PDO::PARAM_INT);
        $prep ->bindValue(':address', $this->address, \PDO::PARAM_STR);
        $prep ->bindValue(':name_base', $this->name, \PDO::PARAM_STR);
        $prep -> execute();

    }

}