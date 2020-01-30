

<?php 
//get values form login.php
$servername ="localhost";
$username ="root";
$password = "";
$dbname ="quiz2";

//create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);
///check connection
if($conn->connect_error){
	die("connection field:".$conn->connect_error);
}
//query to database
if(isset($_POST['reg_user'])){
//$team_no = mysqli_real_escape_string($conn,$_POST['team']);
//$email = mysqli_real_escape_string($conn,$_POST['email']);
    $team_no = filter_input(INPUT_POST,'team');
$email = filter_input(INPUT_POST,'email');

}


//include('check.php');

$sql = " SELECT * FROM `login` WHERE team_no='$team_no';";
  $result = mysqli_query($conn,$sql) ;
  $rows = mysqli_num_rows($result);
        if($rows==1){
      $_SESSION['team_no'] =$team_no;
            // Redirect user to index.php
      header("location:home2.php");

    }
             else{
            
//echo "login team no or email invalid";
echo '<script> alert("Invalid Team No or Email");
location.href="login.php" </script>';

        }

    $conn->close();
     ?>       
     