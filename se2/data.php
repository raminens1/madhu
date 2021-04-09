<?php

function get_restaurant($name)
{
	$restaurants = [
		"Indian Restaurant"=>7,
		"Chinese Restaurant"=>5,
		"Mexican Restaurant"=>10		
	];
	
	foreach($restaurants as $restaurant=>$personcount)
	{
		if($restaurant==$name)
		{
			return $personcount;
			break;
		}
	}
}

?>