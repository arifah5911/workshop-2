<?php
session_start();
require_once('connection.php');



	$empid=$_SESSION["empid"];
	//$resultRead = mysqli_query($connection, "SELECT * FROM site INNER JOIN project ON site.WoNo=project.WoNo AND site.id='$ID'"); 
	$resultRead = mysqli_query($connection, "SELECT * FROM customer WHERE emp_id= '$empid' ");
	$row = mysqli_fetch_assoc($resultRead);

$limit_amount = $row['limit_amount'];
$balance_amount = $row['balance_amount'];
$ans = $limit_amount - $balance_amount;
$used_amount = $ans;
$ans2 = $balance_amount/$limit_amount*100;
$percent = $ans2;

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Simple Pie Chart</title>
    <script type="application/javascript" src="piechart-master/rpie.js"></script>
</head>


<style>
	mark { 
  background-color: #FFFFFF;
  color: black;
}
</style>


<body  style="background-color:#EDCF33;" >
<div style="margin-top: 10%">
	    
		<div class="C"><b>Hye <?php echo $row['name']; ?>!</b>
		<div class="d"><b>LIMIT AMOUNT : <mark>RM <?php echo $row['limit_amount']; ?></mark></b>
			<br>
			<br>
 	<div class="false-For-Bottom-Text">	
		<div class="mypiechart">	
			<canvas id="myCanvas8" width="350" height="350"></canvas>			
		</div>
	
	</div>
</div>
	  
<div class=" login-container">
         
	<div class="b"><b>Your Balance :</b> </div>
               <div class=" login-form-1">
                
                 
				   <div class="e"><b>RM <?php echo $row['balance_amount']; ?></b> </div>
                    
                </div>
            
           
        </div>
	
	</body>
	<script type="text/javascript">
	
		var obj8 = {
						pie: 'stroke',
						values: [<?php echo $percent ?>],
						colors: ['#28334AFF'],
						isStrokePie: {
							stroke: 40,
							overlayStroke: true,
							overlayColor: '#eee',
							strokeStartEndPoints: 'Yes',
							strokeAnimation: true,
							strokeAnimationSpeed: 40,
							fontSize: '80px',
							textAlignement: 'center',
							fontFamily: 'Arial',
							fontWeight: 'bold'
						}
					  };
		


		
		//Generate myCanvas8
		generatePieGraph('myCanvas8', obj8);
		

		
		
		
	</script>

<style>
	.buttonHolder{
    text-align: center;
}

	div.a{
		font-size: 200%;
		text-align: center;
   		
    	color:#eee;
		
	}
		div.e{
		font-size: 150%;
		text-align: center;
   		
    	color:#eee;
		
	}
	div.C{
		font-size: 150%;
		text-align: center;
   		
    	color:#000000;
		
	}
		div.d{
		font-size: 70%;
		text-align: center;
   		
    	color:#000000;
		
	}

	
	input[type=text]{
		width: 100%;
		border : 8px solid #aaa;
		border-radius: 16px;
		margin: 32px 0;
		outline: none;
		padding: 32px;
		box-sizing: border-box;
		transition: 3s;
	}
	
		input[type=text]:focus{
		border-color: dodgerblue;
		box-shadow: 0 0 8px 0 dodgerblue;
	}
		input[type=password]{
		width: 100%;
		border : 8px solid #aaa;
		border-radius: 16px;
		margin: 32px 0;
		outline: none;
		padding: 32px;
		box-sizing: border-box;
		transition: 3s;
	}
	
		input[type=password]:focus{
		border-color: dodgerblue;
		box-shadow: 0 0 8px 0 dodgerblue;
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
    background:#28334AFF;
	
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