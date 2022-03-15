<?require_once('db.php');?>
<?$db = new DataBase();?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Product - <?=$productId = $_GET['id'];?></title>
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="../css/styles.css" >
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<main class="container-fluid" id="main">
			<form class="row justify-content-center" method="POST">
				<?$product = $db->getProduct('SELECT DISTINCT name, price, url, articul FROM product WHERE id = ?', [$productId]);?>
				<div class="card" style="width: 90%">
					<img src="../images/<?=$product['url']?>" class="card-img-top imageProduct" alt="...">
					<div class="card-body">
						<h5 class="card-title"><?=$product['name']?></h5>
						<p class="card-text">Цена: <?=$product['price']?></p>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">Артикул: <?=$product['articul']?></li>
						<li class="list-group-item">Dapibus ac facilisis in</li>
						<li class="list-group-item">Vestibulum at eros</li>
					</ul>
					<div class="card-body">
						<a href="../index.php" class="card-link">Все товары</a>
					</div>
				</div>
			</form>
		</main>
	</body>
	
</html>
<?


?>