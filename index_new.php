<?php 
require "common.php";
/*if (isset($_SESSION['email']))
	{   header('location: home2.php'); }*/
?>
<html>
<head>
  <title>Quizzer</title>
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
?>
<br><br><div class="banner-image">
	   <div class="container">
	        <center><div class="banner-content">
			 <div><h1>Signup or Login into account to access these <span class = "glyphicon glyphicon-arrow-down"></span> </h1></div>
			  <a href="createquiz.php" class="btn btn-success btn-lg active">Create Quiz</a>
			  <a href="join_quiz.php" class="btn btn-danger btn-lg active">Join Quiz</a>
			  <a href="myquiz.php" class="btn btn-primary btn-lg active">MY Quiz</a>
			  <a href="myresult.php" class="btn btn-success btn-lg active">MY Results</a>
			</div></center>
           	   
	   </div>
	
	</div>
	
<?php 
include "footer.php";

?>	
	

</body>
</html>