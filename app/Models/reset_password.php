<?php namespace App\Models;

use CodeIgniter\Model;

class reset_password extends Model
{
		// pwd = Key2stepup@2020
		
        protected $table = 'reset_password';
        protected $primarykey = 'id';
        protected $returnType = 'array';
        protected $allowedFields = ['user_id','link_date_time'];

}