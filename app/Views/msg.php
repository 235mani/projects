<html>
<head>
	<title></title>


<style type="text/css">
	*{
		font-family:Times New Roman;
	}
	.body{
		background-color: cyan;
	}
	img{
		width:80px;
		float: left;
	}
	.nav{
		background-color:#3b5995;
		padding:1px;
		color:white;
	}
	h1{
		width:50%;
	}
	.text_body{
		padding:10px;
	}
	button{
        border-radius: 5px;
        height: 45px;
        font-size: 20px;
        background: #ff5722;
        font-weight: bold;
        border: none;
        color: #fff;
	}
	p{
		font-size:20px;
		font-weight:bold;
	}
	@media(max-width: 800px){
		p{
			font-size:15px;
		}
	}
</style>
</head>
<body>
<div class="container body" align="center">
    <div class="nav">
       <img class="logo" src="<?php echo base_url("public/images/logo_white.png");?>">
       <h1>UtsavAalay</h1>
   	</div>


	<div class="text_body" style="clear:both;">
		<p>You have requested a link to change your password at UtsavAalay. You can do this through the link below</p>
		<br>
		<a href="">
			<button class="btn btn-warning"><b>Change my password</b></button>
		</a>
		<br><br>
		<p>if you have not requested this, Please ignore this mail.
			<br>
			Your password won't change until you access the link above and create new one
		</p>
	</div>
</div>
</body>
</html>