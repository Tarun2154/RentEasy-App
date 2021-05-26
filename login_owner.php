<?php

require "connect.php";
$data = json_decode(file_get_contents('php://input'), true);
$uemailid   = $data["uemail"];
$upassword    = $data["upwd"];

$sql_query = "SELECT * FROM owner_tbl WHERE Uemail ='$uemailid' and Upwd ='$upassword'";


$result = mysqli_query($conn,$sql_query);  
$value = array();
$check = mysqli_fetch_assoc($result);
//if we got some result 
 if(isset($check)){
$output["response"]=1;
$output["data"]=$check;
$output["id"]=$check['Usrid'];
$output["message"] = "Owner Login Successful";
} else {
$output["response"]=0;
$output["data"]=null;
$output["id"]="0";
$output["message"] = "Login Fail";
}
echo json_encode($output);
?>