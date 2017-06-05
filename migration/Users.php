<?php
class Users extends Migration
{
    public function createTable(){

        $this->db->query("
                --
                -- Структура таблиці `users`
                --
                
                CREATE TABLE `users` (
                  `id` int(11) NOT NULL,
                  `name` varchar(50) NOT NULL,
                  `password` varchar(36) NOT NULL,
                  `status_id` int(1) NOT NULL,
                  `user_hash` varchar(32)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                
                ALTER TABLE `users`
                MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
        ");

      $return = $this->db->query("
                    --
                    -- Структура таблиці `notes`
                    --
                    CREATE TABLE `notes` (
                      `id` int(11) NOT NULL,
                      `user_id` int(11) NOT NULL,
                      `date` int(11) NOT NULL,
                      `content` varchar(255) NOT NULL
                    ) 
            ");


      return $return;
    }


    public function dropTable(){
        $this->db->query("DROP TABLE `mysql.nbrz.ru`.users;");
        $this->db->query("DROP TABLE `mysql.nbrz.ru`.notes;");
    }


    public function createKey(){
        $this->db->query("
        ALTER TABLE `notes` ADD PRIMARY KEY(`id`);
        ");

        $this->db->query("
            --
            -- Індекси таблиці `users`
                    --
            ALTER TABLE `users`
              ADD PRIMARY KEY (`id`);
              
            --
            -- AUTO_INCREMENT для таблиці `users`
            --
            ALTER TABLE `users`
              MODIFY `id` int(11) NOT NULL AUTO_INCREMENT; 
              
              "
        );

        $this->db->query("
        
        --
        -- Індекси таблиці `notes`
        --
        ALTER TABLE `notes`
          ADD KEY `notes_user_id` (`user_id`);
           
        ");

        $this->db->query("
            --
            -- Обмеження зовнішнього ключа таблиці `notes`
            --
            ALTER TABLE `notes`
            ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
        ");

    }


    public function dropKey(){
        $this->db->query("ALTER TABLE `mysql.nbrz.ru`.notes DROP FOREIGN KEY notes_ibfk_1;");
    }



    public function createTrigger(){
        $this->db->query(" ");

    }


    public function dropTrigger(){
        $this->db->query("");
    }


            public function createProcedure(){
                $this->db->query("
                 CREATE PROCEDURE `GET_USERS_LIST`() COMMENT 'Повертає список користувачів та їх id' 
                    NOT DETERMINISTIC READS SQL DATA SQL SECURITY DEFINER 
                    SELECT `id`, `name` FROM `users`;
                 ");


                $this->db->query("
                 CREATE PROCEDURE `SET_HASH`(userId INT, come_hash VARCHAR(36)) COMMENT 'Встановлює рфі' 
                    NOT DETERMINISTIC READS SQL DATA SQL SECURITY DEFINER 
                    UPDATE `users` SET `user_hash`= come_hash WHERE `id`=userId;
                 ");

                 $this->db->exec("
                    delimiter $$
                        CREATE FUNCTION IS_VALID_PASSWORD(idUser INT, comePassword VARCHAR(36)) RETURNS BOOLEAN 
                        COMMENT 'Перевірка на відповідність пароля' 
                        BEGIN 
                            DECLARE setPassword VARCHAR(36);
                            DECLARE result BOOLEAN DEFAULT FALSE;
                             SELECT `password` FROM `users` WHERE `id`= idUser INTO setPassword; 
                             SELECT MD5(comePassword)  = setPassword INTO result;
                            RETURN result;
                        END; $$
                        delimiter ;
                ");


                $this->db->exec("(delimiter $$
                        CREATE FUNCTION GET_ROLE_BY_ID(idUser INT) RETURNS INT 
                        COMMENT 'Повертаємо роль користувача' 
                        BEGIN 
                            DECLARE role INT;
                             SELECT `status_id` FROM `users` WHERE `id`= idUser LIMIT 1 INTO role; 
                            RETURN role;
                        END; $$
                        delimiter ;)
                ");
    }


    public function dropProcedure(){
        $this->db->query("DROP PROCEDURE  IF EXISTS `GET_USERS_LIST`;");
        $this->db->query("DROP PROCEDURE  IF EXISTS `SET_HASH`;");

        $this->db->query("DROP FUNCTION  IF EXISTS `IS_VALID_PASSWORD`");
        $this->db->query("DROP FUNCTION  IF EXISTS `GET_ROLE_BY_ID`");
    }

}