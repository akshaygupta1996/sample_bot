<?php





function getStart($access_token)
{

	$data= array(
					'setting_type' => 'call_to_actions',
					'thread_state'=>'new_thread',
					'call_to_actions'=>array(
								'payload'=>'get_start_payload'
							)
				);

			$options = array(
				'http' => array(
							'method' => 'POST',
							'content' => json_encode($data),
							'header'=>"Content-Type: application/json\n"
						)
				);

			$context = stream_context_create($options);
			file_get_contents("https://graph.facebook.com/v2.6/me/thread_settings?access_token=            $access_token",false,$context);
}





?>