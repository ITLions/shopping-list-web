<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add/edit product</title>
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
					<a href="add-unit.php">Add/edit unit</a>
				</li>
				<li>
					<a href="category-list.php">Category list</a>
				</li>
				<li>
					<a href="product-list.php">Product list</a>
				</li>
				<li>
					<a href="unit-list.php">Unit list</a>
				</li>
			</ul>
		</div>
	</header>
	<main>
		<section class="left_block">
			<div class="border_left_block">
				<div class="padding_block">
					<p>
						Add product
					</p>
					<div class="input_position">
						<form id="product" method="POST" action="post-product.php">
							<input  type="text" placeholder="name" name="name" required>
							<input  type="text" placeholder="description" name="description">
							<input  type="text" placeholder="category id" name="category-id" required>
							<input  type="text" placeholder="icon url" name="icon-url" required>
							<input  type="text" placeholder="unit id" name="unit-id" required> 
							<button class="botton_submit" >Submit</button>
						</form>
					</div>


				</div>
			</div>
			<div class="border_left_block">
				<div class="padding_block">
					<p>
						Edit product
					</p>
					<div class="input_position">
						<form id="product" method="POST" action="update-product.php">
						<select name="product-id" style="margin-top:10px" required>
								<option value="1">Select product</option>
								<?php 
							 	//Get list of categories

								$jsonurl = "https://pure-reaches-2979.herokuapp.com/api/v1/products?offset=0&limit=100";
								$json = file_get_contents($jsonurl);
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
							<input  type="text" placeholder="name" name="name" required>
							<input  type="text" placeholder="description" name="description">
							<input  type="text" placeholder="category id" name="category-id" required>
							<input  type="text" placeholder="icon url" name="icon-url" required>
							<input  type="text" placeholder="unit id" name="unit-id" required> 
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
						List of categories
					</p>
					<table  border="1" width="100%" cellpadding="15">
						<tr>
							<th>№</th>
							<th>category ID</th>
							<th>category Name</th>

						</tr>
						<?php 
							 //Get list of categories

						$jsonurl = "https://pure-reaches-2979.herokuapp.com/api/v1/categories?offset=0&limit=100";
						$json = file_get_contents($jsonurl);
						$response = json_decode($json, true);
						$message = $response["content"];
						$items = $message["items"];
						$rows = $message["totalSize"];
						$cols = 3; 
						for ($tr=0; $tr<=$rows-1; $tr++){ 
							echo '<tr class="border_bottom">';
							$item = $items[$tr];
							$number = $tr+1;
							echo '<td>'. $number .'</td>';
							echo '<td>'. $item["id"] .'</td>';
							echo '<td>'. $item["name"] .'</td>';
							echo '</tr>';
						}
						?>
					</table>
				</div>
			</div>
			<div class="border_left_block">
				<div class="padding_block">
					<p>
						List of units
					</p>
					<table  border="1" width="100%" cellpadding="15">
			<tr>
				<th>№</th>
				<th>unit ID</th>
				<th>unit Name</th>
			</tr>
			<?php 
							 //Get list of categories

			$jsonurl = "https://pure-reaches-2979.herokuapp.com/api/v1/units?offset=0&limit=100";
			$json = file_get_contents($jsonurl);
			$json = utf8_encode($json); 
			$response = json_decode($json, true);
			$message = $response["content"];
			$items = $message["items"];
			$rows = $message["totalSize"];
			$cols = 3; 
			for ($tr=0; $tr<=$rows-1; $tr++){ 
				echo '<tr class="border_bottom">';
				$item = $items[$tr];
				$number = $tr+1;
				echo '<td>'. $number .'</td>';
				echo '<td>'. $item["id"] .'</td>';
				echo '<td>'. $item["name"] .'</td>';
				echo '</tr>';
			}
			?>
		</table>
				</div>
			</div>

		</section>

	</main>
	<footer>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</footer>