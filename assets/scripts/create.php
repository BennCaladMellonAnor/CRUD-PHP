<?php 
	require_once("../variables/globals.php");
	require_once(DATABASE_PATH);
	$database = new Database();
	$filter = [];

	foreach ($_POST as $key => $value) {
		if ($value == "") {
			header("Location: ../index.php");
			exit();
		}else{
			switch ($key) {
				case 'password':
					if ($value != $_POST['re-password']) {
						header("Location: ../../index.php");
						exit();	
					}else{
						$filter[] = strval($_POST[$key]);
					}
					break;
				case 'email':
					$filter[] = filter_var($_POST[$key], FILTER_VALIDATE_EMAIL);
					break;
				case 're-password':
					// nothing
					break;
				default:
					$filter[] = strval(filter_var($_POST[$key], FILTER_SANITIZE_STRING));
					break;
				}
		}

	}
	$filter[] = "default.png";

	$conn = $database->get();

	$sql = "INSERT INTO `users` (name, nick, credential, email, status, `number`, password, photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

	// var_dump($filter);

	$stmt = $conn->prepare($sql);

	$stmt->bind_param("ssssssss", ...$filter);

	if($stmt->execute()){
		//AllRight
	}else{
		//Error management!!!
	}

	header("Location: ../../index.php");
	exit();

?>