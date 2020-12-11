<!DOCTYPE html>
<html>
<head>
	<title></title>

<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/redmond/jquery-ui.css">




</head>
<body>
<input id="start_date" />start
<input id="end_date" />end

<input type="time" name="myTime" >
<input type="time" name="myTime2">
</body>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.js"></script>

<script type="text/javascript">
	$("#start_date").datepicker({
  	minDate: 0,
  	onSelect: function(date) {
    $("#end_date").datepicker('option', 'minDate', date);
  }
});

$("#end_date").datepicker({});


$("input[name='myTime']").timeInput(); // use default or html5 attributes

$("input[name='myTime2']").timeInput();
</script>
</html>