<?php 
session_start();
if($_SESSION['auth'] != 1){
	header('Location:Error.php');
}
include('db.php');
include('filehandler.php');
$opt = $_POST['btn'];
if( $opt == '' )
	$opt = $_GET['action'];

switch($opt)
{
case 'Save':
$_name = $_POST['name'];
$_description = nl2br(htmlentities(($_POST['desc'])));
$testcase1 = $_POST['input1'];
$testcase2 = $_POST['input2'];
$testcase3 = $_POST['input3'];

$_programlink= fileHandler($_FILES['sample_code'],'c');
$ele["q_name"]=$_name;
$ele["q_desc"]=$_description;
$ele["q_file"]=$_programlink;
do_sql('questions', $ele, 'insert', $mysqli,''); // inserting question into table
$getQues = $mysqli->prepare('SELECT q_id FROM questions WHERE q_name=? AND q_desc=?') or die('Couldn\'t get Questions');
$getQues->bind_param('ss',$_name, $_description);
$getQues->execute();
$getQues->store_result();
$getQues->bind_result($q_id);
while($getQues->fetch()){
$ins["sno"]=$q_id;echo $q_id;
$ins["input"]=$testcase1;
do_sql('testcases', $ins, 'insert', $mysqli,'');
$ins["input"]=$testcase2;
do_sql('testcases', $ins, 'insert', $mysqli,'');
$ins["input"]=$testcase3;
do_sql('testcases', $ins, 'insert', $mysqli,'');
}
break;
case 'SaveUser':
$_name = $_POST['name'];
$_roll = $_POST['roll'];
$what['username']=$_roll;
$what['name']=$_name;
$what['password']=md5($_roll);
do_sql('user',$what,'insert',$mysqli,'');
break;
case 'del':
$id = $_GET['id'];
$where['sno'] = $id;
do_sql('testcases','','delete',$mysqli,$where); // deleting testcases
$where2['q_id'] = $id;
do_sql('questions','','delete',$mysqli,$where2); // deleting question
unlink('files\\'.$_GET['f']);
break;
case 'udel':
$id = $_GET['id'];
$where['userid'] = $id;
do_sql('user','','delete',$mysqli,$where); // deleting user

break;
}
header('Location:admin.php ');
?>