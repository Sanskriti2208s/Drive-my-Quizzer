<html>
<head>
<?php 
//establishing connection to the server
 require "common.php";
//this will allow only logged in users to visit this page 
 if (!isset($_SESSION['email']))
	{header('location:index_new.php') ;}
//extracting data from the form
 $newpassword=mysqli_real_escape_string($con,$_POST['new_password']);
 $oldpassword=mysqli_real_escape_string($con,$_POST['old_password']);
 $confirm_new_password=mysqli_real_escape_string($con,$_POST['confirm_new_password']);
 //this will insure wether the new password and confirm new password matches or not
 if(strcmp($newpassword,$confirm_new_password)!==0){
  echo "<script>alert('retyped password not matches the first one');
	         location.href='change_password.php';
			 </script>";

 }
 //if the new password and confirm new password matches else part will be executed
 else{
 $user_id=$_SESSION['id'];
 //$q2 is the query to select org password from the database
 $q2="select password from users where id=$user_id";
 //passing the query to the database
 $org_password=mysqli_query($con,$q2);
 //asssigning the value of org password in $orgpassword variable
 $row=mysqli_fetch_array( $org_password);
     $orgpassword=$row['password'];
//$b is aasigned the md5 version of $newpassword	 
    $b= md5($newpassword);
//if original password and the old pssword entered by the user matches then only the updation will take place otherwise alert box with wrong old password message will be displayed	
  if(md5( $oldpassword)== $orgpassword){
		  $q="UPDATE users SET password='$b' WHERE id=$user_id";
	 mysqli_query($con,$q) or die(mysqli_error($con));
	  header('location:index_new.php');
 }
 else{
 echo "<script>alert('Wrong old password');
	         location.href='change_password.php';
			 </script>";

 }
 }
?>
</head>
<body>
</body>
</html>