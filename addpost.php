<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="slider.css">
<style type="text/css">
header{width:100%; height:3vw; color:white; font-size:2vw; text-align:center; margin:0px; padding:0px; background-color:#37474f; position:fixed; z-index:2;}
#imgbar{height:40vw; width:100%; background-image: url("horizon.png"); background-size: cover; background-attachment:fixed}
body{background-color:#212121;  }
button{background:#5a595b; font-size:12px; text-decoration:none; padding: 0.5vw 1vw; border-radius:5px; color:white; appearance: none; box-shadow: none; display:inline-block; border:none;}
#login{position:absolute; right:1vw; top:0.5vw;}
#newThread{position: absolute; right:2vw; bottom:2vw; width:4vw; height:4vw; border-radius:2vw; background:#F44336; border:none; color: white; font-size: 2vw;}
#newThread:hover{background-color:#B71C1C}
input{width:35vw; height:5vw; background: none; appearance: none; 
			box-shadow: none; display:inline-block; border-bottom:1px solid white; border-top:none;
			border-left:none; border-right:none; margin:1vw; font-size:2vw; color:white;}
		#submitButton{background:#5a595b; text-decoration:none; padding: 0.5vw 1vw; 
			border-radius:5px; color:white; appearance: none; box-shadow: none; 
			display:inline-block; border:none;}
			#container{text-align:center; width:40vw; height:40vw; margin-left:auto;
		 margin-right:auto; background-color: #212121; color:white; margin-top:2vw;}
		 textarea{width:35vw; height:20vw; background: none; color:white; border:1px solid white;}
     h1{font-size:4vw; margin-top:10vw;}
</style>

</style>
</head>	
<body>

	<?php
session_start();
$threadName=$_GET["thread"];
echo $_SESSION['Log'].$_SESSION['USER'];
$title="a";
$titlevalue=0;

if($_SESSION['USER']==null){
  echo "<script>window.open('login.php','_self')</script>";
}

// Create connection
$con=mysqli_connect("mysql13.000webhost.com","a4857546_admin","****","a4857546_forum");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }else{
  	//echo "Connection successful ";
  }

if ($_SERVER["REQUEST_METHOD"] == "POST"){
   $title = test_input($_POST["title"]);
   $description = test_input($_POST["description"]);
  
}
function test_input($data){
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
     $data = addslashes($data);
   return $data;
}

$stamp=date('Y-m-d G:i:s');
$form = (string)$stamp;

if($title == 'a'){

}else{
print($_GET["thread"]);
mysqli_query($con,"INSERT INTO Posts (tstamp, title, content, user, threadName) VALUES ('".$form."','".$title."','".$description."','".$_SESSION['USER']."', '".$_GET['thread']."')");
echo "<script>window.open('forum.php','_self')</script>";
}
mysqli_close($con);
	?>

<ul class="navigation">
  <li class="nav-item"><a href="index.php">Home</a></li>
  <li class="nav-item"><a href="forum.php">Forum</a></li>
  <li class="nav-item"><a href="info.html">Information</a></li>
  <li class="nav-item"><a href="design.html">Design</a></li>
  <li class="nav-item"><a href="algae.html">Algae</a></li>
  <li class="nav-item"><a href="oil.html">Petrolium</a></li>
</ul>

<input type="checkbox" id="nav-trigger" class="nav-trigger" />
<label for="nav-trigger"></label>

<div class="site-wrap">
	
  <header id="header">
      Open Algae Farm
      <?php
session_start();
echo $_SESSION['Log'].$_SESSION['USER'];
      ?>
      <button id="login" onclick="window.open('login.php','_self');">
       <?php if($_SESSION['USER']!=null){
          echo"Logout";
       }else{
         echo"Login/Sign Up";
}
       ?>
      </button>
      
  </header>

<div id="container">
  <?php
echo "<h1>Thread: " . $_GET["thread"] . "</h1>";
?>
<br />
<?php $threadName=$_GET["thread"];
      $fillers=preg_replace('/[\s_]/', '%20', $threadName); 
?>

<?php echo ("<form method='post' action='http://openalgaefarm.netai.net/addpost.php?thread=" . $fillers. "'>"); ?>
			<div>
				<input type="text" placeholder="Title" required="true" name="title" />
			</div>
			<div>
				<textarea required="true" name="description">Content</textarea>
			</div>

			<div>
				<input id="submitButton" type="submit" value="Submit"/>
				<br />		
			</div>
<form>
</div>

</div>

</body>	
</html>