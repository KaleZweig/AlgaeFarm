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
a{color:white; margin-top: 1vw; font-size: 1vw;}
#topSpace{margin-top:4vw; margin-left: 2vw;}
</style>

</style>
</head>	
<body>

	
<ul class="navigation">
	<li class="nav-item"><a href="#">Forum</a></li>
	<li class="nav-item"><a href="#">Information</a></li>
	<li class="nav-item"><a href="#">Design</a></li>
	<li class="nav-item"><a href="#">Algae</a></li>
	<li class="nav-item"><a href="#">Petrolium</a></li>
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
  <input id="newThread" type="button" value="+" onclick="window.open('addthread.php','_self');"/>
<div id="topSpace">
<?php
session_start();
//echo $_SESSION['Log'].$_SESSION['USER'];
// Create connection
$con=mysqli_connect("mysql13.000webhost.com","a4857546_admin","ModularAlgae555","a4857546_forum");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }else{
    //echo "<h2>Connection successful</h2>";
  }

$sql = "SELECT * FROM Threads ORDER BY tstamp";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $filler=$row["thread_title"];
      $fillers=preg_replace("/[\s_]/", "%20", $filler);
        echo "<a href=http://openalgaefarm.netai.net/urlget.php?thread=" . $fillers. ">" . $row["thread_title"] . " - " . $row["description"] . "</a><hr />";
    }
} else {
    echo "0 results";
}

mysqli_close($con);

  ?>
</div>

</div>

</body>	
</html>