<!DOCTYPE html>
<html>
		<head>
		<style type="text/css">
		#container{text-align:center; width:40vw; height:40vw; margin-left:auto;
		 margin-right:auto; background-color: #212121; color:white; }
		body{background-color:#212121; min-height: 100%;}
		input{width:35vw; height:5vw; background: none; appearance: none; 
			box-shadow: none; display:inline-block; border-bottom:1px solid white; border-top:none;
			border-left:none; border-right:none; margin:1vw; font-size:2vw;}
		#submitButton{background:#5a595b; text-decoration:none; padding: 0.5vw 1vw; 
			border-radius:5px; color:white; appearance: none; box-shadow: none; 
			display:inline-block; border:none;}
		#reg a{color:white; font-size:4vw; margin-top: 1vw; text-decoration:none;
			border-bottom:1px solid white;}
		#reg a:hover {color:blue;}
		#home{width:4vw; height:auto; position: absolute; top:2vw; left:2vw;}	
		</style>
		
	</head>
<body>
<div id="container">

<a href="index.php"><img id="home" src="home.png"></a>
<form action="Login.php" method="post">
<h1>Login</h1>
			<div>
				<input type="text" placeholder="Username" required="true" name="name" />
			</div>
			<div>
				<input type="password" placeholder="Password" required="true" name="pass" />
			</div>
			<div>
				<input type="submit" value="Log in" id="submitButton"/>
				<br />	
				<div id="reg"><a href="Register.php">Register</a></div>
				<br />		
			</div>
<form>

</div>
		</body>
</html>