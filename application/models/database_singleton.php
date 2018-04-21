<?php

class Db_singleton{

	private static $dbconn = null;

	private function __construct(){}

	private function __clone(){}

	public static function getdbconn(){

		if (self::$dbconn ==null){
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			self::$dbconn = new PDO('mysql:host = localhost; dbname=ad_data_test','root','',$pdo_options);

			echo 'database connceted!!!!!! <br>';
		}
		else{
				    echo 'Already connceted';
				}

		return self::$dbconn;
	}
}

?>

