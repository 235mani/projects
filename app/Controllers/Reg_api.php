<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\user_db;
class Reg_api extends ResourceController
{
	use \CodeIgniter\API\ResponseTrait;
	public function index(){
		
		// $input_infojsonobj = $this->request->getJSON();    //in obj file
		// $input_infojson = json_encode($input_infojsonobj); //obj to json
		// $input_info = json_decode($input_infojson,true);   //json to array
		// $someJSON = json_encode($someArray); 			  //array to json
 		// print_r($input_info);

		
		try {
			
			$rules = [
			'confirm_password'=>'matches[password]',
			];
			if (!$this->validate($rules)) {
				$data=[
						'status'=>False,
						'message'=>'password mismatch'
					];
					return $this->response->setStatusCode(400,'false')
										  ->setContentType('text/plain')
										  ->setBody("password mismatch")
										  ->setJSON($data);
			}

			// if ($this->request->getVar('name')=='') {
			// 	$name='';
			// }else{
			// 	$name=$this->request->getVar('name');
			// }
			// if ($this->request->getVar('address')=='') {
			// 	$address='';
			// }else{
			// 	$address=$this->request->getVar('address');
			// }

			$reg_pwd=$this->request->getVar('confirm_password');
			$reg_pwd_hash = password_hash($reg_pwd, PASSWORD_BCRYPT);
			$uni_id = md5(str_shuffle("abcdefghijklmnopqrstuvwxyz"));
			$input_info=[
				// 'name'=>$name,
				// 'email'=> $this->request->getVar('email'),
				// 'password'=>$reg_pwd_hash,
				// 'address'=>$address

				"user_id" => $uni_id,
				"name" => '',
				"email" => $this->request->getVar('email'),
				"password" => $reg_pwd_hash,
				"address" => '',
				"created_at" => date('Y-m-d h:i:s')
			];

			$auth = new user_db();
			$result = $auth->insert($input_info);
			if ($result) {
				$data=[
					'status'=>True,
					'message'=>'Successfully Registered',
					'data'=>$input_info

				];
				return $this->response->setStatusCode(200,'true')
									  ->setContentType('text/plain')
									  ->setBody("Successfully Registered")
									  ->setJSON($data);			
			}else{
				$data=[
					'status'=>False,
					'message'=>'FAILED TO REGISTER'
				];
				return $this->response->setStatusCode(400,'false')
									  ->setContentType('text/plain')
									  ->setBody("FAILED TO REGISTER")
									  ->setJSON($data);
			}			
		} catch (\Exception $e) {
			$exception_msg = $e->getMessage();
			$data=[
					'status'=>False,
					'message'=>$exception_msg
				];
			return $this->response->setStatusCode(500,'false')
								  ->setContentType('text/plain')
								  ->setBody($exception_msg)
								  ->setJSON($data);
			
		}

		// return $this->respondCreated($input_info);
		
		// return redirect()->to( base_url('home/reg_login') )->with('input_info1', $input_info1);		
	}
}