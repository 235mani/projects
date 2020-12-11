<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\user_db;
class Login_api extends ResourceController
{
	// use \CodeIgniter\API\ResponseTrait;
	public function index(){

		try {
				$data=[
					'email'=> $this->request->getVar('email'),
					'password'=> $this->request->getVar('password')
				];	
				
				$auth = new user_db();
				$result = $auth->where([
					'email'=>$data['email'],
				])
				->find();
				if ($result) {
					// return $this->respond($result);
					$pwd_verify = password_verify($data['password'], $result[0]['password']);
					if ($pwd_verify) {
					$response_data=[
									'status'=>True,
									'message'=>'Successfully Logged In',
									'data'=>$result

									];
						return $this->response->setStatusCode(200)
											  ->setContentType('text/plain')
											  ->setBody("Successfully Logged In")
											  ->setJSON($response_data);
						
					}else{
					$response_data=[
									'status'=>False,
									'message'=>'INVALID PASSWORD'
									];
					return $this->response->setStatusCode(400)
								  ->setContentType('text/plain')
								  ->setBody("INVALID PASSWORD")
								  ->setJSON($response_data);
					}

								
				}else{
					$response_data=[
					'status'=>False,
					'message'=>'USER NOT FOUND'
					];
					return $this->response->setStatusCode(400)
										  ->setContentType('text/plain')
										  ->setBody("USER NOT FOUND")
										  ->setJSON($response_data);		
				}			
		} catch (\Exception $e) {
			$exception_msg = $e->getMessage();
			$response_dataresponse_data=[
					'status'=>False,
					'message'=>$exception_msg
				];
			return $this->response->setStatusCode(500,'false')
								  ->setContentType('text/plain')
								  ->setBody($exception_msg)
								  ->setJSON($response_dataresponse_data);					
		}

	}
}	