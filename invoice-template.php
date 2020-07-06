<!doctype html>
<html lang="en">
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//index.php

$connection = mysqli_connect('localhost', 'root', '', 'canteendb');

$message = '';

//$connect = new PDO("mysql:host=localhost;dbname=canteendb", "root", "");

function fetch_customer_data($connection){
	
	$output = '
	<div >
		<table  width="90%" border="0" align="center">
			<tr><td><h1><b> INVOICE </b> </h1></td>
				<td><b></b></td>
				<td></td>
	
				<td><h4><small>Date: 29/6/2020</small></h4></td>
			
			</tr>
			<tr>
			
				<td>
				From<br>
		  		<strong>LAY HONG FOOD CANTEEN </strong><br>
				<strong>Manager</strong><br>
				No 29A Jalan K/P2 ,<br>
				45500 Tanjong Karang, Selangor.<br>
				Phone: 03-32698964 / 013-78986775<br>
				Email: fanamhaf@gmail.com
		
				<td>
				To<br>
				<strong>LAY HONG FOOD COOPERATION</strong><br>
				<strong>Human Resources Department</strong><br>
				Lot 16456, Jalan Tengkorak,<br>
				45500 Tanjong Karang, Selangor.<br>
				Phone: 03-32678567 / 016-2188806<br>
				Email: info@layhong.com.my
				</td>
				
				<td>
				<b>No.Invoice: 000001</b>
				<br>
		  		<br>
				<b>Payment Due:</b> 30/6/2020<br>
		  		<b>Account:</b> 968-34567 (CIMB)
				</td>
				<td></td>
			
			</tr>
	
		</table>
	</div>
	<br>
	<br>
	<br>

		<div>
			<table width="90%" border="0" align="center">
				<thead>
					<tr >
						<th>No</th>
						<th>Employee Id</th>
						<th>Name</th>
						<th></th>
						<th>Amount</th>
					</tr>
				</thead>
				<tbody>
				';
	
//				if (isset($_POST['searchInvoice'])){
//					$date = mysqli_real_escape_string($connection, $_POST['monthInv']);
//					$value = date('m', strtotime($date));

					/*$readSQL1 = "SELECT * FROM order_details INNER JOIN customer ON order_details.customer_id=customer.customer_id WHERE MONTH(`date`) = MONTH(NOW()) GROUP BY card_id";*/
					$readSQL1 = "SELECT * FROM customer ";
					$resultRead = mysqli_query($connection, $readSQL1);
					
					$readSQL2= mysqli_query($connection, "SELECT SUM(usage_amount) AS value_sum  FROM customer ");
					$row2 = mysqli_fetch_assoc($readSQL2);
					$total = 0;
						$i = 1;
					while($row = mysqli_fetch_assoc($resultRead)){
						$output .= '
						<tr>
							<td>'.
								$i
								
           					.'</td> 
							<td>'. $row['emp_id'] .'</td> 
							<td>'. $row['name'] .'</td> 
							<td></td>
							<td>'. $row['usage_amount'] .'</td> 
						</tr>
						';
						$i++;
					}
					$output .= '
					
							<tr >
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
							</tr>
							<tr >
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
							</tr>
							<tr >
								<th></th>
								<th></th>
								<th></th>
								<th style=""><h3>TOTAL:</h3></th>
								<td><h3>RM'.$row2["value_sum"].'</h3></td>
							</tr>
					</tbody>
					
				</table>
			</div>

	
		
		
		';
//	}
	return $output;
}

if(isset($_POST["action"]))
{
	include('pdf.php');
	$file_name = md5(rand()) . '.pdf';
	$html_code = '<link rel="stylesheet" href="bootstrap.min.css">';
	//$html_code .= '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">';
	//$html_code .= '<link rel="stylesheet" href="css/style.css">';
	//$html_code .= '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"';
	//$html_code .= '<script src="js/main.js"></script>';

	
	
	$html_code .= fetch_customer_data($connection);
	//$html_code = ($html);
	//$html_code = file_get_contents("index3.php"); 
	 
	$pdf = new Pdf();
	$pdf->load_html($html_code);
	$pdf->setPaper('A4', 'landscape');
	$pdf->render();

	$pdf->stream();
}
if(isset($_POST["actionGmail"]))
{
	include('pdf.php');
	$file_name = md5(rand()) . '.pdf';
	$html_code = '<link rel="stylesheet" href="bootstrap.min.css">';
	

	
	
	$html_code .= fetch_customer_data($connection);

	 
	$pdf = new Pdf();
	$pdf->load_html($html_code);
	$pdf->setPaper('A4', 'landscape');
	$pdf->render();

	
	$file = $pdf->output();
	
	file_put_contents($file_name, $file);
	
	
		
	require 'vendor/autoload.php';
	$mail = new PHPMailer(true);
	$mail->isSMTP();
	$mail->SMTPAuth = true;						
	//$mail->SMTPAuth();
	$mail->SMTPSecure = 'tls';
	$mail->Host = 'smtp.gmail.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
	$mail->Port = 587;//Sets SMTP authentication. Utilizes the Username and Password variables
	$mail->isHTML();
	$mail->Username = 'layhongcanteen@gmail.com';					//Sets SMTP username
	$mail->Password = '@Rifah1234';					//Sets SMTP password
	$mail->SetFrom('arifahahmad2412@gmail.com');	
	$mail->AddAttachment($file_name);     				//Adds an attachment from a path on the filesystem
	$mail->Subject = 'Payment June';			//Sets the Subject of the message
	$mail->Body = 'Payment details in attach PDF File.';	
	//Sets the From email address for the messag			//Sets the From 
	$mail->AddAddress('arifahahmad2412@gmail.com');		//Adds a "To" address
								
								
				//An HTML or plain text message body
	if($mail->Send())								//Send an Email. Return true on success or false on error
	{
		/*echo "<script>$(window).load(function(){
								console.log('asd');
								 $('#myModal').modal('show');
							});
							</script>";*/
		
	}
	else
	{
		$message = '<label class="text-success">zzzzzz</label>';
	}
	unlink($file_name);
}
?>

  <head>
  	<title>Sidebar 01</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
	  
	  <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  
  <!-- drinks header 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	   drinks header -->

	  	  
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
  <body>

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
                    <a href="cashier.php">Registration</a>
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
<body >
  <div class="invoice p-3 mb-3" style="margin-top: 100px;">
            <?php
						echo fetch_customer_data($connection);
						?>
				<br>
				  <br>
				  

              <!-- this row will not appear when printing -->


		
	    <div class="hidden-print">
                <div class="col-12">
             
					<form method="POST">
								
									<input type="submit" name="actionGmail" id="myBtn" class="btn btn-success float-right" style="margin-right: 5px;" value="Submit Payment">

					</form>
                  <button type="button" onClick="printla()"  class="btn btn-default float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Print
                  </button>
								<form method="POST">
								
									<input type="submit" name="action" onClick="" class="btn btn-primary float-right" style="margin-right: 5px;" value="Generate PDF">

								</form>
		       				 				<!-- Modal HTML -->

                </div>
              </div>
            </div>
	

<!--
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

	

		 <!-- main page close -->
		
		
		</div>
      	
		</div>
<script type="text/javascript"> 
	function printla() {
  window.addEventListener( window.print());
	}
	
	
</script>
<script>
$(document).ready(function(){
  $("#myBtn").click(function(){
    $("#myModal").modal();
  });
});
</script>
			
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
				<p class="text-center">Invoice successfully send to Human Resource!</p>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
			</div>
		</div>
	</div>
</div>
	<!--		
   <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>-->
  </body>

</html>