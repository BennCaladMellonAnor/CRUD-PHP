<?php 
	$head = new Head();
	$body = new Body();
	require_once(DATABASE_PATH);
	$database = new Database();
	$id = $_COOKIE['id'];
	$schedule = $database->queryAll("*", "schedule", "user", "$id");
	$users = [];
	foreach ($schedule as $key => $value) {
		$result = $database->queryOne('photo, nick, status, age,number','users','id',"{$schedule[$key]['contact']}");
		if($result){
			$users[] = $result;
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<?php 
		$head->title('CRUD | Home');
		$head->link();
	?>
</head>
<body>
	<?php 
		$body->nav();
	?>
	<div class="d-flex my-2">
		<div class="w-100 d-flex text-center">
			<table class="table table-bordered table-sm">
				<thead class="table-dark">
					<tr>
						<th></th>
						<th>Name</th>
						<th>Status</th>
						<th>Age</th>
						<th>number</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($users as $key => $value): ?>
						<tr>
							<td class="d-flex justify-content-center">
								<div class="border rounded-5" style="max-height:49px; overflow:hidden; max-width:49px;">
									<img src="<?= PHOTO_PATH.$users[$key]['photo'] ?>" style="max-height:49px;"/>
								</div>
							</td>
							<td><?= $users[$key]['nick'] ?></td>
							<td><?= $users[$key]['status']?></td>
							<td><?= $users[$key]['age'] ?></td>
							<td><?= $users[$key]['number'] ?></td>
							<td class="d-flex justify-content-evenly">
								<a href="" class="btn btn-outline-danger w-100">X</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>