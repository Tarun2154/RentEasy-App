<?php

require "connect.php";
$data=json_decode(file_get_contents('PHP://input'),true);
$userid = $data['ownerid'];
$result="SELECT * FROM booking_tbl where Owner_id  ='" . $userid ."' and bstatus = 'PENDING'";
$res1=mysqli_query($conn,$result);
$value=array();

while($row=mysqli_fetch_assoc($res1))
{
    $value[]=$row;
}
echo json_encode(array("result"=>$value));
?>