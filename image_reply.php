<?php




function ReplyImage($sender,$message,$access_token)
{

		$data= array(
					'recipient' => array('id'=>"$sender"),
					'message'=>array(
						       'attachment'=>array('type'=>'image',
										'payload'=>
									   array('url'=>'http://image-photos.linternaute.com/image_photo/640/8873407245/19118.jpg')
									 ),
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