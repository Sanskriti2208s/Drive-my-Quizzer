<?php
require "common.php"; 
$user_id=$_SESSION['id'];
$choosen_option=$_POST['choosen_option'];
$password=$_GET['password'];
$_SESSION['password1']=$password;
$quiz_id=$_GET['quiz_id'];
$_SESSION['quiz_id']=$quiz_id;
$question_id=$_GET['question_id'];
$select_query="select corr_ans from quiz_and_ques where id=$question_id";
$select_query_result=mysqli_query($con,$select_query);
$row=mysqli_fetch_array($select_query_result);
$corr_option=$row['corr_ans'];
$insert_query="insert into response_table (quiz_id,question_id,person_id,choosen_option,corr_option) values($quiz_id,$question_id,$user_id,'$choosen_option','$corr_option')";
mysqli_query($con,$insert_query);
 header('location: response_submit.php');


?>