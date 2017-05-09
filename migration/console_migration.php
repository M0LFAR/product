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