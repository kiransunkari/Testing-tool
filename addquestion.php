<?php include('header.php'); ?>
<style>
.table{
	width:100%;
}
.center {
text-align:center;
}
.scratch {
text-align:center;
}
#add_question { 
margin-top:190px;
}
/* Input field */
.input {
	width: 188px;
	padding: 15px 25px;
	
	font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
	font-weight: 400;
	font-size: 14px;
	color: #9d9e9e;
	text-shadow: 1px 1px 0 rgba(256,256,256,1.0);
	
	background: #fff;
	border: 1px solid #fff;
	border-radius: 0px;
	
	box-shadow: inset 0 1px 3px rgba(0,0,0,0.50);
	-moz-box-shadow: inset 0 1px 3px rgba(0,0,0,0.50);
	-webkit-box-shadow: inset 0 1px 3px rgba(0,0,0,0.50);
}

</style>
	<div class="content">
		<div id="center">
			
			
			<table class="table" cellpadding="5">
			<form class=".ques-form" name="addingquestion" method="POST" action="submit.php" enctype="multipart/form-data">
			<tr><td>Name :</td><td><input class="input" type="text" name="name"></td></tr>
			<tr><td>Description :</td><td><textarea name="desc" ></textarea></td></tr>
			<tr><td>File:</td><td><input type="file" name="sample_code"/></td></tr>
			<tr><td>Enter Test Cases :</td><td></td></tr>
			<tr><td></td><td><input class="input" type="text" name="input1"></td></tr> 
			<tr><td></td><td><input class="input" type="text" name="input2"> </td></tr>
			<tr><td></td><td><input class="input" type="text" name="input3"> </td></tr>

			<tr><td></td><td><input class="btn" type="submit" name="btn" value="Save"> </td></tr>
			</form>
			</table>

			
			
		</div>
	
	</div>
<?php include('footer.php'); ?>