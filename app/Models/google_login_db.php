<?php namespace App\Models;

use CodeIgniter\Model;

class google_login_db extends Model
{
        protected $table = 'google_login';
        protected $primarykey = 'id';
        protected $returnType = 'array';
        protected $allowedFields =['oauth_id','email','first_name','last_name','profile_pic','created_at','updated_at'];
        //8 fields
        $auth = new google_login_db();
        public function update_user($data,$id){
        	$updated=$auth->where('oauth_id',$id)
						->update($data);
			if ($updated) {
				return true;
			}else{
				return false;
			}
        }
        public function create_user($data){
        	$auth->insert($data);
        	if ($auth) {
        		return true;
        	}else{
        		return false;
        	}
        }
}