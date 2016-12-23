<html>
<head>
</head>

<body>

	<script src="lib/codemirror.js"></script>
	<script src="addon/edit/matchbrackets.js"></script>
	<script src="addon/hint/show-hint.js"></script>
	<script src="mode/clike/clike.js"></script>
	<script src="mode/javascript/javascript.js"></script>
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"> </script>
	<script>
	
	// this is the id of the form
	var myTextArea = document.getElementById("code_ta");
	
	var myCodeMirror = CodeMirror.fromTextArea(myTextArea,{
        lineNumbers: true,
        matchBrackets: true,
        mode: "text/x-csrc"
      });
	  var mac = CodeMirror.keyMap.default == CodeMirror.keyMap.macDefault;
      CodeMirror.keyMap.default[(mac ? "Cmd" : "Ctrl") + "-Space"] = "autocomplete";
$("#code-btn").click(function(event) {
   	var postData = myCodeMirror.getValue();
	$('#code_copy').attr('value', postData)
	var formURL = 'send.php';
	$('#loading').css('display','block');

    $.ajax({
           type: "POST",
           url: formURL,
           data: $("#code").serialize(), // serializes the form's elements.
           success: function(data)
           {	
			   if(data.search("Passed")!= -1)
					formatted_data = '<font color="green">'+data+'</font>';
				else
					formatted_data = data;
			   $('#loading').css('display','none');
			   $("#error").empty();
               $("#error").append(formatted_data); // show response from the php script.
			   $("#result").empty();
			   $("#result").append('<input type="hidden" name="res" value="'+data+'"/>');
			   $("#result").append('<input id="submit-btn" type="submit" name="Check" value="Submit Code" />');
           }
         });
	return false;
     event.preventDefault(); // avoid to execute the actual submit of the form.
});
	</script>
	

</body>
</html>