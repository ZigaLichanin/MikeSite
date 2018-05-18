<?php
$userdataarr;
echo "cao";
if(isset($_SESSION['usercurlogin'])){
	//Put data in variable
	$userdataarr=$_SESSION['usercurlogin'];	
}
else{
	echo "console.log( 'No login info!' );";
}
if(isset($_SESSION['profilepic'])){
	//Put image data in variable
	$userimage=$_SESSION['profilepic'];
}
else{
	echo "console.log( 'No profile pic!' );";
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
?>

$(document).ready(function(){
	//Creating variables for change of inner html
	var name=document.getElementById('name');
	var email=document.getElementById('email');
	var login_div=document.getElementById('hidden-login');
	var logout_div=document.getElementById('logout-btn-div');
	var profilepic=document.getElementById('userpic');
	var logged_in="false";
	var firstlogin="false";
	
	//Check if its users first time logging in!
	var firstlogin="<?php if(isset($_SESSION['firstlogin'])){echo $_SESSION['firstlogin'];}?>";
if(firstlogin=="true"){
	//Check if the user has logged in for first time
	 M.toast({html:"Logged in!",displayLength:5000});
	 <?php $_SESSION['firstlogin']="false";?>
}
//Check if we have login info!

logged_in="<?php if(isset($userdataarr)){ echo "true"; } else{ echo"false";} ?>";
if(logged_in=="true"){
	//Give our namedata variable account name and username 
	var namedata="<?php if(isset($namedata)){echo $namedata;}?>";
	
	//Check if we have anything stored in our variable
	if(namedata!=null){
	name.innerHTML=namedata;
	}
	//Give our emaildata variable an email if there is one
	var emaildata="<?php if(isset($emaildata)){echo $emaildata;}?>";
	if(emaildata!=null){
		//Put emaildata into our html
		email.innerHTML=emaildata;
	}
	//Check if we have an image
	var imagedata="<?php if(isset($userimage)){echo $userimage['ImageData'];}?>";
	if(imagedata!=null){
		//Put imagedata into our html
		profilepic.src=imagedata;
	}
	//Change login div to hidden
	login_div.style.visibility="hidden";
	//Change logout div to visible
	logout_div.style.visibility="visible";
}
});
<?php 
//Unset given variable and close session
 unset($userdataarr); session_write_close();
 ?>
