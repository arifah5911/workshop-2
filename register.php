<?php

require_once('connection.php');
	
			
?>  

<!doctype html>
<html lang="en">
  <head>
  	<title>Sidebar 01</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">

	<!-- drinks header -->
<!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
<!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
<!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->
	  <!-- drinks header -->
<!--
	  <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
-->
	  
	  
  	<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
	<?php


if (isset($_POST['register'])) 
	{
				
		
			$custName = $_POST['name'];
			$cardId = $_POST['cardId'];
			$EmployeeId =$_POST['EmployeeId'];
			$RangeSalary =$_POST['RangeSalary'];
			$inputEmail = $_POST['inputEmail'];
			$inputPassword =  $_POST['inputPassword'];
			$confirmPassword = $_POST['confirmPassword'];

			$limit_ammount= 0;
			
			if($RangeSalary == "RM500-RM1000"){
				$limit_ammount = 240;
			}
			else if($RangeSalary == "RM1001-RM1500"){
				$limit_ammount = 360;
			}
			else if($RangeSalary == "RM1501-RM2000"){
				$limit_ammount = 480;
			}
			else if($RangeSalary == "RM2001-RM2500"){
				$limit_ammount = 600;
			}
			else{
				$limit_ammount = 0;
			}
	
			
	
			$target_dir = "customer-images/";
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$uploadOk = 1;

				$ext = basename($_FILES["fileToUpload"]["name"]);
				$name = md5(rand()). '' . $ext;
				$target_file =  $target_dir . $name;
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) {
					$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
					if($check !== false) {
						echo "File is an image - " . $check["mime"] . ".";
						$uploadOk = 1;
					} else {
						echo "File is not an image.";
						$uploadOk = 0;
					}
				}
				// Check if file already exists
				if (file_exists($target_file)) {
					echo "Sorry, file already exists.";
					$uploadOk = 0;
				}
				// Check file size
				if ($_FILES["fileToUpload"]["size"] > 500000) {
					echo "Sorry, your file is too large.";
					$uploadOk = 0;
				}
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
					echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					$uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					echo "Sorry, your file was not uploaded.";
	
	
	
	
				// if everything is ok, try to upload file
				} 
	
				$sql_u = "SELECT * FROM customer WHERE emp_id='$EmployeeId'";
			$res_u = mysqli_query($connection, $sql_u);
	
			
			if (mysqli_num_rows($res_u) > 0) {
					echo("<script>alert('Employee ID already exist!');
					window.location.href='register.html';</script>"); }
	
			else {
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			
	
					$sqlInsert = "INSERT INTO customer (name,card_id,emp_id,range_salary,email,password,limit_amount,balance_amount,file_path) VALUES('$custName','$cardId','$EmployeeId','$RangeSalary','$inputEmail','$inputPassword','".$limit_ammount."','".$limit_ammount."', '".$target_file."')"; 
				
					$resultInsert = mysqli_query($connection, $sqlInsert);


					if($resultInsert)
					{
						echo "<script>$(window).load(function(){
								console.log('asd');
								 $('#myModal').modal('show');
							});
							</script>";
					}
					else
					{
						echo("<script>function JSalert();</script>");
					}

				}
			}
	
}

?>
	  
	  <style>
		body {
			/*<!--font-family: 'Varela Round', sans-serif;-->*/
		}
		.modal-confirm {		
			color: #636363;
			width: 325px;
			margin: 30px auto;
		}
		.modal-confirm .modal-content {
			padding: 20px;
			border-radius: 5px;
			border: none;
		}
		.modal-confirm .modal-header {
			border-bottom: none;   
			position: relative;
		}
		.modal-confirm h4 {
			text-align: center;
			font-size: 26px;
			margin: 30px 0 -15px;
		}
		.modal-confirm .form-control, .modal-confirm .btn {
			min-height: 40px;
			border-radius: 3px; 
		}
		.modal-confirm .close {
			position: absolute;
			top: -5px;
			right: -5px;
		}	
		.modal-confirm .modal-footer {
			border: none;
			text-align: center;
			border-radius: 5px;
			font-size: 13px;
		}	
		.modal-confirm .icon-box {
			color: #fff;		
			position: absolute;
			margin: 0 auto;
			left: 0;
			right: 0;
			top: -70px;
			width: 95px;
			height: 95px;
			border-radius: 50%;
			z-index: 9;
			background: #82ce34;
			padding: 15px;
			text-align: center;
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
		}
		.modal-confirm .icon-box i {
			font-size: 58px;
			position: relative;
			top: 3px;
		}
		.modal-confirm.modal-dialog {
			margin-top: 80px;
		}
		.modal-confirm .btn {
			color: #fff;
			border-radius: 4px;
			background: #82ce34;
			text-decoration: none;
			transition: all 0.4s;
			line-height: normal;
			border: none;
		}
		.modal-confirm .btn:hover, .modal-confirm .btn:focus {
			background: #6fb32b;
			outline: none;
		}
		.trigger-btn {
			display: inline-block;
			margin: 100px auto;
		}
	</style>
  </head>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.PNG);"></a>
	        <ul class="list-unstyled components mb-5">
	          <li >
	     		 <a href="cashier.php">Cashier</a>
	          </li>
			   <li>
              <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Menu Update</a>
              <ul class="collapse list-unstyled" id="pageSubmenu1">
                <li>
                    <a href="drinks.php">Drinks</a>
                </li>
                <li>
                    <a href="meals.php">Meals</a>
                </li>
                
              </ul>
	          </li>
			   <li>
              <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" >Customer</a>
              <ul class="collapse list-unstyled" id="pageSubmenu2">
                <li class="active">
                    <a href="register.html">Registration</a>
                </li>
                <li>
                    <a href="customerAccount.php">Customer Account</a>
                </li>
                
              </ul>
	          </li>
	          <li>
	              <a href="invoice-template.php">Invoice</a>
	          </li>
	     	  <li>
	           
				  <a href="index.html"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
	          </li>
	         
	        </ul>

	        <div class="footer">
	        	
	        </div>

	      </div>
    	</nav>

        <!-- Page Content  -->
    
		  <div id="content" >
       
			  
		 <!-- main page start -->
<body class="bg-dark" >

  <div class="container" style="margin-left:50px;margin-top: 100px">
	   <div class="col-md-10">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Registration Customer Account </div>
      <div class="card-body">
         <form class="" method="post" action="register.php" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
				    <div class="form-label-group">
			      <label for="cardId">Card ID</label>
                  <input type="text" name="cardId" class="form-control" placeholder="Card Id" required="required" autofocus>
            
                </div>
               
              </div>
              <div class="col-md-6">
              <div class="form-label-group">
					<label for="EmployeeId">Employee ID</label>
                  <input type="text" name="EmployeeId" class="form-control" placeholder="Employee Id" required="required" autofocus="autofocus">
                  
                </div>
              </div>
            </div>
			</div>
			<div class="form-group">
			             <div class="form-row">
              <div class="col-md-6">
                
				   <div class="form-label-group">
					
					<label for="firstName">Name</label>
                  <input type="text" name="name" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                  
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
			      <label for="RangeSalary"> Range Salary</label>
            		   <select class="form-control" name="RangeSalary">
					  <option value="RM500-RM1000">RM500-RM1000</option>
					  <option value="RM1001-RM1500">RM1001-RM1500</option>
					  <option value="RM1501-RM2000">RM1501-RM2000</option>
					  <option value="RM2001-RM2500">RM2001-RM2500</option>
					</select>
                </div>
              </div>
            </div>
          </div>
			 		<div class="form-group">
			             <div class="form-row">
              <div class="col-md-6">
                
				  <div class="form-label-group">
		      <label for="inputEmail">Email address</label>
              <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required="required">
        
            </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
					 <label for="images">Select image to upload:</label>
			      <input type="file" accept="image/*" name="fileToUpload" id="fileToUpload">
                </div>
              </div>
            </div>
          </div>
    
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
				  <label for="inputPassword">Password</label>
                  <input type="password" name="inputPassword" class="form-control" placeholder="Password" required="required">
                  
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
				  <label for="confirmPassword">Confirm password</label>
                  <input type="password" name="confirmPassword" class="form-control" placeholder="Confirm password" required="required">
                  
                </div>
              </div>
            </div>
          </div>
          
			 <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
        </form>
     	
<!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE876;</i>
				</div>				
				<h4 class="modal-title">Done!</h4>	
			</div>
			<div class="modal-body">
				<p class="text-center">Your information successfully inserted!</p>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
			</div>
		</div>
	</div>
</div> 
      </div>
    </div>
	  </div>
  </div>
  



		
		
		</div>
      	
		</div>


  </body>
	

	<style>
			:root {
  /* larger checkbox */
}
:root label.checkbox-bootstrap input[type=checkbox] {
  /* hide original check box */
  opacity: 0;
  position: absolute;
  /* find the nearest span with checkbox-placeholder class and draw custom checkbox */
  /* draw checkmark before the span placeholder when original hidden input is checked */
  /* disabled checkbox style */
  /* disabled and checked checkbox style */
  /* when the checkbox is focused with tab key show dots arround */
}
:root label.checkbox-bootstrap input[type=checkbox] + span.checkbox-placeholder {
  width: 14px;
  height: 14px;
  border: 1px solid;
  border-radius: 3px;
  /*checkbox border color*/
  border-color: #737373;
  display: inline-block;
  cursor: pointer;
  margin: 0 7px 0 -20px;
  vertical-align: middle;
  text-align: center;
}
:root label.checkbox-bootstrap input[type=checkbox]:checked + span.checkbox-placeholder {
  background: #0ccce4;
}
:root label.checkbox-bootstrap input[type=checkbox]:checked + span.checkbox-placeholder:before {
  display: inline-block;
  position: relative;
  vertical-align: text-top;
  width: 5px;
  height: 9px;
  /*checkmark arrow color*/
  border: solid white;
  border-width: 0 2px 2px 0;
  /*can be done with post css autoprefixer*/
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transform: rotate(45deg);
  content: "";
}
:root label.checkbox-bootstrap input[type=checkbox]:disabled + span.checkbox-placeholder {
  background: #ececec;
  border-color: #c3c2c2;
}
:root label.checkbox-bootstrap input[type=checkbox]:checked:disabled + span.checkbox-placeholder {
  background: #d6d6d6;
  border-color: #bdbdbd;
}
:root label.checkbox-bootstrap input[type=checkbox]:focus:not(:hover) + span.checkbox-placeholder {
  outline: 1px dotted black;
}
:root label.checkbox-bootstrap.checkbox-lg input[type=checkbox] + span.checkbox-placeholder {
  width: 26px;
  height: 26px;
  border: 2px solid;
  border-radius: 5px;
  /*checkbox border color*/
  border-color: #737373;
}
:root label.checkbox-bootstrap.checkbox-lg input[type=checkbox]:checked + span.checkbox-placeholder:before {
  width: 9px;
  height: 15px;
  /*checkmark arrow color*/
  border: solid white;
  border-width: 0 3px 3px 0;
}
		</style>
</html>