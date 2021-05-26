<?php

require "connect.php";
$data=json_decode(file_get_contents('PHP://input'),true);
$tenantid = $data['tenantid'];
$result="SELECT * FROM wishlist_tbl where Tenant_id  ='" . $tenantid ."'";
$res1=mysqli_query($conn,$result);
$value=array();

while($row=mysqli_fetch_assoc($res1))
{
    $value[]=$row;
}
echo json_encode(array("result"=>$value));
?>