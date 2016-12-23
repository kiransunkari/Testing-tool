<?php include('header.php'); 

if($_SESSION['auth'] != 0){
	header('Location:Error.php');
}
					$ques='';
					$i = 0;
					$getQues = $mysqli->prepare('SELECT q_id, q_name, q_desc FROM questions WHERE q_id=?') or die('Couldn\'t get Questions');
					$getQues->bind_param('s',$_GET['id']);
					$getQues->execute();
					$getQues->store_result();
					$getQues->bind_result($q_id, $q_name, $q_desc);
				
					$_SESSION['qid'] = $_GET['id'];
			
					while($getQues->fetch()){
						$ques .= '<h3><b>'.$q_name.'</b></h3><br/>'.$q_desc;
						$id = $q_id;
					}
					


?>
	<div class="content">
		<div id="left">
			<p class="heading">Program Description </p>
			<div class="scratch desc"><?php  echo $ques; ?></div>
			<div id="error"></div><div id="loading"></div>
			
		</div>
		<div id="right">
			<p class="heading">Write Your Code Here</p>
			<form id="code" >
				<textarea id="code_ta" name="u_code" class="scratch"></textarea>
				<input type="hidden" name="id" value="<?php echo $id; ?>" />
				<input type="hidden" id="code_copy" name="user_code" value="" />
				
			</form>
			<button id="code-btn" type="submit" name="Check" value="Check" />Check</button>
			<form id="result" action="result.php" method="POST">
			
			
			</form>
		</div>
		
	</div>
<?php include('footer.php'); ?>