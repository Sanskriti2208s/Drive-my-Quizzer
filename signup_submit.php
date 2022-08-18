<html>
<head>

<?php
require "common.php";
$name=mysqli_real_escape_string($con,$_POST['name']);
$email=mysqli_real_escape_string($con,$_POST['email']);
$phone=$_POST['contact'];
$password=md5(mysqli_real_escape_string($con,$_POST['password']));
$select_query="select id from users where email='$email'";
$select_query_result=mysqli_query($con,$select_query);
if(mysqli_num_rows($select_query_result)>0){
	echo "<script>alert('E-mail already exist');
	         location.href='signup.php';
			 </script>";

	 
}
else{
$insert="insert into users (name,email,phone,password) values('$name','$email','$phone','$password')";
mysqli_query($con,$insert)or die(mysqli_error($con));
	$_SESSION['email']=$email;
	$_SESSION['id']=mysqli_insert_id($con)or die(mysqli_error($con));
    header('location: index_new.php');
}
?>
</head>
<body>
</body>
</html>