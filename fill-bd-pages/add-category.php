<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add/edit category</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" >
</head>
<body>
	<header>
		<div class="menu">
			<ul>
				<li>
					<a href="add-category.php">Add/edit category</a>
				</li>
				<li>
					<a href="add-product.php">Add/edit product</a>
				</li>
				<li>
					<a href="category-list.php">Category list</a>
				</li>
				<li>
					<a href="product-list.php">Product list</a>
				</li>
			</ul>
		</div>
	</header>
	<main>
		<section class="left_block">
			<div class="border_left_block">
				<div class="padding_block">
					<p>
						Edit category
					</p>
					<div class="input_position">
						<form id="edit-category" method="POST" action="update-category.php">
							<select name="category-id" style="margin-top:10px">
								<option value="1">Select Category</option>
								<?php 
							 	//Get list of categories

								$jsonurl = "https://pure-reaches-2979.herokuapp.com/api/v1/categories?offset=0&limit=100";
								$json = file_get_contents($jsonurl);
								$json = utf8_encode($json); 
								$response = json_decode($json, true);
								$message = $response["content"];
								$items = $message["items"];
								$rows = $message["totalSize"];
								$cols = 3; 
								for ($tr=0; $tr<=$rows-1; $tr++){ 
									$item = $items[$tr];
									$number = $tr+1;
									echo '<option value="'. $item["id"].'">'. $item["name"] .'</option>';
								}
								?>
							</select>
							<input  type="text" placeholder="name" name="name">
							<input  type="text" placeholder="description" name="description">
							<input  type="text" placeholder="icon url" name="image">
							<button class="botton_submit" >Submit</button>
						</form>
					</div>
				</div>
			</div>
		</section>
		<section class="right_block">
			<div class="border_left_block">
				<div class="padding_block">
					<p>
						Add category 
					</p>
					<div class="input_position">
						<form id="add-category" method="POST" action="post-category.php">
							<input  type="text" placeholder="name" name="name">
							<input  type="text" placeholder="discription" name="description">
							<input  type="text" placeholder="icon url" name="image">
							<button class="botton_submit" >Submit</button>
						</form>
					</div>
				</div>
			</div>
		</section>

	</main>
	<footer>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</footer>