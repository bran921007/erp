<?php

class Pedido extends \Eloquent {
	protected $table = 'pedidos';
	protected $fillable = ['id','id_cliente','metodo','subtotal','itbis','total','estado','tipo','fecha','created_at','updated_at'];
}
