<?php namespace App\Models;

use CodeIgniter\Model;

class hall_db extends Model
{
		// db_name = id12691742_ua_name
		// db_uname = id12691742_ua_uname
		// pwd = Key2stepup@2020
        protected $table = 'hall_details';
        protected $primarykey = 'id';
        protected $returnType = 'array';
        protected $allowedFields =['title','coolant','food_type','full_address','parking','hall_capacity','location','rating','rent','image','veg_price','non_veg_price','hall_type'];
        //13 fields
}