<!DOCTYPE html>
<html>
<head>
	<title></title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

</head>
<body>
<?php $id=3; ?>
<div class="container">
	<div class="row">
		<form action="" method="POST" id="rating_form">

			<div class="rateyo" id="rating" data-rateyo-ratting='4' data-rateyo-num-stars='5' data-rateyo-score='3'></div>

			<div align="center">
				<span class="result" id="result">Rating :  0</span> <br>
			</div>
			
			<input type="hidden" name="rating" id="rating_val">

			<input type="hidden" name="hall_id" id="hall_id" value="<?php echo $id?>">

			<div class="val" style="color:green;text-align:center;"></div>
			<div align="center">
				<input type="submit" name="Rate" value="Submit" class="btn btn-primary btn-sm btn-block" id="rating_submit">
			</div>
		</form>
	</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>


<script type="text/javascript">
	$(function(){
		$(".rateyo").rateYo().on("rateyo.change",function(e,data){
			var rating=data.rating;
			$(this).parent().find('.score').text("score : "+$(this).attr("data-rateyo-score"));
			$(this).parent().find('.result').text(rating);
			$(this).parent().find('input[name=rating]').val(rating);


		});
	});

	// $(document).ready(function(){
	//     $("#rating_submit").click(function(){   
	//     	$(".val").html("Thank you");     
	//         $("#rating_form").submit();

	//     });
	// });

    $('form').submit(function(e) {
        e.preventDefault();

       var rating_value = $("#rating_val").val();
       var hall_id = $("#hall_id").val();
       
        $.ajax({
           url: '<?php echo base_url()?>/Home/rating_values',
           type: 'POST',
           data: {rating: rating_value, hall_id: hall_id},
           error: function() {
              alert('Something is wrong');
           },
           success: function(data) {
                alert("Record added successfully");  
           }
        });


    });
</script>

</body>
</html>