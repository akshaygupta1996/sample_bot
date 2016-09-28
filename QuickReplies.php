<?php



function ReplyQuick($sender,$message,$access_token){

				$data= array(
						'recipient' => array('id'=>"$sender"),
						'message'=>array(
							'text'=>"$message",
							'quick_replies'=>array(
									array(
											'content_type'=>'text',
											'title'=>'Red',
											'payload'=>'payload_red'
										),
									array(
											'content_type'=>'text',
											'title'=>'Green',
											'payload'=>'payload_green'
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