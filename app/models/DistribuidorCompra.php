<?php

class DistribuidorCompra extends \Eloquent {
	protected $table = 'distribuidorescompras';
	protected $fillable = ['id','id_producto','cantidad','articulo','precioCompra','total','fecha','created_at','updated_at'];
}
