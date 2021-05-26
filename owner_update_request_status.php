<?php

require "connect.php";

$data= json_decode(file_get_contents('php://input'), true);

$bookingid     = $data["bookingid"];
$bstatus = $data["bstatus"]; // ACCEPTED or REJECTED
$output     = array();



		$sql_query = "UPDATE booking_tbl set bstatus = '$bstatus' where Booking_id = '$bookingid'";
		if(mysqli_query($conn,$sql_query))
		{
			$output["response"]=1;
			$output["id"]=$bookingid;
			$output["message"] = "Tenant Request Updated.";
		} else {
			$output["response"]=0;
			$output["id"]=0;
			$output["message"] = "Data not update";
		}

	
echo json_encode($output);
?>