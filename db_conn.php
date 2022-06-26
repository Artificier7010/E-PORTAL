<?php
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "registration";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s \n ");

 return $conn;
 }
 function CloseCon($conn){
     mysqli_close($conn);
 }

 ?>