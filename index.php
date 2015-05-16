<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="slider.css">
<style type="text/css">
header{width:100%; height:75px; color:white; font-size:50px; text-align:center; margin:0px; padding:0px; background-color:#37474f; position:fixed; z-index:2; }
body{background-color:#212121;  }
#imgbar{height:40vw; width:100%; background-image: url("horizon.png"); background-size: cover; background-attachment:fixed; margin-top:70px;}
button{background:#5a595b; font-size:28px; text-decoration:none; padding: 0.5vw 1vw; border-radius:5px; color:white; appearance: none; box-shadow: none; display:inline-block; border:none;}
#login{position:absolute; right:1vw; top:0.5vw;}
#logout{position:absolute; right:12vw; top:0.5vw;}
#leftImage{width:24vw; height:auto; margin-top:2vw; margin-bottom:2vw; margin-left:20vw; border-radius:20vw;}
#rightImage{width:24vw; height:auto; margin-top:2vw; margin-bottom:2vw; margin-left:54vw; border-radius:20vw;}
#mainTitle{color:white; font-size:6vw; padding-top:8vw; padding-left:5vw;}
#mainLogo{position:absolute; top:5vw; right:10vw; width:40vw; height:auto; margin-top:70px;}
#firstBox{color:white; font-size:4vw; text-decoration:none; position:absolute; top:53vw; left:55vw;}
#secondBox{color:white; font-size:4vw; text-decoration:none; position:absolute; top:82vw; left:15vw;}
#thirdBox{color:white; font-size:4vw; text-decoration:none; position:absolute; top:109vw; left:55vw;}
#fourthBox{color:white; font-size:4vw; text-decoration:none; position:absolute; top:138vw; left:26vw;}
#fifthBox{color:white; font-size:4vw; text-decoration:none; position:absolute; top:166vw; left:55vw;}


</style>
</head>
<body>

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
  
  <div id="imgbar">
      <div id="mainTitle">The future<br />of<br />biofuels</div>
      <img id="mainLogo" src="newLogo.png">
  </div>
  

<img src="forum.png" id="leftImage">
<a href="forum.php" id="firstBox"> Share and contribute <br /> on the Forum</a>
<hr />
<img src="info.jpg" id="rightImage">
<a href="info.html" id="secondBox"> More information <br /> on the project</a>
<hr />
<img src="blueprint.jpg" class="jpg" id="leftImage">
<a href="design.html" id="thirdBox"> The <br /> Design</a>
<hr />
<img href="algae.html" src="algae.jpg" id="rightImage">
<a href="algae.html" id="fourthBox"> All about <br /> algae</a>
<hr />
<img src="oil.jpg" id="leftImage">
<a href="oil.html" id="fifthBox"> The issues with <br /> petrolium fuels</a>

</div>


</body>
</html>