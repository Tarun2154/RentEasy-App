<?php

require "connect.php";

$data= json_decode(file_get_contents('php://input'), true);

$userid     = $data["ownerid"];
$name  = $data["name"];
$contact = $data["contact"];
$address = $data["address"];
$email = $data["email"];

$output     = array();



$sql_query = "UPDATE owner_tbl set Uname = '$name', Ucontact = '$contact', Uaddress = '$address', Uemail = '$email' where Usrid ='$userid'";
if(mysqli_query($conn,$sql_query)) {

	$sql_query2 = "SELECT * FROM owner_tbl WHERE Usrid='$userid'";
	$result2 = mysqli_query($conn,$sql_query2);  

	$check = mysqli_fetch_assoc($result2);
	
	if(isset($check)){
		$output["response"]=1;
		$output["data"]=$check;
		$output["message"] = "Profile Updated";
	} else {
		$output["response"]=0;
		$output["data"]=null;
		$output["message"] = "Data not update";
	}
} else {
	$output["response"]=0;
	$output["id"]=0;
	$output["message"] = "Data not update";
}

	
echo json_encode($output);
?>