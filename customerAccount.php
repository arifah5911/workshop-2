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
                <li >
                    <a href="cashier.php">Registration</a>
                </li >
                <li class="active">
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

	 <div class="col-lg-8 col-md-16" style="margin-left:180px; margin-top: 100px">
              <div class="card mt-5">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Customer info </h4>
                  <p class="card-category">New customer on 29 June, 2020</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">

                      <th>Employee ID</th>
                      <th>Name</th>
                      <th> Range Salary</th>
                      <th>Email</th>
					  <th></th>
						<th></th>
                    </thead>
                    <tbody>
                      <?php
				
				
				
				$readSQL = "SELECT * FROM customer ";
					
				

				$resultRead = mysqli_query($connection, $readSQL);
				$total = 0;

				while($row = mysqli_fetch_assoc($resultRead)){ 
			   	?>
             	<tr align="left">
				<td><?php echo $row['emp_id']; ?></td>
               <td><?php echo ($row['name']); ?></td>
				
               <td><?php echo $row['range_salary']; ?></td>
               <td><?php echo $row['email']; ?>
				
					
					<?php } ?>
					
         		 </td>
				 
             </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>



</body>
		 <!-- main page close -->
		
		
		</div>
      	
		</div>

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