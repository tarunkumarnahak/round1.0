 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  
 <h1 style="Background-color:white;">Result</h1><br><br><br><br>
 <span style="color: white;"class="result">No. of Correct Answer:&nbsp;<?php echo $no = @$_SESSION['score']; 
 
 //session_unset(); ?></span><br>
 <span style="color: white;"class="result">Your Score:&nbsp<?php echo $no;
   include ('dbconfig.php');
   //include('connect.php');
  //$teamno=$_SESSION['team_no'];
  //$email=$_SESSION['email'];
   //$result1=query($teamno);
   //$id=$_SESSION['id'];

//$sql="SELECT id from users"; 

//$conn->query($sql);
//echo $sql;
   $id = $_SESSION['id'];
   $sql="UPDATE users SET score=$no where id='$id'";
  // $sql="INSERT into users(score) values('$no') where id='$id'";
	
			 //$sql="INSERT into users('score') VALUES($no) ";
 if($conn->query($sql)===TRUE )
{
   
 //echo '<script>alert("done");</script>';
     }

   
session_destroy();
?>
<br><br>
   <a href="formpage.php">&nbsp;FEEDBACK</a>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <style>
   h1{
     margin-top: -10%;
   }

@mixin btn-border-drawing($color: #ccc, $hover: black, $width: 2px, $vertical: top, $horizontal: left, $duration: 0.25s) {
  box-shadow: inset 0 0 0 $width $color;
  color: $color;
  transition: color $duration $duration/3;
  position: relative;
  
  &::before,
  &::after {
    border: 0 solid transparent;
    box-sizing: border-box;
    content: '';
    pointer-events: none;
    position: absolute;
    width: 0; height: 0;
    
    #{$vertical}: 0; 
    #{$horizontal}: 0;
  }

  &::before {
    $h-side: if($horizontal == 'left', 'right', 'left');
    
    border-#{$vertical}-width: $width;
    border-#{$h-side}-width: $width;
  }
  
  &::after {
    $v-side: if($vertical == 'top', 'bottom', 'top');
    
    border-#{$v-side}-width: $width;
    border-#{$horizontal}-width: $width;
  }
  
  &:hover {
    color: $hover;
    
    &::before,
    &::after {
      border-color: $hover;
      transition: border-color 0s, width $duration, height $duration;
      width: 100%;
      height: 100%;
    }
    
    &::before { transition-delay: 0s, 0s, $duration; }
    
    &::after { transition-delay: 0s, $duration, 0s; }
  }
}

.btn-primary {
  @include btn-border-drawing(#58afd1, #ffe593, 4px, bottom, right);
}

/* === Button styling, semi-ignore*/
.btn {
  background: none;
  border: none;
  cursor: pointer;
  line-height: 1.5;
  font: 700 1.2rem 'Roboto Slab', sans-serif;
  padding: 1em 2em;
  letter-spacing: 0.05rem;
  
  &:focus { outline: 2px dotted #55d7dc; }
}

/*=== Pen styling, ignore*/
/*body { 
  background: #1f1a25;
  display: flex; 
  align-items: center;
  justify-content: center;
  min-height: 100vh;
}*/
 </style>
</head>
<body>
  
</body>
</html>