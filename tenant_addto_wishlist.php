<?php

require "connect.php";

$data= json_decode(file_get_contents('php://input'),true);

$pid     = $data["propertyid"];
$city    = $data["city"];
$address = $data["address"];
$oid      = $data["ownerid"];
$oname  = $data["ownername"];
$ocontact  = $data["ownercontact"];
$tid   = $data["tenantid"];
$tname   = $data["tenantname"];
$tcontact   = $data["tenantcontact"];
$image1 = $data["image1"];
$rent = $data["rent"];
$deposit = $data["deposit"];


$output    = array();

$sql_query = "INSERT INTO wishlist_tbl (Property_id, Property_city, Property_address, Owner_id, Owner_name, Owner_contact, Tenant_id, Tenant_name, Tenant_contact, Image1, Rent , deposit) VALUES ('".$pid . "','" . $city . "','" . $address . "','" . $oid . "','" . $oname . "','" . $ocontact. "','". $tid . "','" . $tname . "','" . $tcontact  . "','" . $image1 . "','" . $rent . "','" . $deposit . "')";
if(mysqli_query($conn,$sql_query))
{
	$output["id"]=$conn->insert_id;
	$output["response"]=1;
	$output["message"] = "Added to wishlist";
} else {
	$output["id"]=0;
	$output["response"]=0;
	$output["message"] = "Data not inserted";
}
echo json_encode($output);
?>