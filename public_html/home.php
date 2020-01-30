<?php

session_start();


$con = mysqli_connect('localhost','root');

mysqli_select_db($con, 'quiz');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Home</title>
  <meta name="description" content="particles.js is a lightweight JavaScript library for creating particles.">
  <meta name="author" content="Vincent Garreau" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" media="screen" href="css/style.css">

  <style >
  	h1.heading1{
  color: white;
  text-transform: uppercase;
  font-weight: 500;
  font-size: 30px;
}
 input[type="submit"]{
  border:0;
  background: none;
  display: block;
  margin:20px auto;
  text-align: center;
  border:2px solid #2ecc71;
  padding: 14px 40px;
  outline: none;
  color: white;

  border-radius: 24px;
  transition: 0.25s; 
  cursor: pointer;

}
.card-body{
	font-size: 50px;
}

  </style>
  
</head>
<body>


<!-- particles.js container -->
<div id="particles-js">
	
</div>


<!-- scripts -->
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
 ></script>

<script src="particles.js"></script>
<script src="js/app.js"></script>




<div>
<form class ="boxyy"action="check.php" method="post">
	

	 <?php

	 for($i=1 ; $i < 6 ; $i++){
	 $q = " select * from questions where qid = $i";
	 $query = mysqli_query($con, $q);

	 while ($rows = mysqli_fetch_array($query) ) {
	 	?>
	 	
	 	<div >
	 		<h1  class="heading1"> <?php echo $rows['question']  ?>  </h1>


	 		<?php
	 			 $q = " select * from answers where ans_id = $i";
				 $query = mysqli_query($con, $q);

				 while ($rows = mysqli_fetch_array($query) ) {
				 	?>

				 	<div class="card-body">
				 		
				 		<input type="radio" name="quizcheck[<?php echo $rows['ans_id']; ?>]" value="<?php echo $rows['aid']; ?>"> 
				 		<?php echo $rows['answer']; ?>

				 	</div>

<?php
	 }
	 }
	}

	 ?>


	 <input type="submit" name="submit" value="Submit" class="btn btn-success m-auto d-block">

</form>

</div>



</body>

</html>