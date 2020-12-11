<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\hall_db;
class Halls_api extends ResourceController
{
	// use \CodeIgniter\API\ResponseTrait;
	public function index(){
		$auth = new hall_db();
		$results = $auth->findAll();
		if ($results) {
			$msg='Successfully fetched all details';
					$response_data=[
					'status'=>True,
					'message'=>strtoupper($msg),
					'data'=>$results

					];
					return $this->response->setStatusCode(200)
										  ->setContentType('text/plain')
										  ->setBody($msg)
										  ->setJSON($response_data);
		}
	}
	public function search(){
		
		try {
				$data=[
					'search'=> $this->request->getVar('search'),
				];	
				
				$auth = new hall_db();
				$result = $auth->where(['hall_type'=>$data['search']])
							   ->orWhere(['location'=>$data['search']])
							   ->orWhere(['title'=>$data['search']])
							   ->orWhere(['id'=>$data['search']])
							   ->findAll();
				if ($result) {
					// return $this->respond($result);
					$msg='Successfully fetched details';
					$response_data=[
					'status'=>True,
					'message'=>strtoupper($msg),
					'data'=>$result

					];
					return $this->response->setStatusCode(200)
										  ->setContentType('text/plain')
										  ->setBody($msg)
										  ->setJSON($response_data);			
				}else{
					$msg = "Invalid Search , "."'".strtoupper($data['search'])."'"." Not Found";
					$response_data=[
					'status'=>False,
					'message'=> $msg
					];
					return $this->response->setStatusCode(400)
										  ->setContentType('text/plain')
										  ->setBody($msg)
										  ->setJSON($response_data);		
				}			
		} catch (\Exception $e) {
			$exception_msg = $e->getMessage();
			$response_data=[
					'status'=>False,
					'message'=>$exception_msg
				];
			return $this->response->setStatusCode(500,'false')
								  ->setContentType('text/plain')
								  ->setBody($exception_msg)
								  ->setJSON($response_data);					
		}

	}
}	