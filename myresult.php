<?php
require "common.php";
if (!isset($_SESSION['email'])){
 echo "<script>alert('please login first');
	         location.href='login.php';
			 </script>";

 
}



?>
<html>
<head>
  <title>Create a new quiz</title>
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
?><br><br><br><br>
<div class="container">
<div class="row" style="background-color:orange;">
	  <div class="col-xs-4">
	  <center><h4><b>Sno.</b></h4></center>
	</div>
	<div class="col-xs-4">
	 <center><h4><b>Quiz Name</b></h4><center>
	</div>
    <div class="col-xs-4">
	 <center><h4><b> See Result</b></h4></center>
	</div>
    </div><br>
 <?php
 $user_id=$_SESSION['id'];
$select_query="select * from person_and_response where person_id=$user_id and status='submitted'" ;
$select_query_result=mysqli_query($con,$select_query);
				   if(mysqli_num_rows($select_query_result)==0){
	                      echo "<script>alert('You have not responded to any quiz yet.Join one.');
	                         location.href='join_quiz.php';
			                   </script>";
				   }
$i=1;
 while($row= mysqli_fetch_array($select_query_result)){
 $quiz_id=$row['quiz_id'];
 $q="select * from person_and_quiz where id=$quiz_id";
  $q_result=mysqli_query($con,$q);
  $row_user=mysqli_fetch_array($q_result);
  
 ?>
    <div class="row">
	  <div class="col-xs-4" style="color:blue;">
	  <center><h4><b><?php echo "$i" . '.';?></b></h4></center>
	</div>
	<div class="col-xs-4">
	<center> <h4><?php echo $row_user['quiz_name'];?></h4></center>
	</div>
    <div class="col-xs-4">
	<center> <a href="see_my_result.php?id=<?php echo "$user_id;"?> &quiz_id=<?php echo "$quiz_id";?>" class="btn btn-success btn-md active">See Result</a></center>
	</div>
    </div>
 
 
 
 <?php 
   $i++;
   } ?>
 
 </div>
 <br><br><br><br><br><br><br><br><br><br><br>
<?php
include "footer.php";
?>
</body>
</html>	