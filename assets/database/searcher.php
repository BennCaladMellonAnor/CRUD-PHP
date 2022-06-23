<?php 
	require_once('database.php');
	class Searcher extends Database{
		//Dar um jeito de settar o id aqui!!!
			//Dá para usar os metodos magicos get()/set()
		public $currentId = 1;

		function __set($attribute, $value){
			$this->$attribute = $value;
		}

		public function searcher($params){
				$conn = parent::get();
				$sql = "SELECT nick, `number`, id FROM users WHERE `number` LIKE '%$params%' LIMIT 5";
				$result = $conn->query($sql);
				$tmp = [];
				while ($row = $result->fetch_assoc()) {
					$userId = $row['id'];
					if(!$this->verify("$this->currentId", "$userId") && $userId != $this->currentId){
						$tmp[] = $row;
					}
				}
				return $tmp;
			}
		public function verify(...$params){
			$conn = parent::get();
			$sql = "SELECT * FROM schedule WHERE user = $params[0] AND contact = $params[1]"; 
			return $conn->query($sql)->num_rows > 0 ? true : false;
		}
		public function add($id){
			$user = $this->currentId;
			$contact = $id;
			$conn = parent::get();

			$exists = $this->verify("$user","$contact");

			if (!$exists) {
				$sql = "INSERT IGNORE INTO `schedule` (user, contact) values($user, $contact)";
				$conn->query($sql);
			}
			return $conn->error ? false : true; 
		}	
		
	}

?>