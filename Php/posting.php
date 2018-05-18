<?php 
//Defining our database paramateres
DEFINE('DB_USER','Mike');
DEFINE('DB_PSWD','ziza');
DEFINE('DB_HOST','localhost');
DEFINE('DB_NAME','WebsiteDB');
$dbcon=mysqli_connect(DB_HOST,DB_USER,DB_PSWD,DB_NAME);
if(!$dbcon){
	//Check if we have established connection to database
	die('error connecting to database!');
}
//Remove variables
unset($user,$title,$subtitle,$content,$date,$time);
//Check if post button is clicked
if(isset($_POST['posted'])){
	//Check if user filled out all required fields
if($_POST['title']!=null&&$_POST['title']!=''&&$_POST['content']!=null&&$_POST['content']!=''){
	//Check if a user is logged in
if(isset($_SESSION['usercurlogin'])){
	
	//Put post content into variables
	$user;$title;$subtitle;$content;$date;$time;
	
	$date=date('Y-m-d');
	$time=date('H:i:s');
	$user=$_SESSION['usercurlogin']['IDAccount'];
	$title=mysqli_real_escape_string($dbcon,$_POST['title']);
	$subtitle=mysqli_real_escape_string($dbcon,$_POST['subtitle']);
	$content=mysqli_real_escape_string($dbcon,$_POST['content']);
	
	//Query...
	$postthread="insert into thread(title,subtitle,dateadded,timeadded,userid,content) values('$title','$subtitle','$date','$time','$user','$content');";
	
	//Run query and check
	if(!mysqli_query($dbcon,$postthread)){
		//Show error
	echo "Error inserting data"." ".mysqli_error($dbcon);
	}
	//Show that we posted thread
	$_SESSION['posted']="true";
	//Unset post
	unset($_POST);
	//Redirect to forum page
	header('Location: forum.php');
}
//Else tell user to log in
else{
	echo "<script>
	 function showerror(){
	 var notconfirm=document.getElementById('post-error'); 
	 notconfirm.style.visibility='visible';
	 }
	 window.onload=showerror;</script>";
	   //Remove post data so error does not repeat
	 unset($_POST);	 
}
}
//Else show error
else{
	echo "<script>
	 function showerror(){
	 var notconfirm=document.getElementById('post-error'); 
	 notconfirm.style.visibility='visible';
	 notconfirm.innerHTML='Please fill out all required fields to post!';
	 }
	 window.onload=showerror;</script>";
	   //Remove post data so error does not repeat
	 unset($_POST);	 
}
}
session_write_close();
?>