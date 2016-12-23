<html>
<head>
   <script type="text/javascript">
    function check(){
    var k = confirm("Are you sure?");
    if(k){
    return true;
    }else{
    alert("Thanks for not choosing to delete");
    return false;
    }

    }
</script>
</head>
<body>
<?php include('header.php');
if($_SESSION['auth'] != 1){
	header('Location:Error.php');
}
 ?>
<style>
.table{
	width:100%;
}
.scratch {
text-align:center;
}
#add_question { 
margin-top:190px;
}</style

	<div class="content">
		<div id="left">
		<h1>RESULTS</h1>
		<?php 
$m = $_POST['date'];

echo $m;

?>
					<table class = "table" cellpadding = "5" >
				<thead>
				<tr>
					<td> userid </td>
					<td > Name </td>
					<td width=70%;> Result</td>
					<td> marks </td>
					
				</tr>
				</thead>
				
				<tbody>
				<?php
					$ques_table='';
					$i = 0;
					$p = $_POST['date'];
					
					$getQues = $mysqli->prepare("SELECT userid,name, message FROM result where date='$p'") or die('Couldn\'t get Users');
					$getQues->execute();
					$getQues->store_result();
					$getQues->bind_result($userid,$name,$message);
					while($getQues->fetch()){
						$ques_table .= '				<tr>
					<td> '.$userid.'</td>
					<td> '.$name.' </td>
					<td> '.$message.' </td>
					<td> <input type="textbox" name="mark"> </td>	
				</tr>';
					}
					echo $ques_table;
				?>
				

				</tbody>
			</table> 

			
