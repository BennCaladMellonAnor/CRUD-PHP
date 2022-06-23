<?php 
	require_once(SEARCHER_PATH);
	$head = new Head();
	$body = new Body();
	$searcher = new Searcher();
	$searcher->currentId = $_COOKIE['id'];

	$input = isset($_POST['searcher']) ? $_POST['searcher'] : "";
	$usersLike = $input != "" && !empty($searcher->searcher("$input")) ? $searcher->searcher("$input"): "";
	
?>
<!DOCTYPE html>
<html>
<head>
	<?php 
		$head->title("CRUD | ADD");
		$head->link();
	?>
</head>
<body class="w-100">
	<?php 
		// header("REFRESH: 1");
		$body->nav();
	 ?>
	<div class="d-flex justify-content-center align-items-center" style="height:70vh">
		<div class="card" style="max-width:60vh;">
			<div class="card-head text-center m-2">
				<span class="text-center p-2">ADD NEW</span>
			</div>
			<div class="card-body">
				<form action="#" method="post">
					<input type="text" class="form-control" name="searcher">
					<button class="btn btn-warning w-100 my-2">+</button>
				</form>
			</div>
			<div class="card-footer" style="min-height:10vh;">
				<?php if ($usersLike != ""): ?>
					<table class="table table-sm">
						<thead class="text-center">
							<tr>
								<th>Name</th>
								<th>Number</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($usersLike as $key => $value): ?>
								<tr>
									<td><?= $usersLike[$key]['nick']?></td>
									<td><?= $usersLike[$key]['number']?></td>
									<?php 
										$currentId = $_COOKIE['id'];
										$rowId = $usersLike[$key]['id'];
										$verify = $searcher->verify("$currentId", "$rowId");
									?>
									<?php if ($usersLike[$key]['id'] != $_COOKIE['id'] && $verify == false): ?>
										<td>
											<form method="post" action="<?=SCRIPT_PATH?>/add.php">
												<input type="text" name="data" value="<?=$usersLike[$key]['id']?>" style="display: none;">
												<button class="btn w-100 btn-success" style="padding:0px 2px!important;">+</button>
											</form>
										</td>
									<?php endif ?>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				<?php endif ?>
			</div>
		</div>
	</div>
</body>
</html>