<?php




function multipleButtons($sender,$buttons,$access_token,$message)
{

	//$buttons=array('one','two','three');
	$size=sizeof($buttons);

	$array_buttons=array();

	foreach($buttons as $but)
	{
		array_push($array_buttons,array('type'=>'web_url', 'url'=>'http://www.google.com','title'=>'Button'));
	}


	/*for($i=1;$i<=$size;$i++)
	{
		$b=array(
				'type'=>'web_url',
				'url'=>'http://www.google.com',
				'title'=>'hiii'
			);
		array_push($array_buttons,$b);
	}*/

	$data= array(
					'recipient' => array('id'=>"$sender"),
					'message'=> array(
						'attachment'=>array(
							'type'=>'template',
							'payload'=>array(
									'template_type'=>'button',
									'text'=>"$message",
									'buttons'=>$array_buttons

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