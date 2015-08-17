<?php

	require 'db_connect.php';

	if(isset($_REQUEST['submit']))
	{
		$errorMessage = "Error!";
		$company=$_POST['company'];
		$contact=$_POST['contact'];
		$address=$_POST['address'];
		$secondary=$_POST['secondary'];
		$address=$_POST['address'];
		$third=$_POST['third'];
		$telephone=$_POST['telephone'];

		 
		// Validation will be added here
		 
		if ($errorMessage != "" ) {
		echo "<p class='message'>" .$errorMessage. "</p>" ;
		}
		else{
			//Inserting record in table using INSERT query
			$insqDbtb="INSERT INTO `users`.`members`
			(`company`, `contact`, `address`, `secondary`,
			`third`,`telephone`, `email`) VALUES ('$company', '$contact', 
			'$address', '$secondary', '$third','$telephone','$email')";
			mysqli_query($link,$insqDbtb) or die(mysqli_error($link));
		}
	}
?>