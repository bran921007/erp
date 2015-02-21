<?php

class Categoria extends \Eloquent {
	protected $table = 'categorias';
	protected $fillable = ['id','titulo','descripcion','created_at','updated_at'];
}