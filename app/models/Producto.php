<?php

class Producto extends \Eloquent {
	protected $table = 'productos';
	protected $fillable = ['id',"articulo","cantidad","distribuidor","precioVenta","precioCompra","vencimiento","categoria","fecha","tiempo",'created_at','updated_at'];
}
