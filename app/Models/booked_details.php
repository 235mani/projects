<?php namespace App\Models;

use CodeIgniter\Model;

class booked_details extends Model
{
		//id12829917_u_proj_x <-uname
		//id12829917_proj_x <-db name
		//Key_2_stepup<-pwd
		//id12829917_bc <- db name
        protected $table = 'booked_details';
        protected $primarykey = 'id';
        protected $returnType = 'array';
        protected $allowedFields =['id','title','rent','full_address','date_of_book','time_of_book','customer_name',];
        //7 fields
}