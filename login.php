<?php
session_start();
   //connecting to database

   $db = mysql_connect("localhost","root","") or die(mysql_error());

 

   //selecting our database

   $db_select = mysql_select_db("codeeval", $db) or die(mysql_error());

 

   //Retrieving data from html form

   $username = $_POST['username'];

   $password = md5($_POST['pass']);
    

   //for mysql injection (security reasons)

   $username = mysql_real_escape_string($username);

   $password = mysql_real_escape_string($password);

 

   //checking if such data exist in our database and display result
 
   $login = mysql_query("select * from user where USERNAME = '$username' and

   PASSWORD = '$password'");

   if(mysql_num_rows($login) == 1) {
   while($row = mysql_fetch_array($login)) {
    $_SESSION['auth'] = 0;
	$_SESSION['uname']=$row['name'];
	$_SESSION['roll'] = $row['username'];
	$_SESSION['id'] = $row['userid'];
	$_SESSION['qid'] = 0;
	
	if($row['userid'] == 1)
		$_SESSION['auth'] = 1;
 
}
print_r($_SESSION);
if($_SESSION['auth'] ==  1)
	header ('Location: admin.php');
else
	header ('Location: select.php');
   }

   else {

     
	  header('Location:errorpassword.php');
	   echo "Username and Password does not Match";

   }

?>

 

