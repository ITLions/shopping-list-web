<?php
echo "<br>";
$url = 'https://pure-reaches-2979.herokuapp.com/api/v1/categories/new';
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

$response = curl_exec($ch);
curl_close($ch);
echo "<br>";
echo "<a href='add-category.php'><h2>Add/update category</h2></a>";
echo "<br>";
echo "<br>";
echo "<a href='add-product.php'><h2>Add product</h2></a>";
#var_dump($result);

?>