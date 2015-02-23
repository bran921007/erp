<?php

class Detalle extends \Eloquent {
	protected $table = 'pedidosdetalles';
	protected $fillable = ['id','id_pedido','id_producto','articulo','cantidad','total','precio','fecha','created_at','updated_at'];
}
