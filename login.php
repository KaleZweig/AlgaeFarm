<!DOCTYPE html>
<html>
		<head>
		<style type="text/css">
#container{text-align:center; width:40vw; height:40vw; margin-left:auto;
		 margin-right:auto; background-color: #212121; color:white; }
		body{background-color:#212121; min-height: 100%;}
		input{width:35vw; height:5vw; background: none; appearance: none; 
			box-shadow: none; display:inline-block; border-bottom:1px solid white; border-top:none;
			border-left:none; border-right:none; margin:1vw; font-size:2vw; color:white;}
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

<?php
//P 182
session_start();
$name ="a";
$pass ="a";
$uservalue=0;
$_SESSION['Log'];
if ($_SERVER["REQUEST_METHOD"] == "POST"){
   $name = test_input($_POST["name"]);
   $pass = test_input($_POST["pass"]);
  
}
function test_input($data){
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
get($name, $pass);
if(strpos($name,'!') !== false || strpos($name,'@') !== false || strpos($name,'#') !== false ||
strpos($name,'$') !== false || strpos($name,'%') !== false || strpos($name,'^') !== false ||
strpos($name,'&amp') !== false || strpos($name,'*') !== false || strpos($name,'(') !== false ||
strpos($name,')') !== false || strpos($name,' ') !== false || strpos($name,'+') !== false ||
strpos($name,'=') !== false || strpos($name,'`') !== false || strpos($name,'~') !== false ||
strpos($name,':') !== false || strpos($name,';') !== false || strpos($name,'&quot') !== false ||
strpos($name,'&#039') !== false || strpos($name,'/') !== false || strpos($name,'?') !== false ||
strpos($name,'<') !== false || strpos($name,'>') !== false || strpos($name,',') !== false ||
strpos($name,'|') !== false || strpos($name,'{') !== false || strpos($name,'}') !== false ||
strpos($name,'[') !== false || strpos($name,']') !== false || strpos($name,'\\') !== false||
strpos($pass,'!') !== false || strpos($pass,'@') !== false || strpos($pass,'#') !== false ||
strpos($pass,'$') !== false || strpos($pass,'%') !== false || strpos($pass,'^') !== false ||
strpos($pass,'&amp') !== false || strpos($pass,'*') !== false || strpos($pass,'(') !== false ||
strpos($pass,')') !== false || strpos($pass,' ') !== false || strpos($pass,'+') !== false ||
strpos($pass,'=') !== false || strpos($pass,'`') !== false || strpos($pass,'~') !== false ||
strpos($pass,':') !== false || strpos($pass,';') !== false || strpos($pass,'&quot') !== false ||
strpos($pass,'&#039') !== false || strpos($pass,'/') !== false || strpos($pass,'?') !== false ||
strpos($pass,'<') !== false || strpos($pass,'>') !== false || strpos($pass,',') !== false ||
strpos($pass,'|') !== false || strpos($pass,'{') !== false || strpos($pass,'}') !== false ||
strpos($pass,'[') !== false || strpos($pass,']') !== false || strpos($pass,'\\') !== false) {
	echo'<h1>do not use that character</h1>';
}else if($uservalue == 1){
// echo "User valid";
 $_SESSION['Log']="Logged in as: ";
$_SESSION['USER']=$name;
echo "<script>window.open('forum.php','_self')</script>";
}else{
	// echo "User invalid";
  unset($_SESSION['Log']);
 unset($_SESSION['USER']);
}
function get($user, $pass){
	$cons=mysqli_connect("mysql13.000webhost.com","a4857546_admin","****","a4857546_forum");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }else{
  //	echo 'connection successful';
  }
$results = mysqli_query($cons,"SELECT * FROM UserData WHERE UserName='".$user."' AND Password='".$pass."'");
echo"<br />";
/*
while($row = mysqli_fetch_array($results)){
  	echo "<br>";
  echo $row['UserName'] . " " . $row['Password'] ;
    }
echo"Done";
*/
if (mysqli_num_rows($results) >= 1){
      //echo "VALID";
	global $uservalue;
	$uservalue=1;
  }else{
  	//echo"invalid";
	$uservalue=0;
  }
mysqli_close($cons);
}
echo "<h1>". $_SESSION['Log']." ".$_SESSION['USER']."</h1>";
?>
<a href="index.php"><img id="home" src="home.png"></a>
<form action="login.php" method="post">
		<h1>Please Log In</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="name" />
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="pass" />
			</div>
			<div>
				<input id="submitButton" type="submit" value="Log in"/>
				<br />	
				<div id="reg"><a href="register.php">Register</a></div>
				<br />		
			</div>
<form>

</div>
		</body>
</html>