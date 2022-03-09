<?require_once('db.php');?>
<?$db = new DataBase();?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>New product</title>
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="../css/styles.css" >
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<main class="container-fluid" id="main">
			<div class="card-body">
				<a href="../index.php" class="card-link">Все товары</a>
			</div>
			<h3 class="text-center">Добавление нового товара</h3>
			<form class="row justify-content-center" method="POST">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-name">Название</span>
					</div>
					<input type="text" class="form-control" id="basic-name1" aria-describedby="basic-name" name="name">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-price">Стоимость</span>
					</div>
					<input type="text" class="form-control" id="basic-cost1" aria-describedby="basic-price" name="price">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-art">Артикул</span>
					</div>
					<input type="text" class="form-control" id="basic-art1" aria-describedby="basic-art" name="articul">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-url">Ссылка</span>
					</div>
					<input type="text" class="form-control" id="basic-url1" aria-describedby="basic-url" name="url">
				</div>
				<button type="submit" class="col-3 btn-success" name="btnAdd">Add</button>
			</form>
		</main>
	</body>
	
</html>
<?
if (isset($_POST['btnAdd'])) {
	$newProduct = $db->newProduct('INSERT INTO product (url, name, articul, price) VALUE (?, ?, ?, ?)', [$_POST['url'], $_POST['name'],$_POST['articul'],$_POST['price']]);
}


?>