<?php 
	require_once("../variables/globals.php");
	require_once(DATABASE_PATH);

	//Case $_FILES exists we need to clone the img and verify somethings
	//$photoName = photoTreatment($file) will help us.
	//

	if (isset($_FILES['photo']['tmp_name']) && $_FILES['photo']['tmp_name'] != "") {
		$_POST['photo'] = photo($_FILES);
	}
	$f1_post = [];
	foreach ($_POST as $key => $value) {
		if($value != ""){
			//Here start the First Filter
			//We know how field are full no empty.
			switch ($key) {
				case 'photo':
					$f1_post[$key] = $_POST[$key];
					break;
				case 'name':
					$f1_post[$key] = filter_var($_POST[$key], FILTER_SANITIZE_STRING);
					break;
				case 'nick':
					$f1_post[$key] = filter_var($_POST[$key], FILTER_SANITIZE_STRING);
					break;
				case 'email':
					$f1_post[$key] = filter_var($_POST[$key], FILTER_VALIDATE_EMAIL);
					break;
				case 'credential':
					$f1_post[$key] = filter_var($_POST[$key], FILTER_SANITIZE_STRING);
					break;
				case 'number':
					$f1_post[$key] = filter_var($_POST[$key], FILTER_SANITIZE_STRING);
					break;
				case 'status':
					$f1_post[$key] = $_POST[$key];
					break;
				case 'password':
					$f1_post[$key] = $_POST[$key];
					break;
				default:
					# code...
					break;
			}
		};
	}

	function photo($file){
		$type = ".".ltrim($file['photo']['type'], "image/");
		$fileName = $_COOKIE['id'].$type;

		$uploadFile = PHOTO_PATH . basename($file['photo']['name']);

		copy($file['photo']['tmp_name'], dirname(__DIR__)."/imgs/".$file['photo']['name']);

		rename(dirname(__DIR__)."/imgs/".$file['photo']['name'], dirname(__DIR__)."/imgs/".$fileName);

		return $fileName;

	}

	function DBUpdate($post){
		$database = new Database();
		$conn = $database->get();
		$sql = "UPDATE `users` SET";
		$id = strval($_COOKIE['id']);
		$bind = "";
		$tmp = "";
		$values = [];
		foreach ($post as $key => $value) {
			$tmp .= "`$key` = ?, ";
			$values[] = $value;
				if ($key == "age") {
					$bind .= "i";	
				}else{
					$bind .= "s";
				}
		}
		$tmp = rtrim($tmp, ", ");
		$sql .= " $tmp WHERE `id` = '$id'";

		$stmt = $conn->prepare($sql);

		$stmt->bind_param("$bind", ...$values);

		if($stmt->execute()){
			header("Location: ../../index.php");
			exit();
		};
	}
	DBUpdate($f1_post);
?>