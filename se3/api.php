<?php
header("Content-Type:application/json");
require "data.php";

if(!empty($_GET['restaurantname']))
{
	$restaurantname=$_GET['restaurantname'];
	$peoplecapacity = get_restaurant($restaurantname);
	
	if(empty($peoplecapacity))
	{
		response(200,"Restaurant Not Found",NULL);
	}
	else
	{
		response(200,"Restaurant Found",$peoplecapacity);
	}	
}
else
{
	response(400,"Invalid Request",NULL);
}

function response($status,$status_message,$data)
{
	header("HTTP/1.1 ".$status);
	
	$response['status']=$status;
	$response['status_message']=$status_message;
	$response['data']=$data;
	
	$json_response = json_encode($response);
	echo $json_response;
}
?>
