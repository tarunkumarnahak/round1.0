<?php 
//get values form login.php
$servername ="localhost";
$username ="id12364500_tarun";
$password = "tarun25211+@";
$dbname ="id12364500_quiz2";

//create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);
///check connection
if($conn->connect_error){
	die("connection field:".$conn->connect_error);
}
