<?php

	require 'db_connect.php';

	$errorMessage = "Error!";
	$company=$_POST['company'];
	$contact=$_POST['contact'];
	$address=$_POST['address'];
	$secondary=$_POST['secondary'];
	$third=$_POST['third'];
	$telephone=$_POST['telephone'];
	$email=$_POST['email'];

	 
	 
	if ($errorMessage != "" ) {
	echo "<p class='message'>" .$errorMessage. "</p>" ;
	}
	else{
		//Inserting record in table using INSERT query
		$insqDbtb="INSERT INTO account_info (`company`, `contact`, `address`, `secondary`,
		`third`,`telephone`, `email`) VALUES ('$company', '$contact', 
		'$address', '$secondary', '$third','$telephone','$email')";
		mysqli_query($link,$insqDbtb) or die(mysqli_error($link));
	}
?>