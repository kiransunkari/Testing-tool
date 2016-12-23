<?php
session_start();
include('db.php');
$id = $_POST['id'];
$uniq_instance = time();
// Converting input text to a  file

$c = $_POST['user_code'];
$file_r = 'files\run_'.$uniq_instance.'.c';
// Write the contents back to the file
file_put_contents($file_r, $c);

// Fetching inputs
					$i = 0;
					$getInputs = $mysqli->prepare('SELECT input FROM testcases WHERE sno=?') or die('Couldn\'t get Testcases');
					$getInputs->bind_param('s',$id);
					$getInputs->execute();
					$getInputs->store_result();
					$getInputs->bind_result($input);
					while($getInputs->fetch()){
						$file = 'Input\input_'.$uniq_instance.$i.'.txt';
						file_put_contents($file, $input); // Writing to Files
						$i++;
					}
					
// Fetching Question File's Name
					$getQues = $mysqli->prepare('SELECT q_file FROM questions WHERE q_id=?') or die('Couldn\'t get Questions');
					$getQues->bind_param('s',$id);
					$getQues->execute();
					$getQues->store_result();
					$getQues->bind_result($file_name);
					while($getQues->fetch()){
						$c_name = $file_name;
					}

$cmd = 'C:\Python33\python m.py '.$uniq_instance.' '.$c_name;
exec($cmd,$r);
unlink($file_r);
echo $r[0];


?>

