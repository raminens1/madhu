<?php

function get_restaurantname($name)
{
	$restaurants = [
		"Indian Restaurant"=>"Kingston",
		"Chinese Restaurant"=>"NewBurgh",
		"Mexican Restaurant"=>"Poughkeepsie"	
	];
	
	foreach($restaurants as $restaurant=>$location)
	{
		if($restaurant==$name)
		{
			return $location;
			break;
		}
	}
}

?>