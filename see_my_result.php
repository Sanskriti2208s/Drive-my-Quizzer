<?php require"common.php";
if (!isset($_SESSION['email'])){
 echo "<script>alert('please login first');
	         location.href='login.php';
			 </script>";
   
 
}
?>
<html>
<head>
  <title>See My Result</title>
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
				$quiz_id=$_GET['quiz_id'];
	            $responser_id=$_SESSION['id'];
				$i=1;
				$incorrect_ans=0;
				$not_attempted=0;
               $select_query="select * from quiz_and_ques where quiz_id=$quiz_id";
                   $result=mysqli_query($con,$select_query);
				   $total_ques=mysqli_num_rows($result);?>
				   
				  
				  <?php if(mysqli_num_rows($result)==0){
	                      echo "<script>alert('No question found to the corresponding quiz');
	                         location.href='myquiz.php';
			                   </script>";
                      }
					  else{
		        while($row= mysqli_fetch_array($result)){
					$question_id=$row['id'];
					$q_select="select choosen_option from response_table where quiz_id=$quiz_id and person_id=$responser_id and question_id=$question_id ";
					$q_select_result=mysqli_query($con,$q_select);
					$q_row=mysqli_fetch_array($q_select_result);
					if(mysqli_num_rows($q_select_result)==0){
					 $not_attempted++;	
					}
				?>
             <div class="row jumbotron">
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
			 <div class="row">
			 <div class="col-xs-12 col-md-6">
			  <h4 style="color:green;"><b>Correct Answer-:</b> <?php echo  $row['corr_ans']; ?></h4>
			 </div>
			  <div class="col-xs-12 col-md-6">
			 <h4><b>Chosen Option-:</b> <?php echo  $q_row['choosen_option']; ?></h4>
			</div >
			 </div>
		    </div>
		   
		   
		   <?php
		   $chosen_option=$q_row['choosen_option'];
		   $corr_option=$row['corr_ans'];
              if(strcmp($chosen_option,$corr_option)!==0 && mysqli_num_rows($q_select_result)!==0){
				  $incorrect_ans++;
			  }		   
		        $i++;}
			 }    
	    	 ?>
			 <div class="panel panel-success">
				    <div class="panel-heading">
					 <h3><center><b>Results</b></center></h3>
					</div>
					<div class="panel-body">
					<div class="row">
					 <div class="col-xs-12 col-md-6">
					<h4><b>Total Question-</b><?php echo $total_ques;?></h4><br>
					
					<?php $corr_ans=$total_ques-$incorrect_ans-$not_attempted;?>
					<h4 style="color:green;"><b>Correct Answer-</b><?php echo $corr_ans;?></h4><br>
					<h4 style="color:red;"><b>Incorrect Answer-</b><?php echo $incorrect_ans;?></h4><br>
					<h4><b>Not attempted-</b><?php echo $not_attempted;?></h4><br>
					    </div>
						<?php  $corr_per=100*($corr_ans/$total_ques);
                                $incorr_per=100*($incorrect_ans/$total_ques);
                                $not_attempted_per=100*($not_attempted/$total_ques);								?>
						<div class="col-xs-12 col-md-6">
						   <div class="row">
						    <div class="col-xs-12 col-md-12"><h4>Total</h4></div><div class="col-xs-12 col-md-12"><div style="height:2%; width:100%; background-color:blue;"></div></div>
						   </div>
						   <div class="row">
						    <div class="col-xs-12 col-md-12"><h4>Correct:<?php echo "$corr_per";?>%</h4></div><div class="col-xs-12 col-md-12"><div style="height:2%; width:<?php echo "$corr_per";?>%; background-color:green;"></div></div>
						   </div>
						   <div class="row">
						    <div class="col-xs-12 col-md-12"><h4>Incorrect:<?php echo "$incorr_per";?>%</h4></div><div class="col-xs-12 col-md-12"><div style="height:2%; width:<?php echo "$incorr_per";?>%; background-color:red;"></div></div>
						   </div>
						   <div class="row">
						    <div class="col-xs-12 col-md-12"><h4>Not Attempted:<?php echo "$not_attempted_per";?>%</h4></div><div class="col-xs-12 col-md-12"><div style="height:2%; width:<?php echo "$not_attempted_per";?>%; background-color:black;"></div></div>
						   </div>
						   </div>
						</div>
					  </div>
					</div>
				   </div>
		    </div>
		   </div>
<br><br><br><br><br><br><br><br><br><br><br>
<?php
include "footer.php";
?>
</body>
</html>