<?php
if ((isset($_GET['id'])) && (is_numeric($_GET['id'])) ) {
	  $id = $_GET['id'];
	  } elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) {
	  $id = $_POST['id'];
	  } else {
	  echo 'Please choose a news post to view.';
	  exit();
	  } 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Page</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />


<script type="text/javascript">
// how many minutes
var mins = 1;

// how many seconds (don't change this)
var secs = mins * 60;
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
			minutes.value = getminutes();
			seconds.value = getseconds();
		}
		secs--;
		if(secs >0)
{
setTimeout('Decrement()',1000);
} else { location.href="test.php?id=1"}

	}
}
function getminutes() {
	// minutes is seconds divided by 60, rounded down
	mins = Math.floor(secs / 60);
	return mins;
}
function getseconds() {
	// take mins remaining (as seconds) away from total seconds remaining
	return secs-Math.round(mins *60);
}

</script>        
</head>
<body onload="countdown();">

    <div id="main">
    	<div id="header">
	    	<div class="container">
	    		<div id="logo">
	    		
	    		
	    		</div><!-- End Logo -->
	    		<div id="login_admin">
	    			<p><a href="admin/index.php">Admin</a></p>
	    		</div>	
	    		
	    		<div id="banner">
	    	
	    		<p><span> Banner</span><br />olor, eu placerat elit bibendum id. Nullam vitae nibh vitae tellus ultricies porta. Integer pellentesque euismod ultrices. Aliquam pulvinar euismod felis vulputate vulputate. In sed enim et erat malesuada hendrerit a a elit. Integer felis enim, iaculis in mollis ac, euismod quis elit. Sed eros e</p>
	    		</div><!-- End Banner -->
	    		
	    			</div><!--End Container Header  -->
    	</div><!--  End Header -->
        
        <div id="navigation">
        	
            </div>
        </div><!-- End Navigation -->
    	<div id="page">
    
		   
    		<div class="container">
    			<div class="question-box">
              
<?php

include("config.php");


if (isset ($_POST['submit'])){
	$scor = 0;
    $display = mysql_query("SELECT * FROM quiz WHERE quiz_id='$id'  ORDER BY id");
    $total = mysql_num_rows($display);
	
	while ($result = mysql_fetch_array($display)){
    	$answer = $result["answer"];
        $userAnswer=$_POST["q${result['id']}"].$_POST["q1${result['id']}"].$_POST["q2${result['id']}"];         
		$question = $result["question"];
	}
}

?>
<form  method="post" action='<?php echo $_SERVER["PHP_SELF"]; ?>?id=<?php echo $id; ?>'>
    
<?php
    echo '<table cellspacing="0" cellpadding="0" width="100&#37;" border="0">';
	echo '<tr><td>Time: <input id="minutes" type="text" style="width: 22px;"> minutes <input id="seconds" type="text" style="width: 22px"> seconds</td></tr>';
    $display = mysql_query("SELECT * FROM quiz WHERE quiz_id='$id' ORDER BY id");
    while ($result = mysql_fetch_assoc($display)) {

    $id = $result["id"];
	$question_id = $result['question_id'];
    $question = $result["question"];
    $opt1 = $result["opt1"];
    $opt2 = $result["opt2"];
    $opt3 = $result["opt3"];
    $answer = $result["answer"];
	$photo_src = $result["photo_src"];
    $userAnswer=$_POST["q${result['id']}"].$_POST["q1${result['id']}"].$_POST["q2${result['id']}"];
?>   
     <tr><td colspan=3><br /><br /><br /><br /><b><?php echo $question_id.'.'.$question; ?></b><br /><br /></td></tr>
     <tr><td>
	 <?php 
	 if($photo_src) {
	  	print('<li><img src="' . $photo_src . '" alt="images" id="' . $id . '"  /></li>');
	 }else{
	  	//exit(); 
	 }?> </td></tr>   
     <tr><td <?php if (isset ($_POST['submit'])){user_and_correct_ans($id,'a', $userAnswer); }?> ><input type="checkbox" name="<?php echo 'q'.$id; ?>" value="<?php echo 'a'; ?>" <?php if(isset($_POST['q'.$id]) && !empty($_POST['q'.$id])){echo "checked=\\"checked\\"";} ?> class="input_checkbox" /><span class="checkbox_text"><?php echo $opt1 ; ?></span> </td></tr>
          
	 <tr><td <?php if (isset ($_POST['submit'])){ user_and_correct_ans($id,'b', $userAnswer); }?>> <input type="checkbox" name="<?php echo 'q1'.$id; ?>" value="<?php echo 'b'; ?>" <?php if(isset($_POST['q1'.$id]) && !empty($_POST['q1'.$id])){echo "checked=\\"checked\\"";}  ?>  class="input_checkbox" /><span class="checkbox_text"><?php echo $opt2; ?></span>  </td></tr>
          
	 <tr><td <?php if (isset ($_POST['submit'])){ user_and_correct_ans($id,'c', $userAnswer); }?>> <input type="checkbox" name="<?php  echo 'q2'.$id; ?>" value="<?php echo 'c'; ?>" <?php if(isset($_POST['q2'.$id]) && !empty($_POST['q2'.$id])){echo "checked=\\"checked\\"";}  ?>  class="input_checkbox" /><span class="checkbox_text"><?php echo $opt3; ?></span>  </td></tr>
<tr><td>
<?php
if (isset ($_POST['submit'])){
	if($answer==$userAnswer){
		$scor++;	
		echo "<p align=center><b>raspuns corect</b></p>";
    echo "<p>";
	}
	else{
			echo "<p align=center><b>raspuns incorect</b></p>";
    echo "<p>";
	}
}
    }
?>
</td></tr>
<?php
    echo "</table>";
	 if (!isset ($_POST['submit'])){
    echo "<input type='submit' value='Results' name='submit' class='page_form_button'>";
	 }
if (isset ($_POST['submit'])){	
	echo "<p align=center><b>You scored $scor out of $total</b></p>";
    echo "<p>";
}

?>
    </form>
    			</div>
    		</div><!-- End Container -->
