<?php
// Get list of categories
/*
$jsonurl = "https://pure-reaches-2979.herokuapp.com/api/v1/categories?offset=0&limit=10";
$json = file_get_contents($jsonurl);
echo "$json";
$json = utf8_encode($json); 
$response = json_decode($json, true);
echo "<br>";
print_r($response);
echo "<br>";
$message = $response["content"];
print_r($message);
*/
echo "<br>";
$url = 'https://pure-reaches-2979.herokuapp.com/api/v1/products/new';
$bodyArray = array('name' => $_POST['name'], 'description' => $_POST['description'], 'categoryId' => $_POST['category-id'], 'unitId' => $_POST['unit-id'], 'image' => $_POST['icon-url']);
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
#$parsedResponse = json_decode($response);
#$metadata = $parsedResponse["metadata"];
#$code = $metadata["code"];

echo "<br>";
#var_dump($parsedResponse);
echo "<br>";
#echo "$code";
if ($code == "200") {
	echo "<h1>SUCCESS !!!</h1>";
}
echo "<br>";

echo "<br>";
# Get the response
curl_close($ch);
echo "<br>";
#echo json_decode($response);
#$result = http_post_fields($url, $data);
echo "<br>";
echo "<br>";
echo "<a href='add-category.php'><h2>Add/update category</h2></a>";
echo "<br>";
echo "<br>";
echo "<a href='add-product.php'><h2>Add product</h2></a>";
#var_dump($result);

?>