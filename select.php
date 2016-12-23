<?php include('header.php');

if(!isset($_SESSION['auth'])){
	header('Location:Error.php');
}?>
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
		<div id="center"><center>
			<p>  </p>
			
							<?php
					$ques_table='';
					$i = 0;
					$getQues = $mysqli->prepare('SELECT q_id, q_name FROM questions WHERE 1') or die('Couldn\'t get Questions');
					$getQues->execute();
					$getQues->store_result();
					$getQues->bind_result($q_id, $q_name);
					$k=0;
					while($getQues->fetch())
					{
					$k = $k+1;
					}
					$var = rand(0,$k);
					$getQues = $mysqli->prepare('SELECT q_id, q_name FROM questions WHERE 1') or die('Couldn\'t get Questions');
					$getQues->execute();
					$getQues->store_result();
					$getQues->bind_result($q_id, $q_name);
					$m=0;
					while($getQues->fetch()){
					$m = $m+1;
					if($m == $var)
					{
						$ques_table .= '<div class="countdown"></div><a class="start_exam" href="code.php?id='.$q_id.'">Start Exam</a>';
						$q = $q_id;
			
					}
					}
					echo $ques_table;
				?>

			
			</center>
		</div>
	
	</div>
<?php include('footer.php'); ?>
<script>
// Our countdown plugin takes a callback, a duration, and an optional message
$.fn.countdown = function (callback, duration, message) {
    // If no message is provided, we use an empty string
    message = message || "";
    // Get reference to container, and set initial content
    var container = $(this[0]).html(duration + message);
    // Get reference to the interval doing the countdown
    var countdown = setInterval(function () {
        // If seconds remain
        if (--duration) {
            // Update our container's message
            container.html(message + duration + " seconds");
        // Otherwise
        } else {
            // Clear the countdown interval
            clearInterval(countdown);
            // And fire the callback passing our container as `this`
            callback.call(container);   
        }
    // Run interval every 1000ms (1 second)
    }, 1000);

};

// Use p.countdown as container, pass redirect, duration, and optional message
$(".countdown").countdown(redirect, 60, "The page will redirect in ");

// Function to be called after 5 seconds
function redirect () {
    this.html("Done counting, redirecting.");
    window.location = "code.php?id=<?php echo $q; ?>";
}
</script>