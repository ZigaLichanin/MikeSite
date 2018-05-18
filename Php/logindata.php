<?php
$userdataarr;
if(isset($_SESSION['usercurlogin'])){
	//Put data in variable
	$userdataarr=$_SESSION['usercurlogin'];	
}
if(isset($_SESSION['profilepic'])){
	//Put image data in variable
	$userimage=$_SESSION['profilepic'];
}
if(isset($userdataarr)){
// Return name from server if tehre is one
function givenamedata($userdataarr){
 if(trim($userdataarr['Ime'])!=""&&trim($userdataarr['Prezime'])!=""&&$userdataarr['Ime']!=null&&$userdataarr['Prezime']!=null)
	{
		return $userdataarr['Ime']." ".$userdataarr['Prezime']." ".$userdataarr["Username"];
	}
	else{
		return $userdataarr["Username"];
}}
// Return email from server if there is one
function giveemaildata($userdataarr){
	 if(trim($userdataarr['Email'])!=""&&$userdataarr['Email']!=null){
		return $userdataarr['Email'];
	}
	else{
		return "No email given!";
	}
}

//Check if we have userdata
if($userdataarr!=null){
	// Give variables userdata
$namedata=givenamedata($userdataarr);
$emaildata=giveemaildata($userdataarr);
}}
//Check if user is logged in
if(isset($userdataarr)&&isset($userimage))
{
echo"
<script>
$(document).ready(function(){
	//Creating variables for change of inner html
	var name=document.getElementById('name');
	var email=document.getElementById('email');
	var login_div=document.getElementById('hidden-login');
	var logout_div=document.getElementById('logout-btn-div');
	var profilepic=document.getElementById('userpic');
	var logged_in='false';
	var firstlogin='false';
	//Check if its users first time logging in!
	var firstlogin='".(isset($_SESSION['firstlogin']) ? $_SESSION['firstlogin']:'')."';
if(firstlogin=='true'){
	//Check if the user has logged in for first time
	 M.toast({html:'Logged in!',displayLength:5000});	  
}
//Check if we have login info!

logged_in='".(isset($userdataarr)?'true':'false')."';
if(logged_in=='true'){
	//Give our namedata variable account name and username 
	var namedata='".(isset($namedata)?$namedata:'')."';
	
	//Check if we have anything stored in our variable
	if(namedata!=null){
	name.innerHTML=namedata;
	}
	//Give our emaildata variable an email if there is one
	var emaildata='".(isset($namedata)?$emaildata:'')."';
	if(emaildata!=null){
		//Put emaildata into our html
		email.innerHTML=emaildata;
	}
	//Check if we have an image
	var imagedata='".$userimage['ImageData']."';
	if(imagedata!=null){
		//Put imagedata into our html
		profilepic.src=imagedata;
	}
	//Change login div to hidden
	login_div.style.visibility='hidden';
	//Change logout div to visible
	logout_div.style.visibility='visible';
}
});
</script>
";}
//Make first login false since the toast went off
if(isset($_SESSION['firstlogin'])){
	$_SESSION['firstlogin']='false';
}
//Unset given variable
 unset($userdataarr);
 ?>
