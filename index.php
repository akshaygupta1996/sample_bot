<?php

include 'GetMessage.php';
include 'image_reply.php';
include 'ButtonReply.php';
include 'QuickReplies.php';
include 'profile.php';
include 'getStarted.php';
include 'greeting.php';
include 'first_message.php';
include 'ShowOnlyButtons.php';
include 'multipleButtons.php';
$access_token = "EAAZA9ubG2IzEBALByzsHqpjR4v8OUiwjAY1o2a8B1zNkUvNqlHNZCmDhPnj61Tv4ZCRHGipSKqXdCN4hJ9FNW7eD74y33gxilH1EekQFEjzZCGFPLskODStnFVI5jwk8P8dQONkpmKIHaYhBY0CQ7xp8i1YTpWifJpa5gvLZA2QZDZD";
$verify_token = "planyourtour";
$hub_verify_token = null;
 


if(isset($_REQUEST['hub_challenge'])) {
    $challenge = $_REQUEST['hub_challenge'];
    $hub_verify_token = $_REQUEST['hub_verify_token'];
}
 
 if ($hub_verify_token === $verify_token) {
    echo $challenge;
}
//showGreetings($access_token);
//getStart($access_token);




$data = json_decode(file_get_contents("php://input"), true, 512, JSON_BIGINT_AS_STRING);
if (!empty($data['entry'][0]['messaging'])) {

		//showGreetings($access_token);
        foreach ($data['entry'][0]['messaging'] as $message) {

            // Skipping delivery messages
            if (!empty($message['delivery'])) {
                continue;
            }

            $command = "";

            // When bot receive message from user
            if (!empty($message['message'])) {
                $command = $message['message']['text'];

            // When bot receive button click from user
            } else if (!empty($message['postback'])) {
                $command = $message['postback']['payload'];
            }else if(!empty($message['call_to_actions']['payload'])){
            	$command=$message['call_to_actions']['payload'];
            }

            $payload=$command;

            // Handle command
            switch ($command) {

            	case 'Hiii':
            		showGreetings($message['sender']['id'],$access_token);
            		break;

            	case 'multiple':
            		multipleButtons($message['sender']['id'],$access_token);
            		break;
                // When bot receive "text"
                case 'text':
                	$sender=$message['sender']['id'];
                	GiveReply($message['sender']['id'],"$sender",$access_token);
                    //$bot->send(new Message($message['sender']['id'], 'This is a simple text message.'));
                    break;

                // When bot receive "image"
                case 'image':
                	GiveReply($message['sender']['id'],'Hiiiii image',$access_token);
                    //$bot->send(new ImageMessage($message['sender']['id'], 'https://developers.facebook.com/images/devsite/fb4d_logo-2x.png'));
                    break;

                // When bot receive "image"
                case 'local image':
                	GiveReply($message['sender']['id'],'Hiiiii local',$access_token);
                    //$bot->send(new ImageMessage($message['sender']['id'], dirname(__FILE__).'/fb4d_logo-2x.png'));
                    break;

                case 'quick button':
                		ReplyQuick($message['sender']['id'],'Buttons',$access_token);
                		break;

                case 'buttons':
                		ReplyButton($message['sender']['id'],'Buttons',$access_token);
                		break;

               	case 'payload_plantour':
               			$buttons=array('Select');
               			multipleButtons($message['sender']['id'],$buttons,$access_token,"Enter the destination you want to visit.. ");
               			//enterDestination($message['sender']['id'],$access_token);
               			break;
               	case 'payload_valDest':
               			GiveReply($message['sender']['id'],'You entered a valid destination',$access_token);
               			break;
               	case 'payload_restaurants':
               			GiveReply($message['sender']['id'],'Zomato Api',$access_token);
               			break;

               	case 'payload_uber':
               			GiveReply($message['sender']['id'],'Uber Api',$access_token);
               			break;


                case 'get_start_payload':
                	GiveReply($message['sender']['id'],'Hey..Lets get started',$access_token);
                	break;

                case preg_match('^payload_'):
                	//$payload=$message['postback']['payload'];
                	GiveReply($message['sender']['id'],$payload,$access_token);
                	break;
               /* case 'payload_green':
                	GiveReply($message['sender']['id'],'Green Buton Clicked',$access_token);
                	break;*/
                case 'Red':
                	GiveReply($message['sender']['id'],'I am Red',$access_token);
                	break;
                case 'profile':
                	getUserDetails($message['sender']['id'],$access_token);
                	break;
                /*default:
                	GiveReply($message['sender']['id'],'I am Default',$access_token);
                	break;*/

                }
               }
          }


/*if (isset($_POST)) {

	//$post=json_decode(file_get_contents($_POST),true);


	  // $sender=$input['sender'][0]['id'];
    //$sender=json_decode($input["sender"]["id"]);+
   $text = json_decode($input["postback"]["payload"]);

	if($text == "payload_red"){
	   GiveReply($sender,"Hello",$access_token);
	}
	else if ($text == "payload_green"){
	    GiveReply($sender,"hiii",$access_token);
	}
}





$input = json_decode(file_get_contents('php://input'), true);



$sender = $input['entry'][0]['messaging'][0]['sender']['id'];
$message = $input['entry'][0]['messaging'][0]['message']['text'];

if ($message=="Red")
{
	GiveReply($sender,$message,$access_token);
}
else{
	GiveReply($sender,$message,$access_token);
}

ReplyButton($sender,$message,$access_token);
*/

?>