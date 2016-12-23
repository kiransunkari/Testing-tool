<?php

session_start();
$conn = mysql_connect("localhost","root","") or die(mysql_error());
   //selecting our database

 $db_select = mysql_select_db("codeeval", $conn) or die(mysql_error());
 
 $k = $_POST['res'];


$name = $_SESSION['uname'];
$rollno = 	$_SESSION['roll'];
$id = 	$_SESSION['id'];

$qid = $_SESSION['qid'];

$dat = date('y-m-d');
if(mysql_query("INSERT INTO result(q_id,userid,name ,message,date)VALUES('$qid','$id', '$name', '$k','$dat')") or die(mysql_error())==TRUE)
echo "code is submitted succesfully";
else
echo "code is not submitted succesfully";
mysql_close($conn);



?>