<?php

class Db
{
    		public static function getConnection()
		{
			$params = include(ROOT . '/config/db_params.php');
			$ver = "mysql:host={$params['host']};dbname={$params['dbname']}";
            $db = new PDO($ver, $params['user'], $params['password']);
            $db->exec("set names utf8");
			return $db;
		}
}