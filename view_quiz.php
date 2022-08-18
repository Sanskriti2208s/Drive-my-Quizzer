<?php require"common.php";
if (!isset($_SESSION['email'])){
 echo "<script>alert('please login first');
	         location.href='login.php';
			 </script>";
   
 
}
?>
<html>
<head>
  <title>View Quiz</title>
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
				$quiz_id=$_GET['id'];
	            $user_id=$_SESSION['id'];
				$i=1;
               $select_query="select * from quiz_and_ques where quiz_id=$quiz_id";
                   $result=mysqli_query($con,$select_query);
				   if(mysqli_num_rows($result)==0){
	                      echo "<script>alert('No question found to the corresponding quiz');
	                         location.href='myquiz.php';
			                   </script>";
                      }
					  else{
		        while($row= mysqli_fetch_array($result)){
				?>
             <div class="row jumbotron" >
			 <p><h3><?php echo "Question". $i .". ". $row['question']; ?></h3>  </p>
			 <form action="save_ans.php" method="get">
			 <input type="radio" id="option" name="choosen_option"  value="Option1" required="true">
			 <label for="Option1"><h4><?php echo  $row['option1']; ?></h4></label><br>
			 <input type="radio" id="option" name="choosen_option"  value="Option2" required="true">
			 <label for="Option2"><h4><?php echo  $row['option2']; ?></h4></label><br>
			 <input type="radio" id="option" name="choosen_option"  value="Option3" required="true">
			 <label for="Option3"><h4><?php echo  $row['option3']; ?></h4></label><br>
			 <input type="radio" id="option" name="choosen_option"  value="Option4" required="true">
			 <label for="Option4"><h4><?php echo  $row['option4']; ?></h4></label><br>
			  
			 </form>
			 <!--
			 <input type="radio" id="option" name="option<?php echo $i; ?>"  value="optionb">
			 <label for="optionb"><h4><?php echo  $row['option2']; ?></h4></label><br>
			 <input type="radio" id="option" name="option<?php echo $i; ?>"  value="optionc">
			 <label for="optionc"><h4><?php echo  $row['option3']; ?></h4></label><br>
			 <input type="radio" id="option" name="option<?php echo $i; ?>"  value="optiond">
			 <label for="optiond"><h4><?php echo  $row['option4']; ?></h4></label><br>
			 -->
			 <h4 style="color:green;"><b>Correct Answer-:</b> <?php echo  $row['corr_ans']; ?></h4>
		    </div>
		   
		   
		   <?php 
		        $i++;}
			 }    
	    	 ?>
		    </div>
		   </div>
<br><br><br><br><br><br><br><br><br><br><br>
<?php
include "footer.php";
?>
</body>
</html>