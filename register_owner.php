<?php

require "connect.php";

$data= json_decode(file_get_contents('php://input'),true);

$uname     = $data["uname"];
$uemailid    = $data["uemail"];
$upassword = $data["upwd"];
$uaddress  = $data["uaddress"];
$uphoneno  = $data["ucontact"];

$output    = array();

$sql_query = "INSERT INTO owner_tbl (Uname, Ucontact, Uaddress, Uemail, Upwd) VALUES ('". $uname . "','" . $uphoneno . "','" . $uaddress . "','" . $uemailid . "','" . $upassword ."')";
if(mysqli_query($conn,$sql_query)) {

	$sql_query2 = "SELECT * FROM owner_tbl WHERE Uemail='$uemailid'";
	$result2 = mysqli_query($conn,$sql_query2);  

	$check = mysqli_fetch_assoc($result2);
	
	if(isset($check)){
		$output["response"]=1;
		$output["data"]=$check;
		$output["message"] = "Registration Successful.";
	} else {
		$output["response"]=0;
		$output["data"]=null;
		$output["message"] = "Data not update";
	}
} else {
	$output["data"]=null;
	$output["response"]=0;
	$output["message"] = "Data not inserted";
}
echo json_encode($output);
?>