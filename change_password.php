<?php
//establishing connection to the server
 require"common.php";
?>
<html>
<head>
  <title>settings</title>
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
</head>
<body>
<?php
include"header_new.php";
?>
	<br><br><br><br><br><br><br><br>
	<div class="container">
	        <div class="row ">
			    <div class="col-xs-12 col-md-4 col-md-offset-4">
				    <div class=" panel panel-success">
					        <div class="panel-heading">
					           <h1><center>Change Password <center> </h1>
					        </div>
					      <div class="panel-body">
					
						       <form action="chng_pass_submit.php" method="post">
					            
						           <div class="form-group">
								   <h3>Old Password:</h3>
						           <input type="password" class="form-control " name="old_password" required="true" placeholder="Old Password(Min 6 characters)" pattern=".{6,}" />
                                  </div>
								  <div class="form-group">
								   <h3>New Password:</h3>
						           <input type="password" class="form-control " name="new_password" required="true" placeholder="New Password(Min 6 characters)" pattern=".{6,}" />
                                  </div>
								  <div class="form-group">
								   <h3>Confirm New Password:</h3>
						           <input type="password" class="form-control " name="confirm_new_password" required="true" placeholder="Re-type New Password" pattern=".{6,}" />
                                  </div>

								  <div class="form-group">
 						          <input type="submit" class="btn btn-success btn-block" value="Change" class="form-control"/>
								  </div>
						       </form>   
					   </div>					
				</div>
           </div> 			
	 </div>
</div>
	
<br><br><br><br>
<?php
include"footer.php";
?>
</body>
</html>