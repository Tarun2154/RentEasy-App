<?php

	$conn = mysqli_connect('localhost','root','','rentdb');	  

	if(!isset($_SESSION['aname'])) 
	{ 
        	session_start(); 
    } 

?>