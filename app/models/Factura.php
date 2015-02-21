<?php

class Factura extends \Eloquent {
	protected $table = 'facturas';
	protected $fillable = ['id','producto_id','articulo','cantidad','precio_unidad','precio_total','subtotal','descuento','ITBIS','total','created_at','updated_at'];
}

