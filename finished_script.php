<?php
require "common.php";

$question=$_POST ['question'];
$option=array($_POST['option']); 
$option1=$option[0][0];  
$option2=$option[0][1];
$option3=$option[0][2];
$option4=$option[0][3]; 
$quiz_id=$_SESSION['quiz_id'];  
$corr_ans=$_POST['corr_option'];           
	 $insert="insert into quiz_and_ques (quiz_id,question,option1,option2,option3,option4,corr_ans) values ($quiz_id,'$question','$option1','$option2','$option3','$option4','$corr_ans')";
	 mysqli_query($con,$insert)or die(mysqli_error($con));
	 header('location:quiz_created.php');
?>