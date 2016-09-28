<?php





function getUserDetails($sender,$access_token)
{

	$url="https://graph.facebook.com/v2.6/$sender?fields=first_name,last_name,profile_pic,locale,timezone,gender&access_token=$access_token";



	$options = array(
				'http' => array(
							'method' => 'GET',
						)
				);

	$context = stream_context_create($options);

	$user = json_decode(file_get_contents($url),true);

		GiveReply($sender,$user['first_name'],$access_token);
	
	//$json=file_get_contents($url,false,$context);
	//$user=json_decode($json);
	//$message=$user['first_name'];
	




}












?>