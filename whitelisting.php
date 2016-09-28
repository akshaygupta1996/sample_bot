<?php



function addDomainsToWhiteListing($access_token)
{

	$extension_data=array(

			'setting_type'=>'domain_whitelisting',
			'whitelisted_domains'=>array(
							'https://chat2learn.in/'
					),
			'domain_action_type'=>'add'
		);
	$options = array(
				'http' => array(
							'method' => 'POST',
							'content' => json_encode($extension_data),
							'header'=>"Content-Type: application/json\n"
						)
				);

			$context = stream_context_create($options);
			file_get_contents("https://graph.facebook.com/v2.6/me/thread_settings?access_token=            $access_token",false,$context);


}



?>