<?php
session_start();

$options = '';
if(isset($_SESSION['auth'])){
	$options = '<div id="head_right">'.$_SESSION['uname'].' <a href="logout.php">logout</a></div>';
}
include('db.php');
?>
<!doctype html>
<head>
	<title>CodeEval</title>
	
	<link rel="icon" href="img/favicon.png" sizes="16x16" type="image/png">
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" href="lib/codemirror.css">
	<link rel="stylesheet" href="addon/hint/show-hint.css">
</head>

<body>
	<div class="head">
		<img id="logo" src="img/check.jpg"/>CodeEval
		<?php echo $options; ?>
	</div>
	