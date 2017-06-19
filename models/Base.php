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
            $base = DB::queryExecuteToArray('SELECT `id_base`, `name`, `address`, `directory_phone`, `contact_phone` FROM `base`  WHERE id_base=:id',
                                            [':id'=>['value'=>$id, 'type'=>'int']]);

            $base = array_shift($base);
            $this->id=$id;
            $this->name= $base['name'];
            $this->address=$base['address'];
            $this->contact_phone=$base['contact_phone'];
            $this->directory_phone=$base['directory_phone'];
        }

    }

    static function getBaseList(){
        return DB::queryExecuteToArray('SELECT `id_base`, `name`, `address`, `directory_phone`, `contact_phone` FROM `base`');
    }

    public static function delete($idBase){
        $sql="DELETE FROM `base` WHERE id_base = :idbase;";
        return DB::queryExecuteToArray($sql, array(
                ':idbase'=>[ 'value'=>$idBase, 'type'=>'int'],
        ));
    }

    static function getBaseSelect(){
        return DB::queryExecuteToArray('SELECT `id_base`, `name` FROM `base`');
    }

    public function  save(){

        if(isset($this->id)){
            $sql = 'UPDATE `base`  SET `name` = :name_base, `address` = :address, `contact_phone` = :contact_phone,  `directory_phone` = :director_phone WHERE id_base=:id_base';
        }else {
            $sql = 'INSERT INTO `base` (`id_base`, `name`, `address`, `directory_phone`, `contact_phone`) VALUES (NULL, :name_base,  :address, :director_phone ,:contact_phone);';
        }

        $params=array(
            ':contact_phone'=>[ 'value'=>$this->contact_phone, 'type'=>'int'],
            ':director_phone'=>['value'=>$this->directory_phone , 'type'=>'int'],
            ':address'=>['value'=>$this->address, 'type'=>'str'],
            ':name_base'=>['value'=>$this->name, 'type'=>'str'],
        );

        if (isset($this->id)) $params[':id_base']=['value'=>$this->id, 'type'=>'int'];

        return DB::queryExecuteToArray($sql, $params);
    }

}