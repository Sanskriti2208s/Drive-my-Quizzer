<?php
require "common.php";
if (isset($_SESSION['email']))
	{   header('location: home2.php'); }

?>
<html>
<head>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
<script type="text/javascript" src="bootstrap/js/jquery-3.5.0.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <!--jQuery library--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--Latest compiled and minified JavaScript--> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css" type="text/css">	
<title>signup</title>

</head>
<body style="background-color:rgb(220,220,220,0.4);">
<?php
include "header_new.php";
?>
	<br><br><br><br><br><div class="container">
	        <div class="row ">
			    <div class="col-xs-12 col-md-4 col-md-offset-4">
				    <div class=" panel panel-success">
					        <div class="panel-heading">
					           <h1><center>Sign Up <center> </h1>
					        </div>
					      <div class="panel-body">
					
						       <form action="signup_submit.php" method="post">
					                <div class="form-group">
									<h3>Name:</h3>
						           <input type="text" class="form-control " name="name" required="true" placeholder="Name"/>
                                  </div>
  				             
						          <div class="form-group ">
								  <h3>Email:</h3>
						          <input type="email" class="form-control " name="email" required="true" placeholder="Enter Valid Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  />
						           </div>
						           <div class="form-group">
								   <h3>Password:</h3>
						           <input type="password" class="form-control " name="password" required="true" placeholder="Password(Min 6 characters)" pattern=".{6,}" />
                                  </div>
								   <div class="form-group">
								   <h3>Phone Number:</h3>
						           <input type="tel" class="form-control " name="contact" required="true" placeholder="Enter Valid Phone No.(Ex-8448444853)" pattern="^\d{10}$"/>
                                  </div>
								  <div class="form-group">
 						          <input type="submit" class="btn btn-success btn-block" value="Sign Up" class="form-control"/>
								  </div>
						       </form>   
					   </div>					
				</div>
           </div> 			
	 </div>
</div>
<br><br> 
	 
<?php
include "footer.php";
?>
</body>
</html>