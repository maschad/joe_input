<?php
require 'db_connect.php';

//initalize arrays
$posts = array();
$response = array();

//write query and send to db
$sql="SELECT * FROM cloud_services limit 20";
$result = mysqli_query($con,$sql);

//Loop through all our records and add them to our array
while($row = mysqli_fetch_assoc($result))
{
    $item_name=$row['item_name']; 
	$item_price=$row['item_price']; 
	$item_quality=$row['item_quality'];
	$posts[] = array('item_name'=> $item_name, 'item_price'=> $item_price,'item_quality'=> $item_quality);     
}

$response['posts'] = $posts;


//writing to file
$fp = fopen('../data/results.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);


mysqli_close($con);

?>
