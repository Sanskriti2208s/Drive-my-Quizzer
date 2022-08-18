<?php require"common.php";
if (!isset($_SESSION['email'])){
 echo "<script>alert('please login first');
	         location.href='login.php';
			 </script>";
   
 
}
?>
<html>
<head>
  <title>Submit Your Response</title>
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
<body style="background-color:white;">


<?php 
include "header_new.php";
?><br><br><br><br><br><br><br>
            <div class="container">
			 <div class="container">
                <?php 
				if (!isset($_SESSION['quiz_id']))
	              { $quiz_id=$_POST['quiz_id'];
              		  }
                else{
                 $quiz_id=$_SESSION['quiz_id'];
				 }
				 if (!isset($_SESSION['password1']))
	              {$password=$_POST['password'];
       			  }
                else{
                 $password=$_SESSION['password1'];
                 }
			   
				  $user_id=$_SESSION['id'];
				 $verification_query="select password from person_and_quiz where id=$quiz_id";
				 $verification_result=mysqli_query($con,$verification_query);
				 $obtained_password=mysqli_fetch_array($verification_result);
				 $obtained_password=$obtained_password['password'];
				 if (mysqli_num_rows($verification_result)==0){
                echo "<script>alert('Wrong quiz id ');
	                    location.href='join_quiz.php';
			              </script>";
				 }
				 else{
					 if(strcmp($password,$obtained_password)!==0){
                    echo "<script>alert('Wrong password');
	         location.href='join_quiz.php';
			 </script>";

              }
			 }
			                $select_response="select status from person_and_response where quiz_id=$quiz_id and person_id=$user_id";
							$select_response_result=mysqli_query($con,$select_response);
							$row=mysqli_fetch_array($select_response_result);
							$status=$row['status'];
							if(mysqli_num_rows($select_response_result)==0){
							$insert_query="insert into person_and_response (person_id,quiz_id,status) values($user_id,$quiz_id,'not_submitted')";
							mysqli_query($con,$insert_query)or die(mysqli_error($con));
							}
							else{
							if (strcmp($status,"submitted")==0){
								 echo "<script>alert('You have already responded to this quiz ');
	                             location.href='join_quiz.php';
			                       </script>";
							    }
							}
							
				$i=1;
               $select_query="select * from quiz_and_ques where quiz_id=$quiz_id";
                   $result=mysqli_query($con,$select_query);
				   if(mysqli_num_rows($result)==0){
	                      echo "<script>alert('No question found to the corresponding quiz');
	                         location.href='myquiz.php';
			                   </script>";
                      
				   } else{
		        while($row= mysqli_fetch_array($result)){
				?>
             <div class="row jumbotron">
			 <p><h3><?php echo "Question". $i .". ". $row['question']; ?></h3>  </p>
			 <form action="save_ans.php?quiz_id=<?php echo $row['quiz_id']; ?> &question_id=<?php echo $row['id'];  ?> &password=<?php echo "$password"; ?>" method="post">
			 <input type="radio" id="option" name="choosen_option"  value="Option1" required="true">
			 <label for="Option1"><h4><?php echo  $row['option1']; ?></h4></label><br>
			 <input type="radio" id="option" name="choosen_option"  value="Option2" required="true">
			 <label for="Option2"><h4><?php echo  $row['option2']; ?></h4></label><br>
			 <input type="radio" id="option" name="choosen_option"  value="Option3" required="true">
			 <label for="Option3"><h4><?php echo  $row['option3']; ?></h4></label><br>
			 <input type="radio" id="option" name="choosen_option"  value="Option4" required="true">
			 <label for="Option4"><h4><?php echo  $row['option4']; ?></h4></label><br>
			   <?php 
			        $question_id=$row['id'];
                     $select_response_id="select id from response_table where quiz_id=$quiz_id and person_id=$user_id and question_id=$question_id" ;
					 $select_response_id_result=mysqli_query($con,$select_response_id);
					 if(mysqli_num_rows($select_response_id_result)!==0){
					  echo '<input type="submit" class="btn btn-success btn-lg " value="Save your answer" disabled />';
					 }else{
			  
			           echo '<input type="submit" class="btn btn-success btn-lg " value="Save your answer" />' ;
					 }
					  ?>
			 </form>
		    </div>
		   
		   
		   <?php 
		        $i++;}
			 }    
	    	 ?>
			 <a href="sub_your_response.php?quiz_id=<?php echo "$quiz_id";?>" class="btn btn-primary btn-block active">Submit Your Response</a>
		    </div>
		   </div>
<br><br><br><br><br><br><br><br><br><br><br>
<?php
include "footer.php";
?>
</body>
</html>