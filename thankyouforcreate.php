<?php include 'Php/logout.php';?>
<DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<title>Thank you for creating an account!</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="Css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
	<!--Grab variable from php for username-->
	<script src="Javascript/jquery-3.3.1.js"></script>
	<?php $username=$_SESSION['usernamet'];?>
	<?php include'Php/logindata.php'?>
	<script src="Javascript/thankyou.php"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
	</head>
	<body>
	<div class="wrapper">
	<div class="section group row1 no-padding">

	<div class="col span_12_of_12 no-margin">
	<nav>
    <div class="nav-wrapper grey darken-4" >
	<a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <div class="movelogo"><a href="index.php" class="brand-logo"><div class="logo-container"><img class="logo" src="Css/Images/icon-webdev.jpg"></img></div></a></div>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="contact.html">Contact Me</a></li>
        <li><a href="forum.php">Q&A Forum</a></li>
        <li><a href="account.php">Account</a></li>
      </ul>
    </div>
  </nav>
  <div>
   <ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class="background">
        <img src="Css/Images/account-background.jpg">
      </div>
      <a href="#user" ><img class="circle" id="userpic" src="Css/Images/user.jpg"></a>
      <a href="#name" <span class="white-text name" id="name">No user Logged In please Log In</span></a>
      <a href="#email" "><span class="white-text email" id="email">Log into your account or Create your Account</span></a>
    </div></li>
    <li><a href="index.php" class="waves-effect" ><i class="material-icons">computer</i>Home</a></li>
    <li><a href="forum.html" class="waves-effect"><i class="material-icons">message</i>Q&A</a></li>
	<li><a href="contact.php" class="waves-effect"><i class="material-icons">info</i>Contact Me</a></li>
	<li><a href="account.php" class="waves-effect"><i class="material-icons">account_box</i>Account</a></li>
    <li><div class="divider"></div></li>
	<!--Log Out Button-->
		<form id="logout-btnform" method="post" action="account.php">
		<div id="logout-btn-div">
		<button class="btn waves-effect waves-light" id="logout_btn" style="background-color:rgba(130,130,130,1); color:black;" type="submit" name="logout_btn">Logout
    <i class="material-icons right">eject</i>
	</button>
	<input type="hidden" name="logout" value="true"/>
		</div>
		</form>
	<!--Hide log-in if we have logged in user-->
	<form id="loginform-sidenav"  method="post" action="account.php">
	<div id="hidden-login">
    <li><a class="subheader" style="color:black;">Log In</a></li>
    <li><a class="subheader" style="color:black;">Username</a></li>
	 <div class="input-field ">
	  <i class="material-icons prefix">account_circle</i>
          <input id="username-sidenav" type="text" name="username-login" class="validate">
          <label for="username-sidenav">Username</label>
        </div>
	<li><a class="subheader" style="color:black;">Password</a></li>
	<div class="input-field ">
	 <i class="material-icons prefix">lock_outline</i>
          <input id="password-sidenav" type="password" name="password-login" class="validate">
          <label for="password-sidenav">Password</label>
        </div>
		
		<input type="hidden" name="submittedlogin" value="true">
	<li>
		<div class="submit-btn-sidenav">
		<p class="center-align"><button class="btn waves-effect waves-light grey darken-2 btn-submit" type="submit" name="loginacc_sidenav">Log In</p>
    <i class="material-icons right">send</i>
  </button>
		</div>
	</li>
	</div>
		</form>
  </ul>
  
	</div>

</div>
<!--Content part of page-->
	<div class="thankyou-content" id="content">
	<div class="section group row1-ty no-padding">
	<div class="col span_3_of_12"></div>
	<div class="col span_6_of_12">
	<div class="thankyou-header">
	<h3>Thank you for creating your account on my website!</h3>
	</div >
	</div>
	<div class="col span_3_of_12"></div>
	</div>
	<div class="section group row2-ty no-padding">
	<div class="col span_2_of_12"></div>
	<div class="col span_8_of_12"><div class="benefits">
	<!--Fill in with js username of last added account-->
	<p class="username" id="usernameplaceholder"><?php echo $username;?>!</p>
	<p>You can now post stuff on my forum,and use the sidenav to its fullest!<br>Go back to accounts or to another page to login!<br>Thank you!</p>
	</div>
	</div>
	<div class="col span_2_of_12"></div>
	</div>
	<div class="section group row3-ty no-padding">
	<div class="col span_4_of_12"></div>
	<div class="col span_4_of_12"><div class="returnbtn">
	<!-- Dropdown Trigger -->
	<p class="center-align">
  <a class='dropdown-trigger btn' style="background-color:gray;" href='#' data-target='dropdown1'>Go back to</a>
  </p>

  <!-- Dropdown Structure -->
  <ul id='dropdown1' class='dropdown-content' style="background-color:rgba(60,60,60,1);">
    <li><a href="account.php"><i class="material-icons">account_box</i>Accounts</a></li>
    <li><a href="forum.php"><i class="material-icons">message</i>Forum</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="index.php"><i class="material-icons">computer</i>Home</a></li>
    
  </ul>
   </div>     
	
	<div class="col span_4_of_12"></div>
	</div>
	
	<!--End of content-->
	</div>
	
	</body>