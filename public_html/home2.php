<?php
require 'dbconfig.php';
session_start();

// Initialize the session
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <meta name="description" content="particles.js is a lightweight JavaScript library for creating particles.">
  <meta name="author" content="Vincent Garreau" />
  
 <link rel="stylesheet" media="screen" href="css/style.css">
 <link rel="stylesheet" media="screen" href="css/Home2.css">
  

  <style >
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
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #2ecc71;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 500px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 120px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
  top:10;
}
.boxyy h1{
  position: center;
  color: #f4511e;
  text-transform: uppercase;
  font-size: 30px;
  font-weight: 300;
  font-family:   "Times New Roman", Times, serif;
}
.boxyy td{
  color: #2ecc71;
  text-transform: uppercase;
  font-size: 30px;
  font-weight: 300;
  font-family:   "Times New Roman", Times, serif;

}

.title{
  background-color: #ccc11e;
  font-size: 28px;
  padding: 20px;
  
}
.button3 {
    border: none;
    color: white;
    padding: 10px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}
.button3 {
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

.button3:hover {
    background-color: #2ecc71;
    color: Black;
}

.result{
  font-size: 40px;
}

  </style>
  
</head>
<body onload="countdown();">


<!-- particles.js container -->
<div id="particles-js">
	
</div>


<!-- scripts -->
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
 ></script>

<script src="particles.js"></script>
<script src="js/app.js"></script>
<center class="boxyy"> 
<?php                               
                                if (isset($_POST['click']) || isset($_GET['start'])) {
                                @$_SESSION['clicks'] += 1 ;
                                $c = $_SESSION['clicks'];
                                if(isset($_POST['userans'])) { $userselected = $_POST['userans'];
                                
                                $fetchqry2 = "UPDATE `quiz` SET `userans`='$userselected' WHERE `id`=$c-1"; 
                                $result2 = mysqli_query($conn,$fetchqry2);
                                }
      
                                  
                                } else {
                                  $_SESSION['clicks'] = 0;
                                }
                                
                                //echo($_SESSION['clicks']);
                                ?>
<div class="bump"><br><form class=><?php if($_SESSION['clicks']==0){ ?><h1 style='color:red;'>Instructions</h1><br><h1  style="color:white;font-size:20px;">1.After clicking on start button you will be provided 30sec for each question.after 30sec question will be automatically changed.So try to attempt each and every question.<br>2. Without answering you can't skip the question. </h1>  <button class="button" name="start" float="left"><span>START QUIZ</span></button> <?php } ?></form></div>

<form class=""action="" method="post"> 

<table class=""><?php if(isset($c)) {   $fetchqry = "SELECT * FROM `quiz` where id='$c'"; 
        $result=mysqli_query($conn,$fetchqry);
        $num=mysqli_num_rows($result);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC); }
      ?>

<tr><td><h1><br><?php echo @$row['que'];?></h1></td></tr> <?php if($_SESSION['clicks'] > 0 && $_SESSION['clicks'] < 6){
 ?>
     <h3 style="font-size:20px;display:inline;">Time: </h3><input id="seconds" type="text" style="width: 50px;
font-size:40px;
border: none;
  background: transparent;
cursor: pointer;
  color: #ff751a;"><h3 style="font-size:20px;display: inline;"> secs</h3>
 
<div class="container">
  <tr><td><input required type="radio" name="userans" value="<?php echo $row['option 1'];?>">&nbsp;<span style="color:white;"><?php echo $row['option 1'];?></span><br>
  <tr><td><input required type="radio" name="userans" value="<?php echo $row['option 2'];?>">&nbsp; <span style="color:white;"><?php echo $row['option 2'];?></span></td></tr>
  <tr><td><input required type="radio" name="userans" value="<?php echo $row['option 3'];?>">&nbsp; <span style="color:white;"><?php echo $row['option 3'];?></span></td></tr>
  <tr><td><input required type="radio" name="userans" value="<?php echo $row['option 4'];?>">&nbsp; <span style="color:white;"><?php echo $row['option 4'];?></span><br><br><br></td></tr>
  <tr><td><button class="button3" name="click" >Next</button></td></tr> <?php }  
                                  ?>
  </div>
  <form class="boxyy">

 <?php if($_SESSION['clicks']>5){ 
  $qry3 = "SELECT `ans`, `userans` FROM `quiz`;";
  $result3 = mysqli_query($conn,$qry3);
  $storeArray = Array();
  while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
     if($row3['ans']==$row3['userans']){
     @$_SESSION['score'] += 1 ;

   }
   else if($row3['ans']===null){
    @$_SESSION['score']=@$_SESSION['score'];
   }
   else{
    @$_SESSION['score']=@$_SESSION['score'];
   }
}
 
 include('check.php');?> 
 
 <?php } ?>
 <!-- <script type="text/javascript">
    function radioValidation(){
    /* var useransj = document.getElementById('rd').value;
        //document.cookie = "username = " + userans;
    alert(useransj); */
    var uans = document.getElementsByName('userans');
    var tok;
    for(var i = 0; i < uans.length; i++){
      if(uans[i].checked){
        tok = uans[i].value;
        alert(tok);
      }
    }
    }
</script> -->
<script>// how many minutes

// how many seconds (don't change this)
var secs =  30;
function countdown() {
  setTimeout('Decrement()',1000);
}
function Decrement() {
  if (document.getElementById) {
    minutes = document.getElementById("minutes");
    seconds = document.getElementById("seconds");
    // if less than a minute remaining
    if (seconds < 59) {
      seconds.value = secs;
    } else {
      seconds.value = getseconds();
    }
    secs--;
    if(secs >0)
{
setTimeout('Decrement()',1000);
} else { location.href="home2.php?start="}

  }
}
function getseconds() {
  // take mins remaining (as seconds) away from total seconds remaining
  return secs//-Math.round(mins *60);
}
</script>
</form>
</center>

</body>
</html>
