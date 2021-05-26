<?php

require "connect.php";

$data= json_decode(file_get_contents('php://input'), true);

$propertyid     = $data["propertyid"];
$city  = $data["city"];
$address = $data["address"];
$ownername  = $data["ownername"];
$contact = $data["contact"];
$rent = $data["rent"];
$deposit = $data["deposit"];


$output     = array();



		$sql_query = "UPDATE property_tbl set Owner_name = '$ownername', Owner_contact = '$contact', Property_address = '$address', Property_city = '$city', Rent = '$rent', deposit = '$deposit' where Property_id ='$propertyid'";
		if(mysqli_query($conn,$sql_query))
		{
			$output["response"]=1;
			$output["id"]=$propertyid;
			$output["message"] = "Owner Property Updated";
		} else {
			$output["response"]=0;
			$output["id"]=0;
			$output["message"] = "Data not update";
		}

	
echo json_encode($output);
?>