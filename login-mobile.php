<?php

session_start();
$error=''; 

include "connection.php";
 if(isset($_POST['login'])) {
      // id and password sent from form 
      
      $empid = mysqli_real_escape_string($connection,$_POST['empid']);
      $password = mysqli_real_escape_string($connection,$_POST['password']); 
      
      $sql = "SELECT customer_id FROM customer WHERE emp_id= '$empid' and password = '$password'";
      $result = mysqli_query($connection,$sql);
      $row = mysqli_fetch_assoc($result);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $adminempid and $adminpassword, table row must be 1 row
		
      if($count == 1) {
		  session_start();
         $_SESSION["empid"]=$empid;
         
         //pikiaqq satt
		  header("location: dashboard-mobile.php");
		   
      }else
		  
	  {
          
		 echo "Wrong employee id or password!";
      }
   }


?>



<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body  class="bg-dark" >
<div style="margin-top: 10%">
	    
		<img class="img logo rounded-circle center  mb-auto " style="width:200px" src="images/logo.PNG">
		<div class="a "><b>Canteen Pay</b></div>
		
</div>
	  
<div class=" login-container">
         
	
               <div class=" login-form-1">
                <form class="" method="POST" action="">
                 
                        <div class="form-group">
							<label><div class="b "><b>Employee ID</b></div></label>
                            <input type="text"  class="form-control" name="empid" value="" />
                        </div>
                        <div class="form-group">
							<label><div class="b "><b>Password</b></div></label>
                            <input type="password"  class="form-control" name="password" value="" />
                        </div>
                        <div class="form-group buttonHolder">
                            <input type="submit" class="btnSubmit" name="login"   value="Login" />
                        </div>
                        <?php /*?><div class="form-group">
                            <a href="#" class="btnForgetPwd">Forget Password?</a>
                        </div><?php */?>
                    </form
                </div>
            
           
        </div>
	
	</body>
<style>
	.buttonHolder{
    text-align: center;
}

	div.a{
		font-size: 200%;
		text-align: center;
   		
    	color:#fff;
		
	}
		div.b{
		font-size: 100%;
		text-align: center;
   		
    	color:#fff;
		
	}

		input[type=submit]{
	
	}
.login-container{
    
    margin-bottom: 5%;
	padding: 9%;
}
.login-logo{
    position: relative;
    margin-left: -41.5%;
}
.login-logo img{
    position: absolute;
    width: 20%;
    margin-top: 19%;
    background: #282726;
    border-radius: 4.5rem;
    padding: 5%;
}
.login-form-1{
    padding: 5%;
    background:#282726;
	
    box-shadow:0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}


.btnSubmit{
	
    font-weight: 1000;
    width: 50%;
    color: #282726;
    background-color: #fff;
    border: none;
    border-radius: 1.5rem;
    padding:2%;
}


.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
</style>