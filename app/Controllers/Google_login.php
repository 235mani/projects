<?php namespace App\Controllers;

use App\Controllers\BaseController;
// use App\Models\user_db;
use App\Models\google_login_db;

class Google_login extends BaseController
{

	public function index(){
		include_once APPPATH."libraries/vendor/autoload.php";
		$session = session();
		$google_client = new \Google_Client();

		$google_client->setClientId('516737765639-52d89dc0nrf4nparsl42puugckqgmsh8.apps.googleusercontent.com'); //Define your ClientID

		$google_client->setClientSecret('ptKGJMDb_hjGvLG9YE9mlM8X'); //Define your Client Secret Key

		$google_client->setRedirectUri('http://localhost:8080/ci_frame/Google_login'); //Define your Redirect Uri

		$google_client->addScope('email');

		$google_client->addScope('profile');

		  	if(isset($_GET["code"]))
		  	{
		   			$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

				   	if(!isset($token["error"]))
				   	{
					    $google_client->setAccessToken($token['access_token']);

					    $session->set('access_token', $token['access_token']);

					    $google_service = new Google_Service_Oauth2($google_client);

					    $data = $google_service->userinfo->get();
					    // print_r($data);
					    $auth = new google_login_db();
					    if ($this->$auth->user_exists($data['id'])) {
					    	$userinfo=[
					    		'first_name'=>$data['given_name'],
					    		'last_name'=>$data['family_name'],
					    		'email'=>$data['email'],
					    		'profile_pic'=>$data['picture']
					    	];
					    	$this->$auth->update_user($userinfo,$data['id']);
					    	$session->set('google_user',$userinfo);
					    	return redirect()->to(base_url().'/user_home');
					    }else{
					    	$userinfo=[
					    		'oauth_id'=>$data['id'],
					    		'first_name'=>$data['given_name'],
					    		'last_name'=>$data['family_name'],
					    		'email'=>$data['email'],
					    		'profile_pic'=>$data['picture']
					    	];
					    	$this->$auth->create_user($userinfo);
					    	$session->set('google_user',$userinfo);
					    	return redirect()->to(base_url().'/user_home');
					    }				    
				   }
		  	}
		  	if (!$session->get('access_token')) {
		  		$data['login_button'] = $google_client->createAuthUrl();
		  	}
		  	return view('google_login',$data);
	}
	// function logout()
	//  {
	//   // $this->session->unset_userdata('access_token');

	//   // $this->session->unset_userdata('user_data');
	// 	$session = session();
	// 	$session->destroy();
	// 	return $this->response->redirect(base_url('Google_login'));
	//  }
}


