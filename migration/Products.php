<?php

class Products extends Migration
{
    public function createTable(){
        $this->db->query("                 
                --
                -- Структура таблиці `units`
                --
                
                CREATE TABLE `units` (
                  `id_units` int(11) NOT NULL,
                  `id_parents` int(11) DEFAULT NULL,
                  `proportion` int(33) DEFAULT NULL,
                  `name` varchar(30) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                
                
                --
                -- AUTO_INCREMENT для таблиці `units`
                --
                ALTER TABLE `units`
                  MODIFY `id_units` int(11) NOT NULL AUTO_INCREMENT;
                
                
                --
                -- Дамп даних таблиці `units`
                --
                
               INSERT INTO `units` (`id_units`, `id_parents`, `name`, `proportion`) VALUES (1, NULL, 'кг', '0');
               INSERT INTO `units` (`id_units`, `id_parents`, `name`, `proportion`) VALUES (4, 1, 'г', '1000');
               INSERT INTO `units` (`id_units`, `id_parents`, `name`, `proportion`) VALUES (2, NULL, 'лт', '0');
               INSERT INTO `units` (`id_units`, `id_parents`, `name`,  `proportion`) VALUES (3, 2, 'мЛт', '1000');
        ");

        $this->db->query("
            --
            -- Структура таблиці `products`
            --
            
            CREATE TABLE `products` (
              `id` int(11) NOT NULL,
              `name` varchar(255) DEFAULT NULL COMMENT 'Найменування продукта',
              `unit_id` int(11) NOT NULL COMMENT 'Поле для встановлення одиниці вимірювання',
              `unit_value` varchar(50) DEFAULT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблиця  продукції';
            
            --
            -- AUTO_INCREMENT для таблиці `products`
            --
            ALTER TABLE `products`
              MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
              
            --
            -- Дамп даних таблиці `products`
            --
            
            INSERT INTO `products` (`id`, `name`, `unit_id`, `unit_value`) VALUES
            (2, 'продукт', 2, '12');     
        ");

        $this->db->query('--
                        -- Структура таблиці `change_price`
                        --
                        CREATE TABLE `change_price` (
                          `id` int(11) NOT NULL,
                          `product_id` int(11) NOT NULL,
                          `date_change` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                          `price_in_time` int(11) NOT NULL
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                        
                          --
            -- AUTO_INCREMENT для таблиці `change_price`
            --
            ALTER TABLE `products`
              MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
                        '
        );

        $this->db->query('
                --
                -- Структура таблиці `storage`
                --
                
                CREATE TABLE `storage` (
                  `id` int(11) NOT NULL,
                  `product_id` int(11) DEFAULT NULL,
                  `quantity` int(11) NOT NULL COMMENT \'кількість мусить бути встановлена\n\',
                  `first_price` float NOT NULL COMMENT \'початкова ціна\',
                  `rate_make_up` int(11) NOT NULL COMMENT \'націнка на товар у відсотках\',
                  `price` float DEFAULT NULL COMMENT \'дійсна ціна, добуток поля first_price і  rate make up(яке розділено на 100). Поле було створене для пришвидшення загрузки. \',
                  `id_storage` int(11) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;  
                    
                    
                 --
                -- AUTO_INCREMENT для таблиці `storage`
                --
                ALTER TABLE `storage`
                  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
                        
        ');
        
        
        
    }

    public function dropTable(){

        $this->db->query("DROP TABLE `mysql.nbrz.ru`.storage;");
        $this->db->query("DROP TABLE `mysql.nbrz.ru`.change_price;");
        $this->db->query("DROP TABLE `mysql.nbrz.ru`.units;");
        $this->db->query("DROP TABLE `mysql.nbrz.ru`.products;");
    }


    public  function createKey(){

        $this->db->query("
                   --
                   -- Індекси таблиці `products`
                   --
                    ALTER TABLE `products`
                      ADD PRIMARY KEY (`id`),
                      ADD KEY `products_unit_id_index` (`unit_id`);
                      
                 --
                -- AUTO_INCREMENT для таблиці `products`
                --
                ALTER TABLE `products`
                  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
        ");

        $this->db->query("
                --
            -- Індекси таблиці `change_price`
            --
            ALTER TABLE `change_price`
              ADD PRIMARY KEY (`id`),
              ADD KEY `product_id` (`product_id`);
           ");

        $this->db->query("
            --
            -- Індекси таблиці `units`
            --
            ALTER TABLE `units`
              ADD PRIMARY KEY (`id_units`),
              ADD KEY `units_units_id_units_fk` (`id_parents`);
              
              -- AUTO_INCREMENT для таблиці `units`
               --
                ALTER TABLE `units`
                MODIFY `id_units` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
            ");


        $this->db->query("
            --
            -- Індекси таблиці `storage`
            --
            ALTER TABLE `storage`
              ADD PRIMARY KEY (`id`),
              ADD KEY `storage_products_id_fk` (`product_id`);
        ");

        $this->db->query("
     
        --
        -- Індекси таблиці `change_price`
        --
        ALTER TABLE `change_price`
          ADD KEY `change_price_product_id` (`product_id`);
           
        ");


        $this->db->query("            
                --
                -- Обмеження зовнішнього ключа таблиці `products`
                --
                ALTER TABLE `products`
                  ADD CONSTRAINT `products_units_id_units_fk` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id_units`) ON DELETE CASCADE ON UPDATE CASCADE;
                ");



        $this->db->query("    
        --
        -- Обмеження зовнішнього ключа таблиці `storage`
        --
        ALTER TABLE `storage`
          ADD CONSTRAINT `storage_products_id_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
        ");

        $this->db->query("    
        --
        -- Обмеження зовнішнього ключа таблиці `change_price`
        --
        ALTER TABLE `change_price`
          ADD CONSTRAINT `change_price_products_id_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
        ");


        $this->db->query("
        --
        -- Обмеження зовнішнього ключа таблиці `units`
        --
        ALTER TABLE `units`
        ADD CONSTRAINT `units_units_id_units_fk` FOREIGN KEY (`id_parents`) REFERENCES `units` (`id_units`) ON DELETE CASCADE ON UPDATE CASCADE;
        ");

    }


    public  function dropKey(){
        $this->db->query("ALTER TABLE `mysql.nbrz.ru`.change_price DROP FOREIGN KEY change_price_products_id_fk;");
        $this->db->query("ALTER TABLE `mysql.nbrz.ru`.products DROP FOREIGN KEY products_units_id_units_fk;");
        $this->db->query("ALTER TABLE `mysql.nbrz.ru`.storage DROP FOREIGN KEY storage_products_id_fk;");
        $this->db->query("ALTER TABLE `mysql.nbrz.ru`.units DROP FOREIGN KEY units_units_id_units_fk;");

    }



    public  function createTrigger(){
        $this->db->query(" ");

    }


    public  function dropTrigger(){
        $this->db->query("");
    }


    public  function createProcedure(){

        $this->db->query("
                  CREATE PROCEDURE `PROCEDURE_SELECT_ALL_PRODUCT` () 
            NOT DETERMINISTIC 
            SQL SECURITY DEFINER 
            BEGIN 
            SELECT * FROM `products`;
                END;
                ");


        $this->db->query("
                  CREATE PROCEDURE `PROCEDURE_SELECT_ACTUAL_PRODUCT` () 
                   NOT DETERMINISTIC 
                   SQL SECURITY DEFINER 
                   BEGIN 
                   SELECT * FROM `STORAGE`;
                   END;
         ");
    }


    public  function dropProcedure(){
     $this->db->query("DROP PROCEDURE  IF EXISTS `PROCEDURE_SELECT_ALL_PRODUCT`;");
     $this->db->query("DROP PROCEDURE  IF EXISTS `PROCEDURE_SELECT_ACTUAL_PRODUCT`;");
    }

}