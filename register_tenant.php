<?php

require "connect.php";

$data= json_decode(file_get_contents('php://input'),true);

$uname     = $data["tname"];
$uemailid    = $data["temail"];
$upassword = $data["tpwd"];
$uaddress  = $data["taddress"];
$uphoneno  = $data["tcontact"];

$output    = array();

$sql_query = "INSERT INTO tenant_tbl (Tname, TEmail, Tpwd, Taddress, Tcontact) VALUES ('".$uname."','".$uemailid."','". $upassword ."','". $uaddress ."','". $uphoneno ."')";
if(mysqli_query($conn,$sql_query)) {

	$sql_query2 = "SELECT * FROM tenant_tbl WHERE TEmail='$uemailid'";
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