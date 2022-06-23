<?php 

	class Database{
		
		function __construct(){
			
		}

		function get(){
			$iniPaht = realpath(dirname(__FILE__, 3))."\config\config.ini";
			$iniFile = parse_ini_file($iniPaht);
			$conn = new mysqli(
				$iniFile['host'],
				$iniFile['username'],
				$iniFile['password'],
				$iniFile['database'],
				$iniFile['port']
			);
			if($conn->connect_errno == 1049){
				echo "DataBase name "."{$iniFile['database']}"." not exists";
			};
			return $conn;
		}
		function queryOne(...$values){
			$conn = $this->get();
			$sql = "SELECT $values[0] FROM `$values[1]` WHERE `$values[2]` = $values[3]";
			$result = $conn->query($sql);
			return $result->fetch_assoc();
			
		}
		function queryAll(...$params){
			$conn = $this->get();
			$sql = "SELECT $params[0] FROM $params[1] WHERE $params[2] = $params[3]";
			$result = $conn->query($sql);	
			$tmp = [];
			while ($row = $result->fetch_assoc()) {
				$tmp[] = $row;
			}
			return $tmp;
		}
	}

?>