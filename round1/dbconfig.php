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
