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
			#home{width:4vw; height:auto; position: absolute; top:2vw; left:2vw;}	
		</style>
		
	</head>
<body>
<div id="container">

<?php
session_start();
//print out user (for debugging purposes)
echo $_SESSION['Log'].$_SESSION['USER'];
//set username and password to a by default so I can tell if anything was entered later
$name ="a";
$pass ="a";
//variable used to confirm username is new and original
$uservalue=0;
// Create connection
$con=mysqli_connect("mysql13.000webhost.com","a4857546_admin","****","a4857546_forum");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }else{
  	//echo "Connection successful ";
  }
//function to retrieve input via post method
if ($_SERVER["REQUEST_METHOD"] == "POST"){
   $name = test_input($_POST["name"]);
   $pass = test_input($_POST["pass"]);
   $first = test_input($_POST["first"]);
   $last = test_input($_POST["last"]);
   $email = test_input($_POST["email"]);
  
}
//function to filter data and escape strings exxceppt I forgot to add that Ill do it later
function test_input($data){
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
//checkk name originality function call
get($name);
//A giant if else statement that is probablby completely unnecesarity because I am already stripping special characters
if(strpos($name,'!') !== false || strpos($name,'#') !== false ||
strpos($name,'$') !== false || strpos($name,'%') !== false || strpos($name,'^') !== false ||
strpos($name,'&amp') !== false || strpos($name,'*') !== false || strpos($name,'(') !== false ||
strpos($name,')') !== false || strpos($name,' ') !== false || strpos($name,'+') !== false ||
strpos($name,'=') !== false || strpos($name,'`') !== false || strpos($name,'~') !== false ||
strpos($name,':') !== false || strpos($name,';') !== false || strpos($name,'&quot') !== false ||
strpos($name,'&#039') !== false || strpos($name,'/') !== false || strpos($name,'?') !== false ||
strpos($name,'<') !== false || strpos($name,'>') !== false || strpos($name,',') !== false ||
strpos($name,'|') !== false || strpos($name,'{') !== false || strpos($name,'}') !== false ||
strpos($name,'[') !== false || strpos($name,']') !== false || strpos($name,'\\') !== false||
strpos($pass,'!') !== false || strpos($pass,'#') !== false ||
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
}elseif(strlen($pass)<5 && strlen($pass)!=1){ //make sure password is long enough
	echo"<h1>Password is to cshort</h1>";
}elseif(strlen($name)<4 && strlen($name)!=1){ //make sure username is long enough
	echo"<h1>Username is to short</h1>";
}else if($uservalue == 1 && $uservalue!= 'a'){ //make sure username is new (variable returned from "get" function)
 echo "Username already exists";
}else if($name == 'a' && $pass == 'a'){
//don't insert anything if nothing is entered probably could use null rather than a but it works fine
}else{
	//this is the actual insertion of data
mysqli_query($con,"INSERT INTO UserData (username, password, firstname, lastname, email) VALUES ('".$name."','".$pass."','".$first."','".$last."','".$email."')");
//open new page after query
echo "<script>window.open('login.php','_self')</script>";
}
mysqli_close($con); // close connection
//function to check if username is original
function get($user){
	//new conneection
	$cons=mysqli_connect("mysql13.000webhost.com","a4857546_admin","****",
		"a4857546_forum");
// Check connection
if (mysqli_connect_errno())
  {
  //echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }else{
  //	echo 'connection successful';
  }
  //graab data from table
$results = mysqli_query($cons,"SELECT * FROM UserData WHERE UserName='".$user."' ");
/*
while($row = mysqli_fetch_array($results)){
  	echo "<br>";
  echo $row['UserName'] . " " . $row['Password'] ;
    }
echo"Done";*/
//if any results than name is taken otherwise the name is new
if (mysqli_num_rows($results) >= 1){
     // echo "Username already exists";
	global $uservalue;
	$uservalue=1;
  }else{
  	//echo"Username Valid";
	
  }
mysqli_close($cons); //close connection
}
?>

<a href="index.php"><img id="home" src="home.png"></a>
<form action="register.php" method="post">
<h1>Register</h1>
<div>
				<input type="text" placeholder="First Name" required="true" name="first" /> <!-- just noting the name parameter is what is used to fetch data in the php -->
			</div>
			<div>
				<input type="text" placeholder="Last Name" required="true" name="last" />
			</div>
			<div>
				<input type="email" placeholder="Email" required="true" name="email" />
			</div>
			<div>
				<input type="text" placeholder="Username" required="true" name="name" />
			</div>
			<div>
				<input type="password" placeholder="Password" required="true" name="pass" />
			</div>
		<br />
			<div>
				<input id="submitButton" type="submit" value="Register" />
				<br />		
			</div>
<form>

</div>
		</body>
</html>