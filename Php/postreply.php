<?php
//Defining our database paramateres
DEFINE('DB_USER','Mike');
DEFINE('DB_PSWD','ziza');
DEFINE('DB_HOST','localhost');
DEFINE('DB_NAME','WebsiteDB');
//Using variable to connect to database
$dbcon=mysqli_connect(DB_HOST,DB_USER,DB_PSWD,DB_NAME);
if(!$dbcon){
	//Check if we have established connection to database
	die('error connecting to database!');
}
$idop=$_GET['PostID'];

//Check if user posted the reply
if(isset($_POST['reply-posted']))
{
	//Check if user logged in
	if(!isset($_SESSION['usercurlogin'])){
		//Post error message and warning
		echo"<script>function showerror(){
	 var replyerror=document.getElementById('reply-error'); 
	 replyerror.innerHTML='No user logged in please log in to reply';
	 replyerror.style.visibility='visible';
	 }
	 window.onload=showerror;</script>";
	}
	else{
		if(!isset($_POST['reply-content'])||$_POST['reply-content']==''){
			//Post error message and warning
		echo"<script>function showerror(){
	 var replyerror=document.getElementById('reply-error'); 
	 replyerror.innerHTML='Please fill out your reply in order to post!';
	 replyerror.style.visibility='visible';
	 }
	 window.onload=showerror;</script>";
		}
		else{
			$userid=$_SESSION['usercurlogin']['IDAccount'];
			
			$content=mysqli_real_escape_string($dbcon,$_POST['reply-content']);
			$date=date('Y-m-d');
			$time=date('H:i:s');
			//Get values and put them into DB
			//Query for sql
		$sqlinsertreply="Insert into reply (IDOP,UserId,DateAdded,TimeAdded,Content) values ('$idop','$userid','$date','$time','$content')";
			mysqli_query($dbcon,$sqlinsertreply);
			if(mysqli_error($dbcon)!=null){
				//Show error if there is any
				echo mysqli_error($dbcon);	
			}
			unset($_POST);
			//Tell user that he has posted an reply
			$_SESSION['replyposted']="true";
			header('Location:forum.php');
		}
	}
	
}

?>