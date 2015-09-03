<?php

require 'db_connect.php';

$sql="SELECT * FROM cloud_services WHERE item_name = 'storage' ";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
    echo $row['item_price'];
 
}

mysqli_close($con);
?>