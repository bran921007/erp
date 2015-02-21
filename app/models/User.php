<?php 

class User extends Eloquent {

	protected $table = 'users';
	protected $fillable = ['id','nombre','apellido','email','password','direccion','cedula','nivel','estado','created_at','updated_at'];


}
