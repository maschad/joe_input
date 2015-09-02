<?php
	require 'db_connect.php';

	$sql=mysqli_query("select * from cloud_services"); 
	$records = array();

	 //Loop through all our records and add them to our array
	while($r = mysqli_fetch_assoc($sql))
    {
        $records[] = $r;        
    }

    //Output the data as JSON
    $json = json_encode($records);   

    //writing to file
	$fp = fopen('/price_calculation_digi/data/results.json', 'w');
	fwrite($fp, $json);
	fclose($fp);
?>
