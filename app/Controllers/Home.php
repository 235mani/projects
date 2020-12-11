<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\user_db;
use App\Models\hall_db;
use App\Models\booked_details;
use App\Models\reset_password;

class Home extends BaseController
{
	public function index()
	{
		$session=session();
		if ($session->get('email')!=null) {
			$data = ['search'=>''];
			return view('user_home',$data);
		}else{
			$data=['search'=>''];
			return view('home_page',$data);
		}
	}
	public function hall_details($data){
		$send['get_data']=$data;
		return view("hall_details",$send);
	}
	public function booking_page($data){
		$session=session();
		if ($session->get('email')!=null) {
			$send_book_page['get_book_data']=$data;
			return view("booking",$send_book_page);
		}else{
			$data=['search'=>''];
			return view('home_page',$data);
		}
		
	}
	public function user_profile(){
		$session=session();
		if ($session->get('email')!=null) {
			return view('user_profile');
		}else{
			$data=['search'=>''];
			return view('home_page',$data);
		}
		
	}
	public function my_orders(){
		$session=session();
		if ($session->get('email')!=null) {
			return view('my_orders');
		}else{
			$data=['search'=>''];
			return view('home_page',$data);
		}
		
	}
	public function register_validate(){
		$verify = $this->validate([
			// 'reg_name'=>'alpha_numeric_space|min_length[3]|max_length[30]',
			// 'reg_pwd'=>'min_length[5]|max_length[20]',
			// 'reg_email'=>'min_length[6]|max_length[25]|valid_email',
			// 'reg_mobile'=>'min_length[10]|max_length[10]|is_unique[user_details.mobile]|regex_match[/^[7-9]{1}[0-9]{9}$/]',
			// 'reg_address'=>'required',
			// 'reg_pincode'=>'required|min_length[6]|max_length[6]'
			'reg_confirm_pwd'=>'matches[reg_pwd]',
		]);
		if (! $verify) {
			// $this->index();
			$data=['search'=>''];
			return view('home_page',$data);
		}else{
			return $this->register();
		}

	}
	public function register()
	{
		$auth = new user_db();
		$session = session();
		if(isset($_POST['reg_submit']))
		{
			$request = \Config\Services::request();
			//$reg_name = $request->getPost("reg_name");

			$reg_mail = $request->getPost("reg_email");
			$reg_pwd = $request->getPost("reg_pwd");
			$reg_pwd_hash = password_hash($reg_pwd, PASSWORD_BCRYPT);

			// $reg_mob_cntry_code = $request->getPost("reg_num_append");
			// $reg_mob = $request->getPost("reg_mobile");
			// $reg_mob = $reg_mob_cntry_code.$reg_mob;
			// $reg_address = $request->getPost("reg_address");
			// $reg_pincode = $request->getPost("reg_pincode");
			$uni_id = md5(str_shuffle("abcdefghijklmnopqrstuvwxyz"));
			$info = array(
				"user_id" => $uni_id,
				"name" => '',
				"email" => $reg_mail,
				"password" => $reg_pwd_hash,
				"address" => '',
				"created_at" => date('Y-m-d h:i:s')
			);
			

			try
			{
					$auth->insert($info);
					if ($auth) {
						$session = session();
		            	$session->set($info);
						return redirect()->to(base_url('home'));
					}
					else{
						$session->setTempdata('fail','Registration Failed',3);
						return redirect()->to(base_url('home'));
					}

			}
			catch (\Exception $e)
			{
				$session->setTempdata('fail',$e,3);
				return redirect()->to(base_url('home'));

			}			
		}
	}	

	public function login_validate(){
		$verify = $this->validate([
			// 'login_mobile'=>'min_length[10]|max_length[10]|is_unique[user_details.mobile]|regex_match[/^[7-9]{1}[0-9]{9}$/]',
			'login_email'=>'min_length[6]|max_length[25]|valid_email',
			'login_pwd'=>'min_length[5]|max_length[20]'

		]);
		if (! $verify) {
			$data = ['search'=>''];
			return view('home_page',$data);
			// return redirect()->to(base_url('home')); 			
		}else{
			return $this->login();
		}
	}
	public function login($from=null)
	{

		$auth = new user_db();
		$session = session();
		if(isset($_POST['login_submit']))
		{
			$request = \Config\Services::request();
			$session = session();

			// $login_mob_cntry_code = $request->getPost("login_num_append");
			// $log_mob = $request->getPost("login_mobile");
			// $log_mob = $login_mob_cntry_code.$log_mob;
			$login_email = $request->getPost("login_email");
			$log_pwd = $request->getPost("login_pwd");

			try
			{
					$users= $auth->where([
						'email'=>$login_email
						])
		                ->find();

		            if ($users){
		            	$pwd_verify = password_verify($log_pwd, $users[0]['password']);
		            	if ($pwd_verify) {
		            		$data=[
			            	'name'=>$users[0]['name'],
			            	'email'=>$users[0]['email'],
			            	'address'=>$users[0]['address'],
			            	];
			            	
			            	$session->set($data);
			            	$data = ['search'=>''];
			            	if ($from!=null) {
			            		$session->setTempdata('success','Successfully Logged in',3);
			            		return redirect()->to($session->get('last_viewed_hall')); 
			            	}else{
			            		return redirect()->to(base_url('home'));
			            	}
		            	}else{
		            		if ($from!=null) {
			            		$session->setTempdata('fail','Invalid Password',3);
								return redirect()->to($session->get('last_viewed_hall'));            
							}else{
			            		$session->setTempdata('fail','Invalid Password',3);
								return redirect()->to(base_url('home'));		
		            		}
		            	}

		            	
		            }
		            else{
		            	if ($from!=null) {
		            		$session->setTempdata('fail','User not found',3);
							return redirect()->to($session->get('last_viewed_hall'));            
						}else{
		            		$session->setTempdata('fail','User not found',3);
							return redirect()->to(base_url('home'));		
	            		}
						 
		            }
			}
			catch (\Exception $e)
			{
			    $error=$e->getMessage();
				$session->setTempdata('fail',$error,3);
				return redirect()->to(base_url('home')); 
			}
		}
	}

	public function s_destroy(){
		$session = session();
		$session->destroy();
		return $this->response->redirect(base_url('Home'));
	}




	public function edit_profile_validate(){
		$verify = $this->validate([
			'name_update'=>'alpha_numeric_space|min_length[3]|max_length[30]',
			'email_update'=>'min_length[6]|max_length[25]',
			'pincode_update'=>'min_length[6]|max_length[6]',
		]);
		if (! $verify) {
			return view('user_profile');
		}else{
			return $this->edit_profile();
		}
	}
	public function edit_profile(){
		$auth = new user_db();
		if(isset($_POST['update_submit']))
		{
			$session=session();
			$request = \Config\Services::request();

			$name_update = $request->getPost("name_update");
			$email_update = $request->getPost("email_update");
			$address_update = $request->getPost("address_update");

			$update_data=[
				'name'=>$name_update,
				'address'=>$address_update
			];
		
			$res = $auth->where('email',$email_update)
				->set($update_data)
				->update();

			if ($res) {
					$session->set($update_data);
					
					$session->setTempdata('success','Successfully updated',3);
					return redirect()->to(base_url('home/user_profile'));

			}else{

				$session->setTempdata('fail','Failed to update',3);
				return redirect()->to(base_url('home/user_profile'));
			}
		}
	}

	public function change_pwd_validate(){
		$verify = $this->validate([
			//'old_pwd'=>'min_length[5]|max_length[20]',
			'new_pwd'=>'min_length[5]|max_length[20]',
			'confirm_pwd'=>'matches[new_pwd]',
		]);
		if (! $verify) {
			return view('user_profile');
		}else{
			return $this->change_pwd();
		}
	}
	public function change_pwd(){
		$auth = new user_db();
		$session=session();
		if(isset($_POST['change_pwd']))
		{
			$request = \Config\Services::request();

			$old_pwd = $request->getPost("old_pwd");
			$new_pwd = $request->getPost("new_pwd");
			
			$user_email=$session->get('email');

			$users = $auth->where(['email'=>$user_email])
						   ->find();
			if ($users) {
				$pwd_verify = password_verify($old_pwd, $users[0]['password']);
				if ($pwd_verify) {
					$new_pwd_hash = password_hash($new_pwd, PASSWORD_BCRYPT);
					$updated=$auth->where('email',$user_email)
							->set('password',$new_pwd_hash)	
							->update();
				
					if ($updated) {
		            	$session->setTempdata('success','Password Updated Successfully',3);
						return redirect()->to(base_url('home/user_profile'));
					}else{
						$session->setTempdata('fail','Failed to update',3);
						return redirect()->to(base_url('home/user_profile'));
					}
				}else{
					$session->setTempdata('fail','Please enter valid old password',3);
					return redirect()->to(base_url('home/user_profile'));
				}
			}else{
				$session->setTempdata('fail','User not found',3);
				return redirect()->to(base_url('home/user_profile'));
			}		

		}	
				
	}

	public function search(){
				$session = session();
				if (isset($_POST['search_submit'])) {
					$session->setTempdata('search',$this->request->getVar('search'),3);
					return redirect()->to(base_url('home'));
				}				
	}
	public function function_hall(){
		$session=session();
		$data=[
				'search'=> 'function',
			];
		if ($session->get('email')!=null) {
			return view('user_home',$data);
		}else{
			return view('home_page',$data);
		}
	}

	public function convention_hall(){
		$session=session();
		$data=[
				'search'=> 'convention',
			];
		if ($session->get('email')!=null) {
			return view('user_home',$data);
		}else{
			return view('home_page',$data);
		}
	}	

	public function party_room(){
		$session=session();
		$data=[
				'search'=> 'partyroom',
			];
		if ($session->get('email')!=null) {
			return view('user_home',$data);
		}else{
			return view('home_page',$data);
		}
	}		
	public function recovery($user_id=null){
		$data = [];
		if (!empty($user_id)) {
			$data['user_id']=$user_id;
			$auth = new reset_password();
			$fetch_details= $auth->where(['user_id'=>$user_id])
		                 ->find();
		    if ($fetch_details) {
		    	$updated_at = $fetch_details[0]['link_date_time'];
		    	$updated_at = strtotime($updated_at);
		    	$current_time = date('Y-m-d h:i:s');
		    	$current_time = strtotime($current_time);
		    	$time_diff = ($current_time - $updated_at);
		    	if ($time_diff > 300) {
		    		$data['error'] = "Sorry! link was expired";
		    	}
		    }else{
		    	$data['error']="Unable to find user account";
		    }

		}else{
			$data['error']="Sorry! Unauthorized access";
		}
		return view('forgot_password',$data);
	}
	public function verify_recovery(){
		$auth = new user_db();
		$reset_password = new reset_password();
		$session = session();
        $request = \Config\Services::request();
        
        $user_id = $request->getPost("user_id");

        $new_password_field = $request->getPost("new_password_field");
        $confirm_password_field = $request->getPost("confirm_password_field");

        if ($new_password_field!=$confirm_password_field) {
        	$fail=[
                    'fail'=> 'PASSWORD NOT MATCH',
                    'user_id' => $user_id
                    ];
            return view('forgot_password',$fail);
        }      
        $users = $auth->where(['user_id'=>$user_id])
                       ->find();    
        if ($users) {
        	$confirm_password_field_hash = password_hash($confirm_password_field, PASSWORD_BCRYPT);
			$updated=$auth->where('user_id',$user_id)
						->set('password',$confirm_password_field_hash)	
						->update();
			
			if ($updated) {
				$query = $reset_password->where(['user_id' => $user_id])
										->delete();
				if ($query) {
					$session->setTempdata('success','Password Changed Successfully',3);
					return redirect()->to(base_url('home'));
				}else{
					$fail=[
                    'fail_msg'=> 'PASSWORD NOT UPDATED , CLOSE AND TRY AGAIN',
                    'user_id'=>$user_id
                    ];
            		return view('forgot_password',$fail);
				}
            	
			}else{
				$fail=[
                    'fail_msg'=> 'PASSWORD NOT UPDATED , CLOSE AND TRY AGAIN',
                    'user_id'=>$user_id
                    ];
            	return view('forgot_password',$fail);
			}
		}
	}

	public function ratting(){
		return view("ratting");
	}
	public function rating_values(){
		$auth = new hall_db();
		$rating = $_POST['rating'];
		$hall_id = $_POST['hall_id'];

		$users= $auth->where([
						'id'=>$hall_id
						])
		                ->find();
		if ($users) {
			$db_rating = $users[0]['rating'];

			$db_rating = ($db_rating+$rating)/2;
			$db_rating = bcdiv($db_rating, 1,1);
			$update_data=[
					'rating'=>$db_rating
				];
			$res = $auth->where('id',$hall_id)
				->set($update_data)
				->update();
		}
		
	}
	public function calender(){
		return view("calender");
	}
	public function success_page(){
		return view("success_page");
	}
	public function check_availability(){
		$auth = new booked_details();		
		$input_date = $_POST['check_availability_date'];

		$date_availability_result = $auth->where(['date_of_book'=>$input_date])
					   ->find();
		if ($date_availability_result){
			$data["fail"] ="Unavailable"; 
		}else{
			$data["success"] ="Available"; 
		}
		echo json_encode($data);
	}
	public function booking_check_date(){
		$auth = new booked_details();	
		$input_date = $_POST['start_date_input'];
		$date_availability_result = $auth->where(['date_of_book'=>$input_date])
					   ->find();
		if ($date_availability_result){
			
			$data["fail"] ="Unavailable"; 
		}else{
			$data["success"] ="Available"; 
		}
		echo json_encode($data);
	}	
	public function msg(){
		return view("msg");
	}
}
// $msg = 'Files has been uploaded';
// return redirect()->to( base_url('home') )->with('msg', $msg);