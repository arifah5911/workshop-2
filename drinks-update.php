<?php

require_once('connection.php');

?>


<?php


		if(isset($_POST['EditDrinkHot']))
	{
		$id = mysqli_real_escape_string($connection, $_POST['id']);
		$name = mysqli_real_escape_string($connection, $_POST['name']);
/*		$type = mysqli_real_escape_string($connection, $_POST['type']);*/
		$price = mysqli_real_escape_string($connection, $_POST['price']);

		
		
		
		
		
		
		$updateSQL = "UPDATE `menu` SET `menu_name` = '$name', `menu_price` = '$price' WHERE `menu`.`menu_id` = $id";
		$resultUpdate = mysqli_query($connection, $updateSQL);
		
		if ($resultUpdate)
		{
		header('location: drinks.php');
	
		}
		else
		{
			header('location: drinks.php');
			$failed = "Failed to update record";
		}
	}

?>

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
<style>
		body {
			font-family: 'Varela Round', sans-serif;
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
