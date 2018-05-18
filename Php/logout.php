<?php
    session_start();
//Logout user
 if(isset($_POST["logout"])){
	unset($_SESSION['usercurlogin']);
	unset($_SESSION['profileimage']);
    unset($_POST);
    //header("account.php");	Not needed
    } ?>