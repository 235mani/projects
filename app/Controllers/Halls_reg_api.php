<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\hall_db;
class Halls_reg_api extends ResourceController
{
	// use \CodeIgniter\API\ResponseTrait;
	public function index(){

		try {
			$input_info=[
				'title'=> $this->request->getVar('title'),
				'coolant'=> $this->request->getVar('coolant'),
				'food_type'=> $this->request->getVar('food_type'),
				'full_address'=> $this->request->getVar('full_address'),
				'parking'=> $this->request->getVar('parking'),
				'hall_capacity'=> $this->request->getVar('hall_capacity'),
				'location'=> $this->request->getVar('location'),
				'rating'=> $this->request->getVar('rating'),
				'rent'=> $this->request->getVar('rent'),
				'image'=> $this->request->getVar('image'),
				'veg_price'=> $this->request->getVar('veg_price'),
				'non_veg_price'=> $this->request->getVar('non_veg_price'),
				'hall_type'=> $this->request->getVar('hall_type'),
				'about_hall'=> $this->request->getVar('about_hall')
			];
			$auth = new hall_db();
			$result = $auth->insert($input_info);
			if ($result) {
				$data=[
					'status'=>True,
					'message'=>'HALL DETAILS SUBMITTED SUCCESSFULLY',
					'data'=>$input_info

				];
				return $this->response->setStatusCode(200,'true')
									  ->setContentType('text/plain')
									  ->setBody("HALL DETAILS SUBMITTED SUCCESSFULLY")
									  ->setJSON($data);			
			}else{
				$data=[
					'status'=>False,
					'message'=>'FAILED TO REGISTER HALL DETAILS'
				];
				return $this->response->setStatusCode(400,'false')
									  ->setContentType('text/plain')
									  ->setBody("FAILED TO REGISTER HALL DETAILS")
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

	}
}	