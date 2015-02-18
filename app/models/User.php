<?php 

class User extends Eloquent {

	protected $table = 'users';
	protected $fillable = ['id','nombre','apellido','empresa','email','password','website','cuenta_bancaria','rnc','direccion','api_key','estado','created_at','updated_at'];


}
