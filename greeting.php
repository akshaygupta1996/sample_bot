<?php





function showGreetings($sender,$access_token)
{

			$data= array(
					'recipient' => array('id'=>"$sender"),
					'message'=> array(
						'attachment'=>array(
							'type'=>'template',
							'payload'=>array(
									'template_type'=>'button',
									'text'=>'hey..Lets get Started',
									'buttons'=>array(
											array(
												'type'=>'postback',
												'title'=>'Plan Your Tour',
												'payload'=>'payload_plantour'
												),
											array(
												'type'=>'postback',
												'title'=>'Get Restaurants',
												'payload'=>'payload_restaurants'
												),
											array(
												'type'=>'postback',
												'title'=>'Uber Ride',
												'payload'=>'payload_uber')

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