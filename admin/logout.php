<?php
	session_start();
	unset($_SESSION['isloginAdmin']);
	
	session_destroy();
	session_regenerate_id();
	
	
	//clear all session data
	//unset($_SESSION);
	//$_SESSION = array();
	
?>