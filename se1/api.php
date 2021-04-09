<?php
header("Content-Type:application");
require "data.php";

if(!empty($_GET['restaurantname']))
{
	$restaurantname=$_GET['restaurantname'];
	$location = get_restaurantname($name);
	
	if(empty($location))
	{
		response(NULL);
	}
	else
	{
		response($location);
	}	
}
else
{
	response(NULL);
}

function response($data)
{
	header("HTTP/1.1 ");
	
	echo $data;
}

?>
