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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	  <!-- drinks header -->
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
                <li>
                    <a href="drinks.php">Drinks</a>
                </li>
                <li class="active">
                    <a href="meals.php">Meals</a>
                </li>
              
              </ul>
	          </li>
			   <li>
              <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" >Customer</a>
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

  <div class="container" style="margin-left:50px; margin-top:40px">
	
	  
	  	 
          <div class="row">
			
            <div class="col-lg-4">
			  
			<h1 class="font-weight-bold" style="color: #FFB600;font-size:7vw; margin-top:60px">MeALs</h1>
              <!-- Circle Buttons -->
              <div class="card shadow mb-4" style="margin-top:80px">
               
                <div class="card-body">
             <form class="" method="post" action="mealsADD.php" enctype="multipart/form-data">
    
			 <div class="form-group">
            <div class="form-label-group">
		      <label for="Name">Name</label>
              <input type="Name" name="menu_name" class="form-control" placeholder="Name" required="required">
        
            </div>
          </div>
			 	 <div class="form-group">
            <div class="form-label-group">
		      <label for="type">Type of Serve</label>
              <!--     <select class="form-control" name="menu_serve">
					  <option value="breakfast">Breakfast</option>
					  <option value="lunch">>Lunch</option>
					  <option value="hitea">>Hi Tea</option>
					  <option value="addons">>Add Ons</option>
					</select>-->
				
            </div>
          </div>
		
			 <div class="form-group">
            <div class="form-label-group">
		 		<table>
					<tr>	
						<td> 
							<label class="checkbox-inline checkbox-bootstrap checkbox-lg">
       				 		<input name="breakfast"  value="breakfast"  type="checkbox" >
      				 		<span class="checkbox-placeholder"></span>
    				 		</label>
			  			 </td>
						 <td> Breakfast 
						 </td>
					</tr>
					<tr>	
						<td> 
							<label class="checkbox-inline checkbox-bootstrap checkbox-lg">
       				 		<input name="lunch"  value="lunch" type="checkbox" >
      				 		<span class="checkbox-placeholder"></span>
    				 		</label>
			  			 </td>
						 <td> Lunch 
						 </td>
					</tr>
					<tr>	
						<td> 
							<label class="checkbox-inline checkbox-bootstrap checkbox-lg">
       				 		<input name="hitea"  value="hitea" type="checkbox" >
      				 		<span class="checkbox-placeholder"></span>
    				 		</label>
			  			 </td>
						 <td> Hi-Tea 
						 </td>
					</tr>
				
				</table>
				
            </div>
          </div>
				 
				 
        
					 		 <div class="form-group">
            <div class="form-label-group">
		      <label for="price">Price</label>
              <input type="text" name="menu_price" class="form-control" placeholder="price" required="required">
        		<input type="hidden" name="menu_type" value="meal" class="form-control" placeholder="type" required="required">
            </div>
          </div>
		

		<button type="submit" name="addmenu" class="btn btn-primary btn-block">Add Menu</button>
        </form>
					
					
					
					
              </div>


            </div>
				
			  </div>

            <div class="col-lg-6">

              <div class="card shadow mb-4">
          
             
                    <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th>No</th>
                      <th>Name</th>
                      <th>Type of Meals</th>
                      <th>Price</th>
					  <th></th>
                    </thead>
                    <tbody>
                    <?php
				
				
				
				$readSQL = "SELECT * FROM menu WHERE menu_type like '%meal%'";
					
				

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
				<td><?php echo ($row['menu_serve']); ?></td>
					<td><?php echo ($row['menu_price']); ?></td>
					
               <td>
				   <button type="button" name="update1" class="btn btn-info btn-block" data-toggle="modal" data-target="#editCust<?php echo $row['menu_id']; ?>">Update</button>
					</td>
					<td>
				<button type="submit" name="addmenu" class="btn btn-danger btn-block">Delete</button>
					
					<?php } ?>
					
         		 </td>
				 
             </tr>
                    </tbody>
                  </table>
                </div>
           
              </div>

            </div>

          </div>

	  
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

		 <!-- main page close -->
		
		
		</div>
      	
		</div>

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