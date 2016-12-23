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
}
</style>
	<div class="content">
		<div id="left">
					<table class = "table" cellpadding = "5" >
				<thead>
				<tr>
					<td> Roll Number </td>
					<td> Name </td>
					<td> </td>
				</tr>
				</thead>
				
				<tbody>
				<?php
					$ques_table='';
					$i = 0;
					$getQues = $mysqli->prepare('SELECT userid, username, name FROM user WHERE 1') or die('Couldn\'t get Users');
					$getQues->execute();
					$getQues->store_result();
					$getQues->bind_result($u_id, $u_name,$name);
					while($getQues->fetch()){
						if($u_id == 1)
												$ques_table .= '				<tr>
					<td> '.$u_name.' </td>
					<td> '.$name.' </td>
					<td> <em>Delete Disabled</em></td>
				</tr>';
						else
						$ques_table .= '				<tr>
					<td> '.$u_name.' </td>
					<td> '.$name.' </td>
					<td> <a href="submit.php?action=udel&id='.$u_id.'"  onclick="return check();">Delete</a> </td>
				</tr>';
					}
					echo $ques_table;
				?>
				<tr>
				<td></td><td></td><td><a href="add.php?what=u">Add User</a></td>
				</tr>
				<tr ><form action="csv.php" method="post" enctype="multipart/form-data">
				<td></td><td style="border:1px #000 solid;"><p><i>Add Users using CSV</i></p></td><td style="border:1px #000 solid;"><input type="file" name="upfile" id="fileToUpload"><input type="submit" name="btn" value="Store"></td>
				</form>
				</tr>

				</tbody>
			</table>

			
			
	</div>
			
		</div>

		<div id="right">
			<form id="broadcast" name="broadcast" method="POST" action="submit.php"/>
			<table class = "table" cellpadding = "5" >
				<thead>
				<tr>
					<td>  </td>
					<td> Name of Question </td>
					<td>  </td>
				</tr>
				</thead>
				
				<tbody>
				<?php
					$ques_table='';
					$i = 0;
					$getQues = $mysqli->prepare('SELECT q_id, q_name, q_file FROM questions WHERE 1') or die('Couldn\'t get Questions');
					$getQues->execute();
					$getQues->store_result();
					$getQues->bind_result($q_id, $q_name,$q_file);
					while($getQues->fetch()){
						$ques_table .= '				<tr>
					<td> </td>
					<td> '.$q_name.' </td>
					<td> <a href="submit.php?action=del&id='.$q_id.'&f='.$q_file.'"  ">Delete</a> </td>
				</tr>';
					}
					echo $ques_table;
				?>
				<tr>
				<td></td><td><a href="add.php?what=q">Add Question</a></td><td><input type="submit" name="btn" value="Update"></td>
				</tr>
				</tbody>
			</table>
			</form>
			<form name="kittu" method="post" class="rep" action="marks.php">
				<select name="date">
				<?php
				$getDates = $mysqli ->prepare('SELECT  date From result ') or die('dont have any result');
				$getDates->execute();
				$getDates->store_result();
				$getDates->bind_result($date);
				$op.='';
				$datearray = array();
				while($getDates->fetch()){
					
					 array_push($datearray,$date );
					 $resultuniquedate = array_unique($datearray);	
				}
				foreach($resultuniquedate as $value)
				echo '<option value="'.$value.'">'.$value.'</option>';
				?>
				</select>
				<input type="submit" name="btn" value="Generate Report">
			</form>

		</div>
	</div>
	
<?php include('footer.php'); ?>
</body>
</html>