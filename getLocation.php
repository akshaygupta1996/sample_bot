<?php




function GetLatLon($location)
{
	$geocoding_api_key="AIzaSyA0HYYfMDYEF0dkiomhGvf09uNhkiLrIvc";
$url="https://maps.googleapis.com/maps/api/geocode/json?address=$location&key=$geocoding_api_key";
		$json=file_get_contents($url);
		$obj=json_decode($json,true);
		$lat=$obj['results'][0]['geometry']['location']['lat'];
		$lng=$obj['results'][0]['geometry']['location']['lng'];
		echo $lat;	
		echo $lng;
}

$location="Nagpur";
GetLatLon($location);





?>