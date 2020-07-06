<?php

require_once('connection.php');
$total = 0;  
$takeaway = 0;

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
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.PNG);"></a>
	        <ul class="list-unstyled components mb-5">
	          <li >
	     		 <a href="#">Cashier</a>
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
	           
				  <a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
	          </li>
	         
	        </ul>

	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>

        <!-- Page Content  -->
    
		  <div id="content" >
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
	
        
        </nav>
			  
		 <!-- main page start -->
<body class="bg-dark" >

	 <div class="col-lg-8 col-md-16" style="margin-left:180px">
              <div class="card mt-5">
                <div class="card-header card-header-warning">
        			
						 <form class="formValidate col s12 m12 l6" id="formValidate" method="post" action="manualInsert.php" novalidate="novalidate">
							 <table class="table">
								 <td><strong>MANUAL INSERT</strong></td>
								 <td> <input type="text" name="additional_meal" class="form-control" placeholder="price (ex: 3.00)" required="required"> </td>
								 <td><button class="btn btn-primary btn-block" type="submit" name="action">Place Order</button></td>
							 
							 </table>
                      
					  <?php
					  	foreach ($_POST as $key => $value)
						{
							if($value == '0'){
									break;
								}
								
							
							echo '<input name="'.$key.'" type="text" value="'.$value.'">';
						}
					  ?>
							  
                    </form>
					
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">

                      <th>No</th>
                      <th>Item Description</th>
                      <th> Quantity</th>
                      <th>Price</th>
					  <th>Amount</th>
						<th></th>
                    </thead>
                    <tbody>
						<?php
						
  
		
			
	foreach ($_POST as $key => $value)
	{ 
		if($value == '0' ){
			break;
		}
		
		
		
					  	
						
							echo '<input name="'.$key.'" type="text" value="'.$value.'">';
						
					  
                  echo'   ';
		if(is_numeric($key)&& $key != 0){
			
		$result = mysqli_query($connection, "SELECT * FROM menu WHERE menu_id = $key " );
		while($row = mysqli_fetch_array($result))
		{
			$menu_price = $row['menu_price'];
			$menu_name = $row['menu_name'];
			$menu_id = $row['menu_id'];
			
				
					
		}
			$menu_amount = $value*$menu_price;
	
			$i = 0;
			$i++;
					  
			echo'
					
				<tr align="left">
				<td> ';
                
				$i;
				
					  
                
				
					
				
                echo '
				</td>
					<td>'.$menu_name.'</td>
				<td>'.$value.' Pieces</td>
					<td>RM '.$menu_price.'</td>
					<td>RM ';
			
						
				echo	number_format((float)$menu_amount, 2, '.', '') ; 
			
			
			echo ' </td> 
					
              
             </tr>';
		$total = $total + $menu_amount;
			
			if(!empty($_POST['takeAway'])){
							if($total <= '1.5'){
									$takeaway = 0.2;
								}
							else if($total > '1.5'&& $total < '3'){
									$takeaway = 0.5;
								}
							else if($total >= '3'){
									$takeaway = 1.0;
								}
							else{
								$takeaway = 0.0;
							}
							
						}
			$totalA = $total + $takeaway;
			
	}
	}
					echo '	
						
							<tr align="left">
					<td></td>
					<td></td>
					<td></td>
					<td><strong>Take Away Charge</strong></td>
					<td>RM ';
					
					
				echo	number_format((float)$takeaway, 2, '.', '') ; 
					
				
					echo'
					</td> 
					
              
             				</tr>
							
				<tr align="left">
				<td> 
                     
                   
                
				</td>
				
					<td></td>
					<td></td>
					<td><strong>TOTAL</strong></td>
					<td><strong>RM ';
						
				echo	number_format((float)$totalA, 2, '.', '') ;
					
								echo'
              </td>
             </tr>
			
			 
			 ';
						
		
?>
						
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>



</body>
		 <!-- main page close -->
		
		
		</div>
      	
		</div>
	  
	  <script>
		  
		  function placeOrder(){
			  document.form{}
		  }
	  </script>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
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