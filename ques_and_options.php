<?php require"common.php";
if (!isset($_SESSION['email'])){
 echo "<script>alert('please login first');
	         location.href='login.php';
			 </script>";
   
 
}
?>
<html>
<head>
  <title>Create a new quiz</title>
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
?><br><br><br><br><br><br><br>
     <div class="container">
              <div class="row ">
			           <div class="col-xs-12 ">
				                  <div class=" panel panel-success">
					                             <div class="panel-heading">
					                             <h2>Enter questions with their options and correct ans </h2>
					                             </div>
					                         	 <div class="panel-body">
						                                         <form action="ques_submit_script.php" method="post">
																     <div class=" row ">
     					                                               <div class="form-group col-xs-12  ">
								                                            <b>Question</b>
						                                                     <input type="text" class="form-control " name="question" required="true" placeholder="enter the question" />
						                                                </div>
																		    </div>
																	     <?php  for($i=1;$i<=4;$i++) {   ?>
							                                               <div class=" row ">
								                                            <div class="form-group col-xs-6 col-md-4">
							                                                  <label for="Option<?php echo "$i"; ?>">Option<?php echo "$i"; ?></label>
						                                                         <input type="text" class="form-control " name="option[]" required="true" placeholder="Option<?php echo "$i"; ?>"/> 
							                                                 </div>
																			 </div>
								                                      <?php } ?>
																	  <div class="row">
																	   
																	       <div class="form-group col-xs-6 col-md-4">
																		   <label> Correct option</label>
 						              <select class="form-control" placeholder="Choose corr. option" name="corr_option">
									
									     <option>Option1</option>
										 <option>Option2</option>
										 <option>Option3</option>
										 <option>Option4</option>
								 
						
									  </select>
								   </div>
								   </div>
																	   
								                                        <br>
																		<div class="row">
																		<div class="form-group col-xs-6">
 						                                                 
																		    <input type="submit" class="btn btn-danger btn-block form-control" value="Finished??" class="form-control" formaction="finished_script.php"/>
								                                        </div>
																		<div class="form-group col-xs-6">
 						                                                   <input type="submit" class="btn btn-success btn-block form-control" value="Enter a new question" class="form-control" formaction="ques_submit_script.php"/>
																		 <!-- <a href="ques_submit_script.php" class="btn btn-success btn-block active">Enter a new Question</a>-->
								                                        </div>
																		</div>
																		
						                                         </form>   
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