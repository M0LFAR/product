<?php

class Purchases extends Migration
{
    public function createTable(){

        $this->db->query("
                --
                -- Структура таблиці `purchases`
                --
                
                CREATE TABLE `purchases` (
                  `id_purchase` int(11) NOT NULL,
                  `data_purchases` datetime DEFAULT CURRENT_TIMESTAMP,
                  `sum` float NOT NULL COMMENT 'Сума покупки',
                  `base_id` int(11) DEFAULT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Оптові закупки';
");

        $this->db->query("
            --
            -- Структура таблиці `sesions_purchases`
            --
            
            CREATE TABLE `sesions_purchases` (
              `id_sesion` int(11) NOT NULL,
              `data_start` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'дата відкриття сесії',
              `data_finish` datetime DEFAULT NULL COMMENT 'дата та час завершення сесії прийома товару',
              `sum` float NOT NULL,
              `purchase_id` int(11) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 
            
            COMMENT='Таблиця обліку прийома  товару, що  дозволяє здіснювати одночасне добавлення товарудекільком працівникам складу.';
           
        ");

        $this->db->query("
                    --
            -- Структура таблиці `stucture_sesions_purchases`
                    --
            
            CREATE TABLE `stucture_sesions_purchases` (
              `sesion_id` int(11) NOT NULL,
              `product_id` int(11) NOT NULL,
              `first_price` float DEFAULT NULL COMMENT 'Початкова ціна',
              `addition` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Час коли були внесені зміни',
              `quantity` int(11) DEFAULT NULL COMMENT 'кількість'
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Таблиця що поєднує продукт з сесією закупки';
            ");
    }


    public function dropTable(){
        $this->db->query("DROP TABLE `mysql.nbrz.ru`.stucture_sesions_purchases;");
        $this->db->query("DROP TABLE `mysql.nbrz.ru`.sesions_purchases;");
        $this->db->query("DROP TABLE `mysql.nbrz.ru`.purchases;");
    }


    public function createKey(){

        $this->db->query("
                    --
                    -- Індекси таблиці `purchases`
                    --
                    ALTER TABLE `purchases`
                      ADD PRIMARY KEY (`id_purchase`),
                      ADD KEY `purchases_base_id_index` (`base_id`);
                    ");

        $this->db->query("
                    --
                    -- Індекси таблиці `sesions_purchases`
                    --
                    ALTER TABLE `sesions_purchases`
                    ADD PRIMARY KEY (`id_sesion`),
                    ADD KEY `sesion_purchases_id_purchase_index` (`purchase_id`);
                    ");

        $this->db->query("
                    --
                    -- Індекси таблиці `stucture_sesions_purchases`
                    --
                    ALTER TABLE `stucture_sesions_purchases`
                      ADD KEY `stucture_sesions_purchases_id_sesion_index` (`sesion_id`),
                      ADD KEY `stucture_sesions_purchases_product_id_index` (`product_id`);
                    ");
        $this->db->query("
                    --
                    -- Обмеження зовнішнього ключа таблиці `base`
                    --
                    ALTER TABLE `purchases`
                      ADD CONSTRAINT `base_purchases_base_id_fk` FOREIGN KEY (`base_id`) REFERENCES `base` (`id_base`) ON UPDATE CASCADE;
        ");

        $this->db->query("
                    --
                    -- Обмеження зовнішнього ключа таблиці `base`
                    --
                    ALTER TABLE `purchases`
                      ADD CONSTRAINT `base_purchases_base_id_fk` FOREIGN KEY (`base_id`) REFERENCES `base` (`id_base`) ON UPDATE CASCADE;
        ");


        $this->db->query(" 
        --
        -- Обмеження зовнішнього ключа таблиці `sesions_purchases`
        --
        ALTER TABLE `sesions_purchases`
          ADD CONSTRAINT `purchases_stucture_purchases_purchase_id_fk` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id_purchase`) ON DELETE CASCADE ON UPDATE CASCADE;
        ");

        $this->db->query(" 
        --
        -- Обмеження зовнішнього ключа таблиці `stucture_sesions_purchases`
        --
        ALTER TABLE `stucture_sesions_purchases`
          ADD CONSTRAINT `sesions_purchases_stucture_sesions_purchases_sesion_id_fk` FOREIGN KEY (`sesion_id`) REFERENCES `sesions_purchases` (`id_sesion`) ON DELETE CASCADE ON UPDATE CASCADE;
        ");

        $this->db->query(" 
        --
        -- Обмеження зовнішнього ключа таблиці `stucture_sesions_purchases`
                --
        ALTER TABLE `stucture_sesions_purchases`
          ADD CONSTRAINT `stucture_sesions_purchases_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
        ");

    }


    public function dropKey(){
        $this->db->query("ALTER TABLE `mysql.nbrz.ru`.base DROP FOREIGN KEY base_purchases_base_id_fk;");
        $this->db->query("ALTER TABLE `mysql.nbrz.ru`.purchases DROP FOREIGN KEY purchases_sesions_purchases_id_purchase_fk;");
        $this->db->query("ALTER TABLE `mysql.nbrz.ru`.stucture_sesions_purchases DROP FOREIGN KEY sesions_purchases_stucture_sesions_purchases_sesion_id_fk;");
        $this->db->query("ALTER TABLE `mysql.nbrz.ru`.sesions_purchases DROP FOREIGN KEY purchases_stucture_purchases_purchase_id_fk;");
        $this->db->query("ALTER TABLE `mysql.nbrz.ru`.stucture_sesions_purchases DROP FOREIGN KEY stucture_sesions_purchases_ibfk_1;");
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