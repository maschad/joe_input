<?php

$con = mysqli_connect('localhost','root','','joe_database');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM cloud_services WHERE item_name = 'storage' ";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
    echo $row['item_price'];
 
}

mysqli_close($con);
?>