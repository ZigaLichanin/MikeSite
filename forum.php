<?php include 'Php/logout.php';
//SearchBar results
if(isset($_POST['searchsubmit'])){
	$_SESSION['searchtext']=$_POST['search'];
	unset($_POST);
	header('Location:searchresults.php');
}
?>
<DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<script src="Javascript/jquery-3.3.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="Css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
	<?php echo"<script>
	$(document).ready(function(){
	  //Check if its users first time logging in!
	var replyposted='".(isset($_SESSION['replyposted'])?$_SESSION['replyposted']:'')."';
if(replyposted=='true'){
	//Check if the user has logged in for first time
	 M.toast({html:'Reply posted!',displayLength:5000});
}});
</script>";
$_SESSION['replyposted']="false";?>
	<?php include "Php/forumjs.php";?>
	<?php include "Php/replyjs.php";?>
	<?php include'Php/logindata.php'?>
	<?php include 'Php/getthreads.php';?>  
<title>Forum Q&A || Post Questions and More! | Mihajlo Zigic Forums</title>


	
	</head>
	
	<body>
	<div class="wrapper">
	<div class="section group row1 no-padding">
		<div class="col span_12_of_12" style="margin:0;">
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
	  <div >
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
	<!--Start of content of forum-->
	<div class="content-forum" id="content">
	<div class="section group row1-f">
	<div class="span_12_of_12">
	<div class="sidebar z-depth-1">
  <ul class="forum-options">
<li><a href="postcontent.php">Create a Thread</a></li>
<li><a href="#collapsible2">Newest Threads</a></li>
<li><a href="#collapsible">Posted Threads</a></li>
<li>Search Threads</li>
<li><form action="forum.php" method="post">
        <div class="input-field">
          <input id="search" type="search" name="search" required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
		  <input type="hidden" name="searchsubmit" value="true">
        </div>
		<p class="center-align submit-btn">
	<button class="btn waves-effect waves-light grey darken-3 z-depth-3" type="submit" id="submit-btn" name="post-btn">Search
    <i class="material-icons right">search</i>
  </button>
  </p>
      </form></li>
</ul>
  </div>
  </div>
	</div>
	<div class="section group row2-f">
  <div class="col span_3_of_12"></div>
  <div class="col span_6_of_12">
  <!--Collapsible forum navigation to show our threads-->
	<ul class="collapsible grey darken-3 z-depth-3 collapsible1">
    <li>
      <div class="collapsible-header grey darken-4" id="collapsible"><i class="right material-icons">explore</i>Posted Questions</div>
      <div class="collapsible-body posted-questions" id="posted-questions">
	  <!--Dynamically add forum posts here-->
	  <ul id="posted-questions-list">
	 
	  </ul>
	  
	  </div>
    </li>  
  </ul>
  </div>
  <div class="col span_3_of_12">
  </div>
	</div>
	<div class="section group row3-f">
	<div class="col span_3_of_12"></div>
	<div class="col span_6_of_12">
	<ul class="collapsible grey darken-3 z-depth-3 collapsible2">
    <li>
      <div class="collapsible-header grey darken-4" id="collapsible2" ><i class="material-icons">explore</i>Newest Posted</div>
      <div class="collapsible-body posted-questions" id="posted-questions">
	  <!--Dynamically add forum posts here-->
	  <ul id="posted-newestquestions-list">
	 
	  </ul>
	</div>
	<div class="col span_3_of_12"></div>
	</div>
	<!--End of content-->
	</div>
	</body>
	</html>
	