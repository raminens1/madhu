<?php
header("Content-Type:application/json");
require "data.php";

if(!empty($_GET['restaurantname']))
{
	$restaurantname=$_GET['restaurantname'];
	$location = get_location($name);
	
	if(empty($location))
	{
		response(200,"Restaurant Not Found",NULL);
	}
	else
	{
		response(200,"Restaurant Found",$location);
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
