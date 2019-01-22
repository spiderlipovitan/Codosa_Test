<?php
	require_once 'config.php';

	try{
		$accessToken = $helper->getAccessToken();
	}
	catch (\Facebook\Exceptions\FacebookResponseException $e){
		echo 'Response Exception: '. $e->getMessage();
		exit();
	}
	catch(\Facebook\Exceiptions\FacebookSDKException $e){
		echo 'SDK Exception: ' . $e->getMessage();
	}

	if(!$accessToken){
		header('Location: login.php');
		exit();
	}

	$oAuth2Client = $fb->getOAuth2Client();
	if($accessToken->isLongLived()){
		$accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
	}
	$response = $fb->get('/me?fields=id,name,email',$accessToken);
	$userData = $response->getGraphNode()->asArray();
	var_dump($userData);
?>