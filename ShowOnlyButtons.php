<?php


function onlyButtons($sender,$access_token)
{

	$bool=true;
	$data= array(
					'recipient' => array('id'=>"$sender"),
					'message'=> array(
						'attachment'=>array(
							'type'=>'template',
							'payload'=>array(
									'template_type'=>'button',
									'buttons'=>array(
											array(
												'type'=>'postback',
												'title'=>'Enter',
												'payload'=>'payload_valDest'
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



