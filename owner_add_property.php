<?php

require "connect.php";

$data= json_decode(file_get_contents('php://input'),true);
$city     = $_REQUEST["city"];
$address    = $_REQUEST["address"];
$ownerid = $_REQUEST["ownerid"];
$name  = $_REQUEST["ownername"];
$contact  = $_REQUEST["ownercontact"];
$rent = $_REQUEST["rent"];
$deposit = $_REQUEST["deposit"];


$output    = array();
// uploading pdf file for event

$fname=rand(100000,999999);
$uploadOk=1;
# updating file name with rand

if ($uploadOk == 1)
{


if(is_array($_FILES)) { 
        if(is_uploaded_file($_FILES['image1']['tmp_name'])){
            $sourcePath = $_FILES['image1']['tmp_name'];
            $targetPath = "PROPERTY_IMAGES/".$fname .$_FILES['image1']['name'];        
        if(move_uploaded_file($sourcePath,$targetPath)){
            $uploadOk=1;
            $image1 = $targetPath;
        }
    }
}

}

$sql_query = "INSERT INTO property_tbl (Property_city, Property_address, Owner_id, Owner_name, Owner_contact, Image1, Rent, deposit) VALUES ('".$city."','".$address."','". $ownerid."','". $name."','". $contact . "','" . $image1 . "','" . $rent . "','" . $deposit .  "')";
if(mysqli_query($conn,$sql_query))
{ 
	$output["id"]=$conn->insert_id;
	$output["response"]=1;
	$output["message"] = "Property  added.";
} else {
	$output["id"]=0;
	$output["response"]=0;
	$output["message"] = "Data not inserted";
}
echo json_encode($output);
?>