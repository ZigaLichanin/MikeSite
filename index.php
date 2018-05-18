<?php include 'Php/logout.php';?>
<DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<title>Mihajlo Zigic Full Stack Developer</title>

<meta name="Description" content="Mihajlo Zigic Full Stack Developer and .NET Expert">

<meta name="KeyWords" content="Mihajlo,Zigic,Mihajlo Zigic,Full Stack Developer,Full,Stack,Developer,Freelancer">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="Css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
	
	<script src="Javascript/jquery-3.3.1.js"></script>
	<script src="Javascript/indexpagejs.js"></script>
	<?php include'Php/logindata.php'?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
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
<!--Content Part of landing page-->
<div class="content" id="content">

<div class="section group row2">
<div col span_12_of_12><p class="name" >Mihajlo Zigic</p></div>
</div>
<div class="section group row3">
<div col span_12_of_12><p class="titles">Professional WebSite Designer</p></div>
</div>



<div class="section group row4">
<div class="col span_4_of_12">
<div class="jobsicandodiv z-depth-2 ">
<p class="example">Jobs I Can Do</p>
<ul class="jobsicandolist ">

<li>Create WebSites using: <ul class="using">
<li>HTML5 or HTML</li>
<li>CSS3 or CSS</li>
<li>PHP and NodeJS</li>
<li>JavaScript and Jquery</li>
</ul>
</li>
<li>ASP.NET Web Applications</li>
<li>Unity Scripts (C#)</li>
<li>Desktop Applications (C#)</li>
<li>SQL Connection and Queries</li>
</ul>
</div>
</div>
<div class="col span_4_of_12">
<div class="icanalsodo z-depth-2">
<p class="example">I Can Also Do</p>
<ul class="icanalsodolist">
<li>Reviews of Code</li>
<li>Unity Sprites and Backgrounds</li>
<li>Unity Animations</li>
<li>Photoshop Design</li>
<li>Pixel Art</li>
<li>Image Correction</li>
<li>Working with Developer Teams</li>
</ul>
</div>
</div>
<div class="col span_4_of_12">
<div class="photograph z-depth-2">
<p class="example">My Photograph</p>
<div class="photo-container">
<img class="myphoto" src="Css/Images/proffesional2.jpg"></img>
</div>
</div>
</div>
</div>
<div class="section group row5 ">
<div class="col span_12_of_12 z-depth-3">
<div class="imgcontainer"></div>
</div>
</div>
<div class="section group row6 ">
<div class="col span_2_of_12">  </div>
<div class="col span_8_of_12">
<div class="collapsebutton">
<ul class="collapsible grey darken-3 z-depth-4">
    <li class="active">
      <div class="collapsible-header grey darken-4"><i class="material-icons">home</i>High School Degree</div>
      <div class="collapsible-body"><span>I have gotten my degree from Technical School "Ivan Saric".<br>High School Degree in IT and Electronics<br>I finished with great grades.</span></div>
    </li>
    <li>
      <div class="collapsible-header grey darken-4"><i class="material-icons">info</i>Currently Attending Higher Technical School</div>
      <div class="collapsible-body"><span>I'm currently attending Higher Technical School in Novi Sad,Serbia.<br>Hope to freelance and gain knowledge and money to continue studies.<br>My dedication and willpower is the reason for success!</span></div>
    </li>
    <li>
      <div class="collapsible-header grey darken-4"><i class="material-icons">computer</i>I worked as a freelancer</div>
      <div class="collapsible-body"><span>I have worked as a freelancer multiple times during my studies.<br>You can hire me on UpWork or Freelancer respectively.<br>You can also find my contact info in Contacts Tab feel free to contact me!</span></div>
    </li>
  </ul>
  </div>
</div>
<div class="col span_2_of_12 "> </div>
</div>
<div class="section group row7 ">
<div class="col span_2_of_12 ">
</div>
<div class=" col span_8_of_12 notop-margin">
<div class="imageslider z-depth-2">
<div class="slider ">
    <ul class="slides">
      <li>
        <img src="Css/Images/unitybanner.jpg"> 
        <div class="caption left-align">
          <h3>Unity Animations</h3>
          <h5 class="light grey-text text-lighten-3">Backgrounds and Sprites!</h5>
        </div>
      </li>
      <li>
        <img src="Css/Images/pixelart.jpg"> 
        <div class="caption center-align black-background ">
          <h3 class="white-text ">Pixel Art</h3>
          <h5 class=" white-text ">Created in Photoshop</h5>
        </div>
      </li>
      <li>
        <img src="Css/Images/.netframework.jpg"> 
        <div class="caption left-align">
          <h3 class="black-text">.Net Framework</h3>
          <h5 class=" black-text ">Creating ASP.Net websites and more.</h5>
        </div>
      </li>
  
    </ul>
  </div>
</div>
</div>
<div class="col span_2_of_12"></div>
</div>
<div class="section group row7 ">
<div class="col span_12_of_12">
<div class="footer"><div class="footer-text">Ziga&Co Website Hosted on AwardSpace.com!!!</div></div>
</div>
</div>
</div>
<!--End of content part-->
</body>
</html>