<?php


//include 'whitelisting.php';

function ReplyButton($sender,$message,$access_token)
{

	//addDomainsToWhiteListing($access_token);

	$ar=array('red','green');
	$bool=true;
	$data= array(
					'recipient' => array('id'=>"$sender"),
					'message'=> array(
						'attachment'=>array(
							'type'=>'template',
							'payload'=>array(
									'template_type'=>'button',
									'text'=>'What do you want to do next',
									'buttons'=>array(
											array(
												'type'=>'postback',
												'title'=>'Show Red',
												'payload'=>'payload_'.$ar[0]
												),
											array(
												'type'=>'postback',
												'title'=>'Show Green',
												'payload'=>'payload_'.$ar[1]
												)
										)

								)
							)



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
			file_get_contents("https://graph.facebook.com/v2.6/me/messages?access_token=$access_token",false,$context);


}



?>