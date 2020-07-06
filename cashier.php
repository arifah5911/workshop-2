<?php

require_once('connection.php');
$name = "";  
$balance_amount = "";
$emp_id = "";
$image = "https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg";
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- drinks header -->
  <!-- spinner -->
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
   <!-- spinner -->
	  
  </head>
  <body class="bg-dark">
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.PNG);"></a>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
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
              <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Customer</a>
              <ul class="collapse list-unstyled" id="pageSubmenu2">
                <li>
                    <a href="register.php">Registration</a>
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
		
		<div class="container" style="margin-top:15px">
	<div class="row">
 
       <div class="col-md-5">

		   
<div class="panel panel-default">
  <div class="panel-heading">  <h9 >Customer Profile</h9></div>
	
   <div class="panel-body">
       
    <div class="box box-info">
        
            <div class="box-body">
					<?php
				if(isset($_POST['idCard'])){
					$idCard = $_POST['idCard'];
					//echo $idCard;
					
					$resultRead = mysqli_query($connection, "SELECT * FROM customer WHERE card_id= '$idCard' ");
					$row = mysqli_fetch_assoc($resultRead);
					
						$name = $row['name'];
					$balance_amount = $row['balance_amount'];
					$limit_amount = $row['limit_amount'];
					$emp_id = $row['emp_id'];
					$image = $row['file_path'];
				}
				?>
                     <div class="col-sm-3">
                     <div  align="center"> <img alt="User Pic" src="<?php echo $image  ?>" id="profile-image1" class="img-circle img-responsive"> 
                
                <input id="profile-image-upload" class="hidden" type="file">

                <!--Upload Image Js And Css-->
   						<form method="post" id="form" action="">
					<input type="password" id="idCardCss" name="idCard" size="1"  autofocus>
				</form>
                     </div>
              <br>
    
              <!-- /input-group -->
            </div>
			
				
				<style> 
				  
					#idCardCss{
  					  border: 0px solid white;
							  }
					input:focus{
 				 	  outline: none;
					  font-size: 1px;
							   }

					
				</style>
				
            <div class="col-sm-6" id="showCust">
			
            <h3>ID:  <?php echo $emp_id  ?></h3>
			 <span><h4 style="color:#00b1b1;"><?php echo $name ?></h4></span>
              <span><p>Balance Acc :RM <?php echo $balance_amount ?></p></span>            
            </div>
			  <div class="col-sm-3">
				         <div  align="center"> <img alt="User Pic" src="images/takeAway.PNG" id="profile-image1" class="img-circle img-responsive"> 
                

                <!--Upload Image Js And Css-->
   
                     <form class="formValidate" id="formValidate"  name="form" method="post" action="manualInsert.php" novalidate="novalidate" >
						 
               <label class="checkbox-inline checkbox-bootstrap checkbox-lg">
       				 <input  name="takeAway"  value="takeAway" type="checkbox" >
      				 <span class="checkbox-placeholder"></span>
    				 </label>
						 <input type="hidden" name="card_id" value="<?php echo $row['card_id'] ?>" class="form-control" >
						 <input type="hidden" name="customer_id" value="<?php echo $row['customer_id'] ?>" class="form-control" >
						 <input type="hidden" name="limit_amount" value="<?php echo $row['limit_amount'] ?>" class="form-control" >
						<?php 
	
	/*?> <input type="text" name="usage_amount" value="<?php echo $row['usage_amount'] ?>" class="form-control" ><?php */?>
 				</div>
			           
            </div>
           <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>         
    </div> 
    </div>


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
  <col width="200">
  <col width="75">
  <thead>
	  
    <tr >
      <th scope="col">#</th>
      <th scope="col"><b>NAME</b></th>

      <th scope="col"></th>
	  <th scope="col"></th>
	  <th scope="col">PRICE</th>
    </tr>
  </thead>
  <tbody>
	  	  
	  <script>
		
	  </script>
	 
  	<?php
				
				$readSQL = "SELECT * FROM menu WHERE menu_type like '%drink_hot%' ";
					
				

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
				
               <td>  <!--<label class="checkbox-inline checkbox-bootstrap checkbox-lg">
       				 <input type="checkbox" checked>
      				 <span class="checkbox-placeholder"></span>
    				 </label>-->
			   </td>
					<td>
						
						<div class="input-group number-spinner">
				<span class="input-group-btn">
					<button class="btn btn-default" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
				</span>
							
			
							
									<?php
					echo '<input id="'.$row["menu_id"].'" value="0" class="form-control text-center"   name="'.$row["menu_id"].'" type="text"  data-error=".errorTxt'.$row["menu_id"].'"><div class="errorTxt'.$row["menu_id"].'"></div>';
					?>
							
				<span class="input-group-btn">
					<button class="btn btn-default" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
					
				</span>
			</div>	
							
				</td>
               <td><?php echo $row['menu_price']; ?>
				
					
					<?php } ?>
					
         		 </td>
				 
             </tr>
	
		  
		  
		
		
  
</table>
    </div>
    <div id="cold" class="tab-pane fade">
      	<table class="table table-sm">
  <col width="0">
  <col width="175">
  <col width="50">
  <col width="200">
  <col width="75">
 
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col"></th>
	  <th scope="col"></th>
	  <th scope="col">Price</th>
    </tr>


      <?php
				
				
				
				$readSQL = "SELECT * FROM menu WHERE menu_type like '%drink_cold%' ";
					
				

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
				
               <td>  <!--<label class="checkbox-inline checkbox-bootstrap checkbox-lg">
       				 <input type="checkbox" checked>
      				 <span class="checkbox-placeholder"></span>
    				 </label>-->
			   </td>
					<td>
						
						
					<div class="input-group number-spinner">
				<span class="input-group-btn">
					<button class="btn btn-default" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
				</span>
							
			
							
									<?php
					echo '<input id="'.$row["menu_id"].'" value="0" class="form-control text-center"   name="'.$row["menu_id"].'" type="text"  data-error=".errorTxt'.$row["menu_id"].'"><div class="errorTxt'.$row["menu_id"].'"></div>';
					?>
							
				<span class="input-group-btn">
					<button class="btn btn-default" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
					
				</span>
			</div>
							
				</td>
               <td><?php echo $row['menu_price']; ?>
				
					
					<?php } ?>
					
         		 </td>
				 
             </tr>
  
		 
</table>
    </div>
   
  </div> <!--tab-content -->

        </div>
        </div>         
   		 </div> 
    	</div>  
		   
		   
		</div> <!--col-md-5 -->
		
<div class="col-md-6 ">
<div class="panel panel-default">
 <div class="panel-body">
       <div class="box box-info">
		   <div class="box-body">


  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#Breakfast">Breakfast</a></li>
	 
    <li><a data-toggle="tab" href="#lunch">Lunch</a></li>
	<li><a data-toggle="tab" href="#hitea">Hi Tea</a></li>
	
 	<h4 style="color:#FF7F01;margin-left: 80px"><b>MEALS</b></h4>
  </ul>

  <div class="tab-content">
    <div id="Breakfast" class="tab-pane fade in active">
		<table class="table table-sm">
  <col width="0">
  <col width="275">
  <col width="50">
  <col width="200">
  <col width="75">

    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col"></th>
	  <th scope="col"></th>
	  <th scope="col">Price</th>
    </tr>

    <?php
				
				
				
				$readSQL1 = "SELECT * FROM menu WHERE menu_serve = 'breakfast' ";
					
				

				$resultRead1 = mysqli_query($connection, $readSQL1);
				$total = 0;

	  
	  			$i = 1;
				while($row1 = mysqli_fetch_assoc($resultRead1)){ 
			   	?>
             	<tr align="left">
				<td> <?php
                    echo $i;
                    $i++;
                ?></td>
               <td><?php echo ($row1['menu_name']); ?></td>
				
               <td>  <!--<label class="checkbox-inline checkbox-bootstrap checkbox-lg">
       				 <input type="checkbox" checked>
      				 <span class="checkbox-placeholder"></span>
    				 </label>-->
			   </td>
					<td>
						
								<div class="input-group number-spinner">
				<span class="input-group-btn">
					<button class="btn btn-default" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
				</span>
							
			
							
									<?php
					echo '<input id="'.$row1["menu_id"].'" value="0" class="form-control text-center"   name="'.$row1["menu_id"].'" type="text"  data-error=".errorTxt'.$row1["menu_id"].'"><div class="errorTxt'.$row1["menu_id"].'"></div>';
					?>
									
							
				<span class="input-group-btn">
					<button class="btn btn-default" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
					
				</span>
			</div>
							
				</td>
               <td><?php echo $row1['menu_price']; ?>
				
					
					<?php } ?>
					
         		 </td>
				 
             </tr>
    
			 
</table>
		
    </div>
	
    <div id="lunch" class="tab-pane fade">
      	<table class="table table-sm">
  <col width="0">
  <col width="275">
  <col width="50">
  <col width="200">
  <col width="75">

    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col"></th>
	  <th scope="col"></th>
	  <th scope="col">Price</th>
    </tr>

		  <?php
				
				
				
				$readSQL = "SELECT * FROM menu WHERE menu_serve = 'lunch' ";
					
				

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
				
               <td> <!-- <label class="checkbox-inline checkbox-bootstrap checkbox-lg">
       				 <input type="checkbox" checked>
      				 <span class="checkbox-placeholder"></span>
    				 </label>-->
			   </td>
					<td>
					<div class="input-group number-spinner">
				<span class="input-group-btn">
					<button class="btn btn-default" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
				</span>
							
			
							
									<?php
					echo '<input id="'.$row["menu_id"].'" value="0" class="form-control text-center"   name="'.$row["menu_id"].'" type="text"  data-error=".errorTxt'.$row["menu_id"].'"><div class="errorTxt'.$row["menu_id"].'"></div>';
					?>
							
				<span class="input-group-btn">
					<button class="btn btn-default" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
					
				</span>
			</div>
							
				</td>
               <td><?php echo $row['menu_price']; ?>
				
					
					<?php } ?>
					
         		 </td>
				 
             </tr>

		
</table>
    </div> 
   	<div id="hitea" class="tab-pane fade">
      	<table class="table table-sm">
  <col width="0">
  <col width="275">
  <col width="50">
  <col width="200">
  <col width="75">
 
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col"></th>
	  <th scope="col"></th>
	  <th scope="col">Price</th>
    </tr>

		  <?php
				
				
				
				$readSQL = "SELECT * FROM menu WHERE menu_serve = 'hitea'";
					
				

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
				
               <td>  <!--<label class="checkbox-inline checkbox-bootstrap checkbox-lg">
       				 <input type="checkbox" checked>
      				 <span class="checkbox-placeholder"></span>
    				 </label>-->
			   </td>
					<td>
						
						<div class="input-group number-spinner">
				<span class="input-group-btn">
					<button class="btn btn-default" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
				</span>
							
			
							
									<?php
					echo '<input id="'.$row["menu_id"].'" value="0" class="form-control text-center"   name="'.$row["menu_id"].'" type="text"  data-error=".errorTxt'.$row["menu_id"].'"><div class="errorTxt'.$row["menu_id"].'"></div>';
					?>
							
				<span class="input-group-btn">
					<button class="btn btn-default" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
					
				</span>
			</div>
							
				</td>
               <td><?php echo $row['menu_price']; ?>
				
					
					<?php } ?>
					
         		 </td>
				 
             </tr>

</table>
    </div> 
	  
  </div> <!--tab-content -->
          </div>
        </div>         
    </div> 
    </div>
<br>
    <button class="btn btn-warning btn-lg btn-block" type="submit" name="action">Place Order</button>

	  </form> 
		</div>  
		
		
		
		
		</div> <!--row -->
		</div> <!--container -->
		 <!-- main page close -->
		
		
		</div>
      	
		</div>
	  <!-- spinner -->
	<script>
	$(document).on('click', '.number-spinner button', function () {    
		var btn = $(this),
			oldValue = btn.closest('.number-spinner').find('input').val().trim(),
			newVal = 0;

		if (btn.attr('data-dir') == 'up') {
			newVal = parseInt(oldValue) + 1;
		} else {
			if (oldValue > 0) {
				newVal = parseInt(oldValue) - 1;
			} else {
				newVal = 0;
			}
		}
		btn.closest('.number-spinner').find('input').val(newVal);
		return false;
	});
	 </script>
      <!-- spinner -->		  
   
	<script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
    <!-- checkbox style-->
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
  background: #F7C701;
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
	<!-- checkbox style-->

</html>