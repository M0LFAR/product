<?php
/*
 * @command php console_migration.php up - запуск міграцій на виконання

 * @command php console_migration.php down - відміна всіх міграцій
*/

define('ROOT', dirname(__FILE__).'/..');

include ('../components/Db.php');

include_once ('Migration.php');
include_once ('Base.php');
include_once ('Products.php');
include_once ('Purchases.php');
include_once ('Sale.php');
include_once ('Users.php');



parse_str(implode('&', array_slice($argv, 1)), $commandConsole);

$do = key($commandConsole);


$base = new Base();
$product = new Products();
$purchases = new Purchases();
$sale = new Sale();
$users = new Users();

switch ($do){
        case 'up':{
            try {
                $product->migrateUP();
                $base->migrateUP();
                $purchases->migrateUP();
                $sale->migrateUP();
                $users->migrateUP();

                $db = \components\Db::getConnection();
                $db->query("INSERT INTO `users` (`id`, `name`, `password`, `status_id`, `user_hash`) VALUES (NULL, 'Адміністратор', '5f4dcc3b5aa765d61d8327deb882cf99', 1, NULL);");
                $db->query("INSERT INTO `users` (`id`, `name`, `password`, `status_id`, `user_hash`) VALUES (NULL, 'Складовщик', '5f4dcc3b5aa765d61d8327deb882cf99', 2, NULL);");
                $db->query("INSERT INTO `users` (`id`, `name`, `password`, `status_id`, `user_hash`) VALUES (NULL, 'Касир', '5f4dcc3b5aa765d61d8327deb882cf99', 3, NULL);");

               $db->exec("
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

              //  $stmt->execute();
                break;
            } catch (PDOException $e) {
                echo 'Помилка при створенні даних',  $e->getMessage(), "\n";
            }

        }
        case 'down':{
            $users->migrateDOWN();
            $sale->migrateDOWN();
            $purchases->migrateDOWN();
            $base->migrateDOWN();
            $product->migrateDOWN();
        }
}