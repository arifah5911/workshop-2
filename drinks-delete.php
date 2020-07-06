<?php
	require_once('connection.php');
	


	

	$id = $_GET['id']; 
	$deleteSQL = "DELETE FROM menu WHERE menu_id=$id";
	$resultDelete = mysqli_query($connection, $deleteSQL);
	
	if($resultDelete)
		header('location: drinks.php');
	else
		echo "Failed to delete";
?>