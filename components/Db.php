<?php

class SingleDb
{

		public static function getConnection()
		{
			$params = include(ROOT . '/config/db_params.php');
			$ver = "mysql:host={$params['host']};dbname={$params['dbname']}";
			return  new PDO($ver, $params['user'], $params['password']);
		}
}