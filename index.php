<?php
include 'request.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Link Short</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
	<div class="container text-center">
		<div class="row" style="margin-top: 20%">
			<h1>Link Short</h1>
		</div>
		<div class="row">
			<form action="" method="GET">
				<div class="input-group mb-3">
				  <input type="text" name="link_chort" class="form-control" placeholder="Вставьте ссылку" aria-label="Recipient's username" aria-describedby="button-addon2">
				  <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Выполнить</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>