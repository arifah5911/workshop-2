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


if (isset($_POST['addmenu'])) 
	{

		$menu_name = mysqli_real_escape_string($connection, $_POST['menu_name']);
		$menu_type = mysqli_real_escape_string($connection, $_POST['menu_type']);
		$menu_price = mysqli_real_escape_string($connection, $_POST['menu_price']);
		$menu_serve = mysqli_real_escape_string($connection, $_POST['menu_serve']);
	
	
				
		$sqlInsert = "INSERT INTO menu (menu_name,menu_price,menu_type,menu_serve) VALUES('$menu_name','$menu_price','$menu_type','$menu_serve')"; 
		$resultInsert = mysqli_query($connection, $sqlInsert) or die(mysqli_error($sqlInsert));
		
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
			$failed = "Failed inserted data.";
		}
			
		

	//	}
}
	


?>
	 
	
	   <style>
		body {
		/*	font-family: 'Varela Round', sans-serif;*/
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
				<div class="p-2 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.PNG);"></a>
	        <ul class="list-unstyled components mb-5">
	          <li >
	     		 <a href="cashier.php">Cashier</a>
	          </li>
			   <li>
              <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Menu Update</a>
              <ul class="collapse list-unstyled" id="pageSubmenu1">
                <li  class="active">
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
                <li>
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
	           
				  <a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
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

  <div class="container" style="margin-left:50px;margin-top:80px">
	
          <div class="row">
			
            <div class="col-lg-4">
			  
			<h1 class="font-weight-bold" style="color: #FFB600;font-size:7vw; margin-top:60px">DrInKs</h1>
              <!-- Circle Buttons -->
              <div class="card shadow mb-4" style="margin-top:80px">
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
				<p class="text-center">Your information successfully Updated!</p>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
			</div>
		</div>
	</div>
</div> 
               
                <div class="card-body">
                 <form class="" method="post" action="" enctype="multipart/form-data">
    
			 <div class="form-group">
            <div class="form-label-group">
		      <label for="Name">Name</label>
              <input type="Name" name="menu_name" class="form-control" placeholder="Name" required="required">
        
            </div>
          </div>
	
			<div class="form-group">
			             <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
					
					
					<label for="type">Type of drink</label>
                   <select class="form-control" name="menu_type">
					  <option value="drink_cold">Cold</option>
					  <option value="drink_Hot">Hot</option>
					</select>
                  
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
			      <label for="cold"> Price</label>
					
                  <input type="text" name="menu_price" class="form-control" placeholder="Price" required="required">
					 <input type="hidden" name="menu_serve" class="form-control" value="full serve" placeholder="" required="required">
            
                </div>
              </div>
            </div>
          </div>
			<button type="submit" name="addmenu" class="btn btn-primary btn-block">Add Menu</button>

        </form>
		
					
					
					
              </div>


            </div>
				
			  </div>
			  
	       <div class="col-lg-6">

              <div class="card shadow mb-4">		  
<div class="panel panel-default">
   <div class="panel-body">  
    <div class="box box-info">
            <div class="box-body">
				
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#hot">Hot</a></li>
    <li><a data-toggle="tab" href="#cold">Cold</a></li>
 <h4 style="color:#FF7F01;margin-left: 80px"><b>DRINKS</b></h4>
  </ul>

  <div class="tab-content">
    <div id="hot" class="tab-pane fade in active">
     
        
			<table class="table table-sm">
  <col width="0">
  <col width="175">
  <col width="50">
  <col width="100">
  <col width="100">
  <thead>
	  
    <tr >
      <th scope="col">#</th>
      <th scope="col">Name</th>

	  <th scope="col">Price</th>
	  <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
	 

  	<?php
				
				$readSQL = "SELECT * FROM menu WHERE menu_type like '%drink_Hot%' ";
					
				

				$resultRead = mysqli_query($connection, $readSQL);
				$total = 0;

	  
	  			$i = 1;
				while($row = mysqli_fetch_assoc($resultRead)){ 
			   	?>
             	<tr align="left">
				<td> <?php
                    echo $i;
                    $i++;
                ?></td>
               <td><?php echo ($row['menu_name']); ?></td>
				
              
               <td><?php echo $row['menu_price']; ?> </td>
				<td><button type="button" name="update1" class="btn btn-info btn-block" data-toggle="modal" data-target="#editCust<?php echo $row['menu_id']; ?>">Update</button>
					
			
					
	<div class="modal fade" id="editCust<?php echo $row['menu_id']; ?>" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">UPDATE DRINKS</h4>
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										
									</div>
									<div class="modal-body">  
										<form method="POST" action="drinks-update.php" class="form-horizontal">
										<!-- Site ID -->
										<div class="form-group">
											<input type="text" name="id" value="<?php echo $row['menu_id'] ?>" /hidden>
									
											<label class="control-label col-sm-4" for="name">NAME :</label>
											<div class="col-sm-5">
												<input type="text" class="form-control" name="name" value="<?php echo $row['menu_name'] ?>" />
												
											</div>
										</div>
								
							<!--			<div class="form-group">
										<label class="control-label col-sm-4" for="site-ID">Type of Drink :</label>
										<div class="col-sm-3">
												<select name="type" class="form-control">
												<option value="drink_Hot"  <?php if($row['menu_type']=="drink_Hot"){ echo "selected"; } ?>>Hot</option>
												<option value="drink_cold" <?php if($row['menu_type']=="drink_cold"){ echo "selected"; } ?>>Cold</option>
											
	
												</select>
											</div>
										</div>-->
									
										<div class="form-group">
											<label class="control-label col-sm-4" for="site-Name">PRICE :</label>
											<div class="col-sm-5">
												<input type="text" class="form-control" name="price" value="<?php echo $row['menu_price'] ?>" />
											</div>
										</div>
							
										
									</div>
									<div class="modal-footer">
									  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
									  <button name="EditDrinkHot" type="submit" class="btn btn-primary">Edit</button>
									</div>
									</form>
									<?php if(isset($failed)){ ?><div class="alert alert-danger" role="alert"> <?php echo $failed; ?> </div><?php } ?>
								</div>

							</div>
						</div>		
					
				
					
					
					
				</td>
				
				<td><button type="submit" name="addmenu" data-toggle="modal" class="btn btn-danger btn-block" data-target="#deleteModal<?php echo $row['menu_id']; ?>">Delete</button>
					
				
				
					<div class="modal fade" id="deleteModal<?php echo $row['menu_id']; ?>" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Delete File</h4>
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										
									</div>
									<div class="modal-body">
									  <p>Are you sure want to delete this record ?</p>
									</div>
									
									
									
									<div class="modal-footer">
									  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
									  <a href="drinks-delete.php?id=<?php echo $row['menu_id']; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
									</div>  
									
									
								</div>
							</div>
						</div>
					
					
					
					
				</td>
					
				
					
         		
				 
             </tr>
	
		  	<?php } ?>


		
  </tbody>
</table>
    </div>
    	<div id="cold" class="tab-pane fade">
      		<table class="table table-sm">
				  <col width="0">
				  <col width="175">
				  <col width="50">
				  <col width="200">
				  <col width="75">
  					<thead>
						<tr>
						  <th scope="col">#</th>
						  <th scope="col">Name</th>
						  <th scope="col"></th>
						  <th scope="col">Qty</th>
						  <th scope="col">Price</th>
						</tr>
 					</thead>
  					<tbody>

					<?php

								$readSQL = "SELECT * FROM menu WHERE menu_type like '%drink_Cold%' ";



								$resultRead = mysqli_query($connection, $readSQL);
								$total = 0;


								$i = 1;
								while($row = mysqli_fetch_assoc($resultRead)){ 
								?>
								<tr align="left">
								<td> <?php
									echo $i;
									$i++;
								?></td>
							   <td><?php echo ($row['menu_name']); ?></td>


							   <td><?php echo $row['menu_price']; ?> </td>

								<td><button type="submit" name="addmenu" class="btn btn-danger btn-block">Delete</button></td>

									<?php } ?>
								</tr>
					</tbody>
			</table>
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
		</div>
		</div>
				

  </body>
	
</html>