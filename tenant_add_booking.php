<?php

require "connect.php";

$data= json_decode(file_get_contents('php://input'),true);

$pid     = $_REQUEST["propertyid"];
$oid      = $_REQUEST["ownerid"];
$oname  = $_REQUEST["ownername"];
$ocontact  = $_REQUEST["ownercontact"];
$tid   = $_REQUEST["tenantid"];
$tname   = $_REQUEST["tenantname"];
$tcontact   = $_REQUEST["tenantcontact"];
$image1 = $_REQUEST["image1"];
$bstatus = "PENDING";


$fname=rand(100000,999999);
$uploadOk=1;
# updating file name with rand
//$move1= "DOCUMENTS/".$fname . ".";

if(is_array($_FILES)) { 
        if(is_uploaded_file($_FILES['document']['tmp_name'])){
            $sourcePath = $_FILES['document']['tmp_name'];
            $targetPath = "DOCUMENTS/".$fname .$_FILES['document']['name'];        
        if(move_uploaded_file($sourcePath,$targetPath)){
            $uploadOk=1;
            $document = $targetPath;
        }
    }
}
$output    = array();

$sql_query = "INSERT INTO booking_tbl (Property_id, Owner_id, Owner_name, Owner_contact, Tenant_id, Tenant_name, Tenant_contact, document, bstatus, Image1) VALUES ('".$pid . "','" . $oid . "','" . $oname . "','" . $ocontact . "','" . $tid . "','" . $tname . "','" . $tcontact . "','" . $document . "','" . $bstatus . "','" . $image1 . "')";
if(mysqli_query($conn,$sql_query))
{
	$output["id"]=$conn->insert_id;
	$output["response"]=1;
	$output["message"] = "Booking added.";
} else {
	$output["id"]=0;
	$output["response"]=0;
	$output["message"] = "Data not inserted";
}
echo json_encode($output);
?>