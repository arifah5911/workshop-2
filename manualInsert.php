<?php

require_once('connection.php');
$total = 0;  
$takeaway = 0;
$additional_meal= 0;

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
<!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->
	  <!-- drinks header -->
	  						

	   	<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
		  		
				echo "<script>$(window).load(function(){
								console.log('asd');
								 $('#myModal').modal('show');
							});
							
							</script>";
					
			}
			else
			{
						echo "Error: " . $sqlInsert . "<br>" . $connection->error;
			}

	}



?>

	  <style>
		body {
	
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
	  
  	<!--	 Start increase row-->
	<script language="JavaScript">
		
		window.onload = function(){
			var totalmeal = 0;
		  	var lastTotal = 0;
		  	var takeaway = 0;
		  	var finalamount = 0;
		  	var checkbox = '';
			
			var totalmenu = document.getElementById("totalmenuamount").value;
			var checkbox = document.getElementById("checkbox").value;
			
			if(checkbox != null && checkbox != ''){
				if(totalmenu <= '1.5'){
					takeaway = '0.2'
				}
				else if(totalmenu >= '1.5' && totalmenu <= '3'){
					takeaway = '0.5'	
				}
				else if(totalmenu >= '3'){
					takeaway = '1.0'	
				}
			}
			finalamount = parseFloat(totalmenu) + parseFloat(takeaway);
			document.getElementById("subtotal").innerHTML = (Math.round(totalmenu * 100) / 100).toFixed(2);
			document.getElementById("takeawaydisplay").innerHTML = (Math.round(takeaway * 100) / 100).toFixed(2);
			var final = document.getElementById("finalamount").innerHTML = (Math.round(finalamount * 100) / 100).toFixed(2);
			document.getElementById('totalX').value = final;
		}
		
		$(document).ready(function() {
		  	var i = 1;
		  	var totalmeal = 0;
		  	var lastTotal = 0;
		  	var takeaway = 0;
		  	var finalamount = 0;
		  	var checkbox = '';
		  	$("#add_row").click(function() {
					
				
				var add = document.getElementById("add").value;
				var totalmenu = document.getElementById("totalmenuamount").value;
				var checkbox = document.getElementById("checkbox").value;
				$('#increaserow').append("<tr id=addr" + (i + 1) + "><td></td><td>ADD ONS</td><td></td><td></td><td>RM " + (Math.round(add * 100) / 100).toFixed(2) +"</td></tr>");
				
				i++;
				totalmeal = parseFloat(totalmeal) + parseFloat(add);
				lastTotal = parseFloat(totalmeal) + parseFloat(totalmenu);
				
				if(checkbox != null && checkbox != ''){
					if(lastTotal <= '1.5'){
						takeaway = '0.2'
					}
					else if(lastTotal >= '1.5' && lastTotal <= '3'){
						takeaway = '0.5'	
					}
					else if(lastTotal >= '3'){
						takeaway = '1.0'	
					}
				}
				
				finalamount = parseFloat(lastTotal) + parseFloat(takeaway);
				
				
				document.getElementById("subtotal").innerHTML = (Math.round(lastTotal * 100) / 100).toFixed(2);
				document.getElementById("takeawaydisplay").innerHTML = (Math.round(takeaway * 100) / 100).toFixed(2);
				
				var final = document.getElementById("finalamount").innerHTML = (Math.round(finalamount * 100) / 100).toFixed(2);
				document.getElementById('totalX').value = final;
				
			
				document.getElementById('add').value="";
				

		  	});
		});
  	</script>
	<!--	  End increase row-->
	 
  </head>
  <body class="bg-dark">
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
									<a href="#">Drinks</a>
								</li>
								<li>
									<a href="#">Meals</a>
								</li>
								<li>
									<a href="#">Add Ons</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" >Customer</a>
							<ul class="collapse list-unstyled" id="pageSubmenu2">
								<li >
									<a href="#">Registration</a>
								</li >
								<li class="active">
									<a href="#">Customer Account</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Invoice</a>
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
			<div id="content"style="margin-top: 5%">
			
			<!-- main page start -->
			<div class="col-lg-8 col-md-16" style="margin-left:180px">
							
				<div class="card mt-5">
					<div class="card-header card-header-warning">
						<table class="table">
							<td><strong>MANUAL INSERT</strong></td>
							<td> 
								<input type="text" name="additional_meal" class="form-control" placeholder="price (ex: 3.00)" required="required" id="add">
							</td>
							<td> 
								<button class="btn btn-primary btn-block" id="add_row" name="action">Place Order</button>
							</td>
							<?php
//							
							if(!empty($_POST["takeAway"])){
								?>
								<input type="hidden" id="checkbox" value="<?php echo $_POST["takeAway"] ?>">
								<?php
							}
							else{
								?>
								<input type="hidden" id="checkbox" value="">
								<?php
							}
							?>
								
							
						</table>	 
					</div>
					<div class="card-body table-responsive">
						<table class="table table-hover" id="increaserow">
							<thead class="text-warning">
								<th>No</th>
								<th>Item Description</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Amount</th>
							</thead>
							<tbody>
								<?php
						
									$increase = 0;
									$totalB = 0;
									$total_menu_amount = 0;
									foreach ($_POST as $key => $value)
									{ 
										if($value != 0 ){
											$value1 = $value;
											echo '<input name="'.$key.'" type="hidden" value="'.$value1.'">';
										
										
										if(is_numeric($key)&& $key != 0){
											
											
											$result = mysqli_query($connection, "SELECT * FROM menu WHERE menu_id = $key " );
											while($row = mysqli_fetch_array($result))
											{
												$increase++;
												$menu_price = $row['menu_price'];
												$menu_name = $row['menu_name'];
												$menu_id = $row['menu_id'];
												$menu_amount = $value*$menu_price;
												$total_menu_amount += $menu_amount;
												?>
												<tr>
													<td></td>
													<td><?php echo $menu_name ?></td>
													<td><?php echo $value ?></td>
													<td><?php echo $menu_price ?></td>
													<td>RM <?php echo number_format((float)$menu_amount, 2, '.', '') ?></td>
												</tr>
												<?php
											}
										}
										}
									}
							
								?>
								<input type="hidden" id="totalmenuamount" value="<?php echo $total_menu_amount ?>">
							</tbody>
							<tfoot>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td><strong>Subtotal</strong></td>
									<td>RM <span id="subtotal" ></span></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td><strong>Take Away Charge</strong></td>
									<td>RM <span id="takeawaydisplay"></span></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td><strong>TOTAL</strong></td>
									
									<td>RM <span id="finalamount"></span></td>
								</tr>
								
							</tfoot>
						</table>
					</div>
				</div>
				<br>
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
						<p class="text-center">Transaction Successfully!</p>
					</div>
					<div class="modal-footer">
					<button class="btn btn-success btn-block" onclick="document.location='cashier.php'" >OK</button>
						
			<!--			<a href="cashier.php" ><button class="btn btn-success btn-block" onclick="document.location='cashier.php'" >OK</button></a>-->
					</div>
				</div>
			</div>
		</div>
				<div >
						<?php
//							
							if(!empty($_POST["card_id"])){
						
								$idCard = $_POST['card_id'];
								$resultRead = mysqli_query($connection, "SELECT * FROM customer WHERE card_id= '$idCard' ");
									$row = mysqli_fetch_assoc($resultRead);
								
								?>
								
				
								

				
					<form action="" method="post">
							<input type="hidden" name="usage_amount" value="<?php echo $row['usage_amount'] ?>">
							<input type="hidden" name="customer_id" value="<?php echo $row['customer_id'] ?>">
							<input type="hidden" name="balance_amount" value=  "<?php echo $row['balance_amount'] ?>">
							<input type="hidden"  id ="totalX" name="total"  onclick ="this.value = ''">
							<button class="btn btn-lg  btn-block  float-right" style="width: 35%;color: black;background-color: #FFA500" id="confirm order" name="confirm">
							<b> <i class="fa fa-send" style="font-size:24px"></i>   CONFIRM ORDER
							</b></button>
						
					</form>
							
					<?php
								}
								?>
					</div>
			</div>
			<!-- main page close -->
		</div>
	</div>
   <!-- <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>-->
</body>

</html>