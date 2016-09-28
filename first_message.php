<?php





function enterDestination($sender,$access_token)
{

	GiveReply($sender,"Enter the destination you want to visit.. ",$access_token);
	onlyButtons($sender,$access_token);
}





?>