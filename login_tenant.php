<?php

require "connect.php";

$data = json_decode(file_get_contents('php://input'), true);

$uemailid   = $data["temail"];
$upassword    = $data["tpwd"];

$sql_query = "SELECT * FROM tenant_tbl WHERE TEmail ='$uemailid' and Tpwd ='$upassword'";


$result = mysqli_query($conn,$sql_query);  
$value = array();
$check = mysqli_fetch_assoc($result);
//if we got some result 
 if(isset($check)){
$output["response"]=1;
$output["data"]=$check;
$output["message"] = "Tenant Login Successful";
} else {
$output["response"]=0;
$output["data"]=null;
$output["message"] = "Login Fail";
}

echo json_encode($output);

?>