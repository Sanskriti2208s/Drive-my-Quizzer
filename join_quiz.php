<?php require"common.php";
if (!isset($_SESSION['email'])){
 echo "<script>alert('please login first');
	         location.href='login.php';
			 </script>";

 
}
?>
<html>
<head>
  <title>JOin Quiz</title>
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
include "header_new.php";
?><br><br><br><br><br><br><br>
     <div class="container">
              <div class="row ">
			           <div class="col-xs-12 col-md-6 col-md-offset-3">
				                  <div class=" panel panel-success">
					                             <div class="panel-heading">
					                             <h1><center>Join Quiz <center> </h1>
					                             </div>
					                         	 <div class="panel-body">
						                                         <form action="response_submit.php" method="post">
     					                                               <div class="form-group ">
								                                            <b> Enter Quiz id</b>
						                                                     <input type="text" class="form-control " name="quiz_id" required="true" placeholder="Enter quiz id you want to join" />
						                                                </div>
						                                                <div class="form-group">
								                                             <b> Enter Passcode of quiz to be joined</b>
						                                                     <input type="password" class="form-control " name="password" required="true" placeholder=" Enter passcode of the quiz"/>
                                                                        </div>
								                                        <br><div class="form-group">
 						                                                  <input type="submit" class="btn btn-success btn-block active" value="Join Quiz" class="form-control"/>
								                                        </div>
																		
						                                         </form>   
				                                    </div>
                                    </div>
                           </div>
                 </div>
   </div>
<br><br><br><br><br><br><br><br><br><br><br>
<?php
include "footer.php";
?>
</body>
</html>