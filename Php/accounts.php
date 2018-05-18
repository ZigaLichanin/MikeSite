<?php
//Defining our database paramateres
DEFINE('DB_USER','2675892_ziga');
DEFINE('DB_PSWD','gamer123');
DEFINE('DB_HOST','fdb18.awardspace.net');
DEFINE('DB_NAME','2675892_ziga');
//Using variable to connect to database
$dbcon=mysqli_connect(DB_HOST,DB_USER,DB_PSWD,DB_NAME);

if(!$dbcon){
	//Check if we have established connection to database
	die('error connecting to database!');
}
//Check if data is sent!
if(isset($_POST["submittedlogin"])){
	//Unset all variables
	unset($logusername,$logpassword);
	unset($_SESSION['usercurlogin'],$_SESSION['profilepic']);
	//Data from form and selecting from database with values from form
	$logusername=mysqli_real_escape_string($dbcon,$_POST['username-login']);
	$logpassword=mysqli_real_escape_string($dbcon,$_POST['password-login']);
	
	//Getting data of user from database
	$sqlgetuserdata="Select * from accountinfo where username='$logusername' and password='$logpassword'";
	
	//Storing data of database into variable
	$dbloginresponse=mysqli_query($dbcon,$sqlgetuserdata);
	
	//Get select data from our retrieved data as array
	$dataloginarray=mysqli_fetch_array($dbloginresponse,MYSQLI_ASSOC);
	if(empty($dataloginarray)){
		echo "<script>console.log( 'Nema nista u data varijabli!' );</script>";
		//Give reason for any error 
		if(mysqli_error($dbcon)!=null){
		echo"<script>console.log('".mysqli_error($dbcon)."');</script>";
		}
		// If there is no user with that username or password ,show error
		echo"<script>function showerror(){
	 var notconfirm=document.getElementById('login-error'); 
	 notconfirm.style.visibility='visible';
	 }
	 window.onload=showerror;</script>";
	}
	else
	if(!empty($dataloginarray))
	{
	//Putting data in session storage for other pages
	$_SESSION['usercurlogin']=$dataloginarray;
	//Get image id from user
	$img_id=$_SESSION['usercurlogin']['ImageID'];
	$sqlreturnimage="SELECT * FROM profileimage WHERE imageid=$img_id";

	$dbloginresponse=mysqli_query($dbcon,$sqlreturnimage);
	if($dbloginresponse!=null){
		$dataloginarray=mysqli_fetch_array($dbloginresponse,MYSQLI_ASSOC);
		//echo $dataloginarray["ImageData"];
		$_SESSION['profilepic']=$dataloginarray;
	}
	unset($_POST);
	//Firstlogin check!
	$_SESSION['firstlogin']="true";
	session_write_close();
	//Send to homepage
	header('Location: index.php');
	}
}
else
if(isset($_POST["submitted"])){
	//Check if all required inputs are submitted
	if(isset($_POST["username"])&&isset($_POST["password"])&&isset($_POST["password-confirm"])&&isset($_POST['email'])){
	//Unset all variables in Post!
		unset($fullname,$firsname,$lastname,$username,$password_check,$password_confirm,$password,$email);
$password;$fullname;$firstname;$lastname;
	//Data set to variables and sent to database
	if(isset($_POST['fullname'])&&$_POST['fullname']!=""){
		//Check if name was given
	$fullname=explode(" ",$_POST['fullname']);
	$firstname=mysqli_real_escape_string($dbcon,$fullname[0]);
	$lastname=mysqli_real_escape_string($dbcon,$fullname[1]);
	}
	
	$username=mysqli_real_escape_string($dbcon,$_POST['username']);
	$password_check=mysqli_real_escape_string($dbcon,$_POST['password']);
	$password_confirm=mysqli_real_escape_string($dbcon,$_POST['password-confirm']);
	//Check if the same password was entered twice
	if($password_check==$password_confirm){
		$password=$password_check;
	}
	else{
		//Show Error
	 echo "<script>
	 function showerror(){
	 var notconfirm=document.getElementById('password-notconfirm'); 
	 notconfirm.style.visibility='visible';}
	 window.onload=showerror;</script>";
	 //Remove post data so error does not repeat
	 unset($_POST);
	}
	
	$email=mysqli_real_escape_string($dbcon,$_POST['email']);
	$_SESSION['usernamet']=$username;
	//Get image data from FILES
	$imageName=$_FILES['profileimage']['name'];
    $imageType=$_FILES['profileimage']['type'];	
	$imageData=($_FILES['profileimage']['tmp_name']);
	
	//Check if file is image!
if(!(getimagesize($_FILES['profileimage']['tmp_name'])))
{	
			 if($_FILES['profileimage']['type']!="image/jpeg")
  { 
	//Show error
     
      echo "<script>
	 function showerror(){
	 var notconfirm=document.getElementById('wrong-format'); 
	 notconfirm.style.visibility='visible';}
	 window.onload=showerror;</script>";
	   //Remove post data so error does not repeat
	 unset($_POST);
	 unset($_FILES);
	}
	else{
		//Check if image is given
		//Show error
      
      echo "<script>
	 function showerror(){
	 var notconfirm=document.getElementById('wrong-format'); 
	 notconfirm.style.visibility='visible';
	 notconfirm.innerHTML='Please choose an image for your profile!';}
	 window.onload=showerror;</script>";
	   //Remove post data so error does not repeat
	 unset($_POST);
	 unset($_FILES);
	}
  }
  //If it is an image,continue...
  else{
	//Nested if statement
	if($_POST['username']!=null&&$_POST['password']!=null&&isset($password)){
		//Put our image in a directory on server
		$uploaddir = 'ProfileImages/';
		$uploadfile = $uploaddir . basename($_FILES['profileimage']['name']);
		//Query for SQL
		$sqlimageinsert="insert into profileimage(imagename,imagetype,imagedata) values('$imageName','$imageType','$uploadfile');";
		//Check if our file was moved
		if(!(move_uploaded_file($_FILES['profileimage']['tmp_name'],$uploadfile))){
			echo "Error uploading image";
		}
		else{
		if(!mysqli_query($dbcon,$sqlimageinsert)){
		echo mysqli_error($dbcon);
		die("Error inserting image data!");
	}
	//Get last id that was inserted
		$lastid=mysqli_insert_id($dbcon);

	$sqlinsert="insert into accountinfo(username,password,ime,prezime,email,imageid) values('$username','$password','$firstname','$lastname','$email','$lastid');";
	//If there is an mysql error, die!
	if(!mysqli_query($dbcon,$sqlinsert)){
		echo mysqli_error($dbcon);
		die("Error inserting data!");
	}
	//Console telling us everything is ok!
	$newrowdata="1 row inserted succesfully";
	/*echo "<script>console.log( '". $newrowdata ."' );</script>";
	echo "<script>console.log( '". $_SESSION['usernamet']."' );</script>";*/
	//Redirect to thankyou page
	header('Location: thankyouforcreate.php');
	//Remove Post Data
	unset($_POST);
	
	//Close session storage
	session_write_close();
		}}
	else{
		//If all required fields were not filled show error
	echo"<script>function showerror(){
	 var notconfirm=document.getElementById('wrongname'); 
	 notconfirm.style.visibility='visible';
	 notconfirm.innerHTML='Please fill out all required fields!'}
	 window.onload=showerror;</script>";
	}}
}
}
?>