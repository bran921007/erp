<?php

class Cliente extends \Eloquent {
	protected $table = 'clientes';
	protected $fillable = ['id','nombre','apellido','email','telefono','direccion','cedula','created_at','updated_at'];

}
