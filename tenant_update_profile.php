<?php

require "connect.php";

$data= json_decode(file_get_contents('php://input'), true);

$tid     = $data["tenantid"];
$tname  = $data["name"];
$tcontact = $data["contact"];
$taddress = $data["address"];
$temail = $data["email"];

$output     = array();

$sql_query = "UPDATE tenant_tbl set Tname = '$tname', Tcontact = '$tcontact', Taddress = '$taddress', TEmail = '$temail' where Tsrid ='$tid'";
if(mysqli_query($conn,$sql_query)) {

	$sql_query2 = "SELECT * FROM tenant_tbl WHERE Tsrid='$tid'";
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