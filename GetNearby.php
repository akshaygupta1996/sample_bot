<?php


function findNearByPlaces($lat,$lng)
{
		$google_places_key="AIzaSyCP27CPWK-CPDUrR7w2FHy1ebSLM97Q724";
		$url="https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$lat,$lng&radius=50000&types=place_of_interest&key=$google_places_key";

		$json=file_get_contents($url);
		$obj=json_decode($json,true);
		$results=$obj['results'];
		$num=1;
		foreach($results as $result)
		{
			echo "<br>";
			echo $num."   ";
			$num=$num+1;
			echo $result['name'];
		}
}

findNearByPlaces(32.2396,77.1887);






?>