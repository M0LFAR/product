<?php

class Sale extends Migration
{
    public function createTable(){

        $this->db->query("
                    --
                    -- Структура таблиці `sale`
                    --
                    
                    CREATE TABLE `sale` (
                      `id_sale` int(11) NOT NULL,
                      `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                      `sum` float NOT NULL COMMENT 'Сума по чеку'
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 
                    
                    COMMENT='Таблиця замовлення';
                    
                    --
                    -- AUTO_INCREMENT для таблиці `sale`
                    --
                    ALTER TABLE `sale`
                      MODIFY `id_sale` int(11) NOT NULL AUTO_INCREMENT;
                    ");

        $this->db->query("
                --
                -- Структура таблиці `sale_structure`
                --
                
                CREATE TABLE `sale_structure` (
                  `product_id` int(11) DEFAULT NULL COMMENT 'Зв`язне поле з таблицею product',
                  `sale_id` int(11) DEFAULT NULL COMMENT 'Зв`язне поле з таблицею Sale',
                  `quantity` int(11) NOT NULL DEFAULT '1' COMMENT 'Кількість',
                  `first_price` float NOT NULL COMMENT 'Закупочна ціна',
                  `price` float NOT NULL COMMENT 'Ціна. Добавлено саме ціну а не націнку, економимо ресурси бази і навдмінно від складу де націнка є полем що редагується.'
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Зв`язна таблиця між продуктами і ';
                ");
    }


    public function dropTable(){
        $this->db->query("DROP TABLE `mysql.nbrz.ru`.sale_structure;");
        $this->db->query("DROP TABLE `mysql.nbrz.ru`.sale;");
    }


    public function createKey(){

        $this->db->query("
                  --
                  -- Індекси таблиці `sale`
                  --
                  ALTER TABLE `sale`
                  ADD PRIMARY KEY (`id_sale`);
         ");
        $this->db->query("  
            --
            -- Індекси таблиці `sale_structure`
            --
            ALTER TABLE `sale_structure`
            ADD KEY `sale_structure_sale_id_index` (`sale_id`),
            ADD KEY `sale_structure_product_id_index` (`product_id`);
            ");

        $this->db->query("
        --
        -- Обмеження зовнішнього ключа таблиці `sale`
        --
        ALTER TABLE `sale_structure`
          ADD CONSTRAINT `sale_sale_structure_sale_id_fk` FOREIGN KEY (`sale_id`) REFERENCES `sale` (`id_sale`) ON DELETE CASCADE ON UPDATE CASCADE;
        ");


        $this->db->query("
        --
        -- Обмеження зовнішнього ключа таблиці `sale_structure`
        --
        ALTER TABLE `sale_structure`
          ADD CONSTRAINT `sale_structure_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
        ");



    }


    public function dropKey(){
        $this->db->query("ALTER TABLE `mysql.nbrz.ru`.sale DROP FOREIGN KEY sale_sale_structure_sale_id_fk;");
        $this->db->query("ALTER TABLE `mysql.nbrz.ru`.sale_structure DROP FOREIGN KEY sale_structure_ibfk_1;");

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