<?php

class Distribuidor extends \Eloquent {
	protected $table = 'distribuidores';
	protected $fillable = ['id','nombre','empresa','email','password','direccion','cedula','rnc','telefono','unidades','total_pagado','estado','fecha','created_at','updated_at'];
}
