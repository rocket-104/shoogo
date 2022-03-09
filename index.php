<?require_once('pages/db.php');?>
<?
$db = new DataBase();
$products = $db->getProducts('SELECT  DISTINCT id, name, price FROM product ORDER BY name', []);
//die($newProduct);
//var_dump($product);

?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Card</title>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="css/styles.css" >
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
	</head>
	
	<body>
		<main class="container-fluid" id="main">
			<div class="position-absolute top-0 end-0">
				<a href="pages/new_product.php" class="btn btn-success me-3 mt-3">+</a>
			</div>
			<div class="row justify-content-center" method="POST">
				<?foreach ($products as $product) {?>
				<div class="col-3 text-center mx-4 my-3">
					<div class="card text-center">
						<div class="card-header">
						арт. 001001
						</div>
						<div class="card-body">
							<img src="images/001.jpg" class="img-fluid" alt="...">
							<h5 class="card-title"><?=$product['name']?></h5>
							<p class="card-text">Стоимость: <?=$product['price']?> р.</p>
							<a href="pages/product.php?id=<?=$product['id']?>" class="btn btn-primary">Подробнее</a>
						</div>
						<div class="card-footer text-muted">
							any text
						</div>
					</div>
				</div>
				<?}?>
			</div>
		</main>
	</body>
</html>
<script src="bootstrap/js/bootstrap.min.js"></script>