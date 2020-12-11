<?php namespace App\Models;

use CodeIgniter\Model;

class user_db extends Model
{
		// pwd = Key2stepup@2020
		
        protected $table = 'user_details';
        protected $primarykey = 'email';
        protected $returnType = 'array';
        protected $allowedFields = ['user_id','name','email','password','address','created_at'];

        // public function tryModel(){
        // 	return "mani";
        // }

}