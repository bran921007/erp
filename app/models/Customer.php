<?php

class Customer extends \Eloquent {
	protected $table = 'customers';
	protected $fillable = ['id','id_user','id_website','email','full_name','address','city','phone','identification','date','created_at','updated_at'];

}
