<?php
require "common.php";
$user_id=$_SESSION['id'];
$quiz_id=$_GET['quiz_id'];
$update_query="UPDATE person_and_response SET status='submitted' WHERE person_id=$user_id and quiz_id=$quiz_id";
   mysqli_query($con,$update_query);
  echo "<script>alert('Thank you your response has been submitted');
	                         location.href='index_new.php';
			                   </script>";


?>