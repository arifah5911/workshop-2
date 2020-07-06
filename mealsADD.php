<?php

require_once('connection.php');

?>


<?php


if (isset($_POST['addmenu'])) 
	{
	
		

		$menu_name = mysqli_real_escape_string($connection, $_POST['menu_name']);
		$menu_price = mysqli_real_escape_string($connection, $_POST['menu_price']);
		$menu_type = mysqli_real_escape_string($connection, $_POST['menu_type']);
		$menu_serve = "";
	
							if(isset($_POST["breakfast"],$_POST["lunch"],$_POST["hitea"])){
									$menu_serve = "fullserve";
								}
							elseif(isset($_POST["breakfast"],$_POST["lunch"])){
									$menu_serve = "halfserveBL";
								}
							else if(isset($_POST["breakfast"],$_POST["hitea"])){
									$menu_serve = "halfserveBH";
								}
							else if(isset($_POST["lunch"],$_POST["hitea"])){
									$menu_serve = "halfserveLH";
								}
							else if(isset($_POST["breakfast"])){
									$menu_serve = $_POST["breakfast"];
								}
							else if(isset($_POST["lunch"])){
									$menu_serve = $_POST["lunch"];
								}
							else if(isset($_POST["hitea"])){
									$menu_serve = $_POST["hitea"];
								}
							else{
								$menu_serve = "fullserveM";
								}
							
							
						
				
		$sqlInsert = "INSERT INTO menu (menu_name,menu_type,menu_price,menu_serve) VALUES('$menu_name','$menu_type','$menu_price','$menu_serve')"; 
		$resultInsert = mysqli_query($connection, $sqlInsert) or die(mysqli_error($sqlInsert));
		
		if($resultInsert)
		{
			
				/*echo("<script>alert('Successfully inserted data!');
			window.location.href='meals.html';</script>");*/
		}
		else
		{
			$failed = "Failed inserted data.";
		}
			
		

	//	}
}
	


?>
