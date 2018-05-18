<?php include 'Php/logout.php';?>
<?php include 'Php/accounts.php';?>
<DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<title>Accounts-Mihajlo Zigic Forums</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="Css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
	<script src="Javascript/jquery-3.3.1.js"></script>
	<?php include'Php/logindata.php'?>
	<script src="Javascript/accountpagejs.js"></script>
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
    <li><a href="forum.php" class="waves-effect"><i class="material-icons">message</i>Q&A</a></li>
	<li><a href="contact.html" class="waves-effect"><i class="material-icons">info</i>Contact Me</a></li>
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
		</div>
	</li>
		</form>
  </ul>
  
	</div>

</div>
<div class="section group row2-ac no-padding">
<div class="col span_12_of_12 no-margin">

<div class="account-parallax">
      <div class="parallax">
	  </div>
    </div>
	</div>
	</div>
<!--Content-->
<div class="content-ac" id="content">
<div class="title-border">
<div class="section group row3-ac no-padding">
<div class="col span_3_of_12"></div>
<div class="col span_6_of_12 no-margin"><div class="log-in-title">
<p><h4>Log In to your Account</h4></p>
</div></div>
<div class="col span_3_of_12"></div>
</div>
<div class="section group row4-ac no-padding">
<div class="col span_3_of_12"></div>
<div class="col span_6_of_12 no-margin"><div class="log-in-border">
<div class="bottom-border-img"></div>
</div></div>
<div class="col span_3_of_12"></div>
</div>
</div>
<div class="login-border">
<div class="section group row5-ac no-padding">
<div class="col span_3_of_12"></div>
<!--Form for php-->
<form id="loginform"  method="post" action="account.php">

<div class="col span_3_of_12"><div class="username-login">
 <i class="material-icons prefix">account_circle</i>
          <input id="username-login" type="text" name="username-login" class="validate">
          <label for="username-login">Username</label>
</div>
</div>
<div class="col span_3_of_12">
<div class="password-login">
<i class="material-icons prefix">lock_outline</i>
          <input id="password-login" type="password" name="password-login" class="validate">
          <label for="password-login">Password</label>
</div>
</div>
<input type="hidden" name="submittedlogin" value="true">

<div class="col span_3_of_12">
<div class="error-message-login">
<p class="error" id="login-error">Username or Password Incorrect</p>
</div>
</div>
</div>
<div class="section group row6-ac no-padding">
<div class="col span_4_of_12"></div>
<div class="col span_4_of_12"><div class="submit-btn">
<p class="center-align">
<button class="btn waves-effect waves-light grey darken-2 btn-submit" type="submit" name="loginacc">Log In
    <i class="material-icons right">send</i>
  </button>
  </p>
</div></div>
<div class="col span_4_of_12"></div>
</div>
</form>
<!--End of form-->
</div>
<div class="section group row7-ac no-padding">
<div class="col span_3_of_12"></div>
<div class="col span_6_of_12 no-margin">
<div class="dividing-row">
<div class="or-banner"><h4 class="divider-border">OR</h4>
</div>
</div>
</div>
<div class="col span_3_of_12"></div>
</div>
<div class="title-border top-border">
<div class="section group row8-ac no-padding">
<div class="col span_3_of_12"></div>
<div class="col span_6_of_12 no-margin"><div class="log-in-title">
<p><h4>Create an Account</h4></p>
</div></div>
<div class="col span_3_of_12"></div>
</div>
<div class="section group row9-ac no-padding">
<div class="col span_3_of_12"></div>
<div class="col span_6_of_12 no-margin"><div class="log-in-border">
<div class="bottom-border-img"></div>
</div></div>
<div class="col span_3_of_12"></div>
</div>
</div>
<div class="login-border">
<!--Form for php-->

<form id="createform" enctype="multipart/form-data" method="post" action="account.php" ">

<div class="section group row10-ac ">
<div class="col span_3_of_12"></div>
<div class="col span_3_of_12"><div class="name-create">
 <i class="material-icons prefix">account_circle</i>
          <input id="name" type="text" name="fullname" class="validate">
          <label for="name">First Name and Last Name (optional)</label>
</div>
</div>
<div class="col span_3_of_12">
<div class="username-create">
<i class="material-icons prefix">account_box</i>
          <input id="username" type="text" name="username" class="validate">
          <label for="username">Username</label>
</div>
</div>
<div class="col span_3_of_12">
<div class="error-msg-create">
<p class="error" id="wrongname">Your name must have a space between First Name and Last Name</p>
</div>
</div>
<div class="section group row11-ac ">
<div class="col span_3_of_12"></div>
<div class="col span_3_of_12">
<div class="password-create">
<i class="material-icons prefix">lock</i>
 <input id="password" type="password" name="password" class="validate">
          <label for="password">Password</label>
</div>
</div>
<div class="col span_3_of_12">
<div class="password-create-confirm">
<i class="material-icons prefix">lock_outline</i>
 <input id="password-confirm" type="password" name="password-confirm" class="validate">
          <label for="password-confirm">Confirm Password</label>
</div>
</div>
<div class="col span_3_of_12"><div class="error-message-create-passwrdconfirm">
<p class="error" id="password-notconfirm">The passwords that you have entered do not match</p>
</div></div>
</div>
<div class="section group row12-ac no-padding">
<div class="col span_3_of_12"></div>
<div class="col span_6_of_12">
<div class="e-mail-cont">
<i class="material-icons prefix">email</i>
 <input id="email" type="email" name="email" class="validate">
            <label for="email">Email (optional)</label>
</div>
</div>
<div class="col span_3_of_12"></div>
</div>
<div class="section group row13-ac no-padding">
<div class="col span_4_of_12">
<p class="profile-img-banner" style="text-align:right;">Profile Image</p>
</div>
<div class="col span_4_of_12">
<div class="file-field input-field">
      <div class="btn" style="background-color:rgba(30,30,30,1)">
        <span>Image</span>
        <input type="file" name="profileimage">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
</div>
<div class="col span_4_of_12">
<p class="error"  id="wrong-format">Image must be .jpg or .jpeg!</p>
</div>
</div>
<div class="section group row14-ac no-padding">
<div class="col span_4_of_12"></div>
<div class="col span_4_of_12"><div class="submit-btn">
<p class="center-align">
<button class="btn waves-effect waves-light grey darken-2 btn-submit" type="submit" name="createacc">Create Account
    <i class="material-icons right">send</i>
  </button>
  </p>
</div></div>
<div class="col span_4_of_12"></div>
</div>
</div>
<input type="hidden" name="submitted" value="true">
</form>

<!--End of Form-->
<!--End of Content-->
</div>
</body>
</html>
