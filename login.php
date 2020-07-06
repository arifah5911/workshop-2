

<?php

session_start();
$error=''; 

include "connection.php";
 if(isset($_POST['login'])) {
      // id and password sent from form 
      
      $username = mysqli_real_escape_string($connection,$_POST['username']);
      $password = mysqli_real_escape_string($connection,$_POST['password']); 
      
      $sql = "SELECT id FROM admin WHERE username= '$username' and password = '$password'";
      $result = mysqli_query($connection,$sql);
      $row = mysqli_fetch_assoc($result);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $adminempid and $adminpassword, table row must be 1 row
		
      if($count == 1) {
		  session_start();
         $_SESSION["username"]=$username;
         
         //pikiaqq satt
		  header("location: cashier.php");
		   
      }else
		  
	  {
          
		 echo "Wrong employee id or password!";
      }
   }

?>
	
