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
  <title>My quiz</title>
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
     <div class="container">
	  <div class= "table-responsive " >
	  <tbody>
     <table class="table table-hover">
	   <tr class="danger">
		<th>SNo.</th>
		<th>Quiz Name</th>
		<th>Quiz ID</th>
		<th>Password</th>
		<th>View</th>
		<th>Responses</th>
		</tr>
	  <br>
	      <?php 
	            $user_id=$_SESSION['id'];
				$i=1;
               $select_query="select * from person_and_quiz where person_id=$user_id";
                   $result=mysqli_query($con,$select_query);
				   if(mysqli_num_rows($result)==0){
	                      echo "<script>alert('You dont have any existing quiz.Create one.');
	                         location.href='createquiz.php';
			                   </script>";
				   }
		   while($row= mysqli_fetch_array($result)){ ?>
           <tr class="info">
        		    <td><h4><?php echo $i;?></h4></td> 
				    <td><h4><?php echo $row['quiz_name'];?></td>
				    <td> <h4><?php echo $row['id'];?></h4> </td>
					 <td><h4><?php echo $row['password'];?></h4> </td>
					 <td> <a href="view_quiz.php?id=<?php echo $row['id'];?>" class="btn btn-success btn-lg active">View</a></td>
				   <td> <a href="responses.php?id=<?php echo $row['id'];?>" class="btn btn-primary btn-lg active">Responses</a></td>
					 
		   </tr><br>
		   
		   
		   <?php $i++;} ?>
	                  </table>
			   </tbody>
	      </div>
			
	 
	 
	 </div>
  
<br><br><br><br><br><br><br><br><br><br><br>
<?php
include "footer.php";
?>
</body>
</html>	 
	 