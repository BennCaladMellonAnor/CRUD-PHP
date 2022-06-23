<?php 
	$head = new Head();
	$body = new Body();
	require_once(DATABASE_PATH);
	$database = new Database();
	$id = $_COOKIE['id'];
	$perfil = $database->queryOne("*", "users", "id", "$id");

?>
<!DOCTYPE html>
<html>
<head>
	<?php 
		$head->title('CRUD | Perfil');
		$head->link();
	?>
</head>
<body>
	<?php 
		$body->nav();
	?>
	<div class="m-4 mb-0 d-inline-flex rounded-top bg-dark text-light px-2 border-bottom">
		<span class="fs-4"><?= $perfil['name'] ?></span>
	</div>
	<div class="d-flex p-2 bg-dark m-4 mt-0 rounded">
		<form class="w-100" action="<?= SCRIPT_PATH."/perfil.php"?>" method="post" enctype="multipart/form-data">
			<div class="">	
				<div class="d-flex align-items-center">
					<div class="border border-light rounded-pill" style="width:149px; height:149px; overflow:hidden;">
						<img src="assets/imgs/<?=$perfil['photo']?>" style="min-width:149px;min-height:149px;max-width:198px;max-height:198px;">
					</div>
					<div class="d-flex flex-column">
						<div class="border rounded-pill" style="width:160px;height:160px; margin:auto; overflow:hidden;">
							<img src="assets/imgs/<?= $photo?>" style="max-width:160px;max-height:160px;">
						</div>
						<div class="pt-2">
							<input class="form-control" type="file" name="photo">
						</div>
					</div>
					<div class="d-flex flex-fill flex-column p-2">
						<span class="text-light text-center shadow-diff mb-2">Name and Nickname</span>
						<div class="d-flex justify-content-between rounded bg-light">
							<span class="rounded-top px-2 w-100 bg-light border"><?= $perfil['name'] ?></span>
							<span class="rounded-top px-2 w-100 bg-light border"><?= $perfil['nick'] ?></span>
						</div>
						<div class="input-group mb-3 bg-light rounded-bottom">
							<span class="input-group-text">FullName</span>
							<input class="form-control" type="text" name="name">
							<span class="input-group-text">User</span>
							<input class="form-control" type="text" name="nick"></input>
						</div>
					</div>
				</div>
				<div class="">
					<div class="d-flex pt-2 flex-column">
						<span class="border-top text-light text-center shadow-diff mb-2">Your E-mail and Credential</span>
						<div class="d-flex justify-content-between rounded bg-light">
							<span class="rounded-top px-2 w-100 bg-light border"><?= $perfil['email'] ?></span>
							<span class="rounded-top px-2 w-100 bg-light border"><?= $perfil['credential'] ?></span>
						</div>
						<div class="input-group bg-light mb-2 rounded-bottom">
							<span class="input-group-text">Email</span>
							<input class="form-control" type="email" name="email">
							<span class="input-group-text">Credential</span>
							<input class="form-control" type="text" name="credential">
						</div>
						<span class="text-light text-center shadow-diff mb-2">Your Cellphone Number And Status</span>
						<div class="d-flex justify-content-between rounded bg-light">
							<span class="rounded-top px-2 w-100 bg-light border"><?= $perfil['number'] ?></span>
							<span class="rounded-top px-2 w-100 bg-light border"><?= $perfil['status'] ?></span>
						</div>
						<div class="input-group mb-2 bg-light rounded-bottom">
							<span class="input-group-text">Number</span>
							<input class="form-control" type="text" name="number">
							<span class="input-group-text">Status</span>
							<input class="form-control" type="text" name="status">
						</div>
					</div>
					<div class="d-flex flex-column mb-2">
						<span class="text-light text-center shadow-diff mb-2">Change Your Password</span>
						<div class="input-group">
							<span class="input-group-text">New Password</span>
							<input class="form-control" type="password" name="password">
						</div>
					</div>
				</div>
				<div class="d-flex justify-content-between py-2">
					<button class="btn btn-lg btn-warning w-75 me-2">UPDATE</button>
					<a href="index.php" class="btn btn-lg btn-danger w-75">CANCEL</a>
				</div>
			</div>
		</form>
	</div>
</body>
</html>