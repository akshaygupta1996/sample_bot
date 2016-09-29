<?php


class SavePlaces
{
	private $lat;
	private $lng;
	private $google_places_key;

	function __construct($lat,$lng){

		$this->lat=$lat;
		$this->lng=$lng;
		$this->google_places_key='AIzaSyD6qp5rZCwKBe5o1-BMmMwlCC194Fgz3xg';
	}

	function getNatPlaces($sender,$access_token)
	{

		$url="https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$lat,$lng&radius=50000&type=natural_feature&key=$google_places_key";
		$json=json_decode(file_get_contents($url,true));
		$show=$json['results'][0]['geometry']['location']['lat'];
		GiveReply($sender,"$show",$access_token);


	}

}











?>