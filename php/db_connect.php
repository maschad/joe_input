<?php

$con = mysqli_connect('localhost','root','','joe_database');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"joe_database");

?>