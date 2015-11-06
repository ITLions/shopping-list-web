<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update category</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" >
</head>
<body>
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
</body>
</html>
<?php
$categoryId = $_POST["category-id"];
$url = 'https://pure-reaches-2979.herokuapp.com/api/v1/categories/'.$categoryId.'/update';
$bodyArray = array('name' => $_POST['name'], 'description' => $_POST['description'], 'image' => $_POST['image']);
$data = json_encode($bodyArray);
# Create a connection
$ch = curl_init($url);
# Setting our options
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
#curl_setopt($ch, CURLOPT_STDERR, $fp);
echo "<br>";
$response = curl_exec($ch);

# Get the response
curl_close($ch);
echo "<br>";

echo "<br>";
echo "<a href='add-category.php'><h2>Add/update category</h2></a>";
echo "<br>";
echo "<br>";
echo "<a href='add-product.php'><h2>Add product</h2></a>";
#var_dump($result);

?>