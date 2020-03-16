<?php

	namespace app\Models;

	class database{

		const host = "localhost";
		const user = "root";
		const senha = "";
		const db_name = "mvc_crud";

		public function connection(){
			try{
				return $pdo = new \PDO("mysql:host=".self::host."; dbname=".self::db_name."; charset=utf8", self::user, self::senha);
			}catch(\PDOException $e){
				echo $e->getMessage();
			}
		}
	}