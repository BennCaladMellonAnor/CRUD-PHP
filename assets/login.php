<?php 
	require_once(DATABASE_PATH);
	$head = new Head();
	$Database = new Database();
?>
<!DOCTYPE html>
<html>
<head>
	<?php 
		$head->title("CRUD | LOGIN");
		$head->link();
	?>
</head>
<body class="bg-warning ">
	<div class="container-fluid d-flex align-items-center justify-content-center login-container">
		<div class="card login-card">
			<div class="card-head border-bottom">
				<div class="text-center m-3">
					<span class="fs-2 text-secondary">LOGIN</span>
				</div>
			</div>
			<div class="card-body pt-2">
				<form class="form" action="<?= SCRIPT_PATH."/login.php"?>" method="post">
					<label class="form-label pt-3">CREDENTIAL</label>
					<input type="text" class="form-control" name="credential">
					<label class="form-label pt-3">PASSWORD</label>
					<input type="password" class="form-control" name="password">
					<button class="btn btn-success p-2 w-100 mt-2">Sign-in</button>
				</form>
			</div>
			<div class="card-footer text-end fs-6">
				<span class="text-muted">If you are new here <span class="text-danger"><a href="?location=<?="assets/create.php"?>">Sign-up</a></span> to create your account</span>
			</div>
		</div>
	</div>
</body>
</html>