<?php
require "common.php";
$user_id=$_SESSION['id'];
$quiz_name=$_POST ['quiz_name'];     
$passcode=$_POST['passcode'];
$insert="insert into person_and_quiz (person_id,quiz_name,password) values ($user_id,'$quiz_name','$passcode')";
mysqli_query($con,$insert)or die(mysqli_error($con));
$quiz_id=mysqli_insert_id($con)or die(mysqli_error($con));
$_SESSION['quiz_id']=$quiz_id;
header('location: ques_and_options.php');
?>