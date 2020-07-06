<?php

require_once('connection.php');
	
			
?>


<?php


if (isset($_POST['confirm'])) 
	{
	

			$customer_id = $_POST['customer_id'];
			$balance_amount = $_POST['balance_amount'];
			$usage_amount = $_POST['usage_amount'];
			$total = $_POST['total'];
			$date = date('Y-m-d');
			
			

			$sqlInsert = "INSERT INTO order_details (customer_id,date,amount) VALUES('$customer_id','$date','$total')"; 
			
			$resultInsert = mysqli_query($connection, $sqlInsert);
				
			if($resultInsert)
			{
				
					$ans = $balance_amount - $total;
					$balance = $ans;
				
					$ans2 = $usage_amount + $total;
					$balance2 = $ans2;
					
					$updateSQL = "UPDATE customer SET balance_amount = '$balance',usage_amount = '$balance2' WHERE customer_id = '$customer_id'";
					$resultUpdate = mysqli_query($connection, $updateSQL);
		  		
					echo("<script>alert('Successfully inserted data!');
				window.location.href='cashier2.php';</script>");
					
			}
			else
			{
						echo "Error: " . $sqlInsert . "<br>" . $connection->error;
			}

	}



?>
