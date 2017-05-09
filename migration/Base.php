<?php


class Base extends Migration
{
    public function createTable(){
        $this->db->query("
            --
            -- Структура таблиці `base`
            --
            
            CREATE TABLE `base` (
              `id_base` int(11) NOT NULL,
              `name` varchar(255) CHARACTER SET latin1 NOT NULL,
              `address` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
              `directory_phone` int(11) DEFAULT NULL,
              `contact_phone` int(11) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 
            
            COMMENT='Оптові бази';
        ");
    }


    public function dropTable(){
        $this->db->query(" DROP TABLE `mysql.nbrz.ru`.base;");
    }


    public function createKey(){
        $this->db->query("
                --        
                -- Індекси таблиці `base`
                --
                ALTER TABLE `base`
                  ADD PRIMARY KEY (`id_base`);
                ");

    }


    public function dropKey(){
        $this->db->query("");
    }



    public function createTrigger(){
        $this->db->query(" ");

    }


    public function dropTrigger(){
        $this->db->query("");
    }


    public function createProcedure(){

        $this->db->query("
                
                ");

    }

    public function dropProcedure(){
        $this->db->query("");
    }

}


