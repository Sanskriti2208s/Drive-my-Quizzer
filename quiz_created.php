<?php require"common.php";
if (!isset($_SESSION['email'])){
 echo "<script>alert('please login first');
	         location.href='login.php';
			 </script>";
   
 
}
$quiz_id=$_SESSION['quiz_id'];

$select_query="select password from person_and_quiz where id=$quiz_id";
$result=mysqli_query($con,$select_query);
$row=mysqli_fetch_array($result);
$password=$row['password'];

?>
<html>
<head>
  <title>Quiz Created</title>
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
<center>
     <div class= "container"  >
	    <div class="row">
		  <div class="jumbotron " style="background-color:white;">
		    <p style="color:black">Your quiz has been created succesfully.Share the below quiz id and password to join it<br>Quiz id:<?php echo $quiz_id;?><br>Password:<?php echo "$password";?></p>
			   <div class="row">
			    <div class="col-xs-6">
			   <a href="myquiz.php" class="btn btn-success btn-block active">View Quiz</a>
			   </div>
			   <div class="col-xs-6">
			   <a href="index_new.php" class="btn btn-primary btn-block active">Return to home page</a>
			  </div> 
			   </div>
			</div>
          </div>		  
		</div>
	 </div>
	 </center>
	 <br><br><br><br><br><br><br><br><br><br><br>
<?php
include "footer.php";
?>
</body>
</html>