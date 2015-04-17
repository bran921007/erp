<?php

class DistribuidorCompra extends \Eloquent {
	protected $table = 'distribuidores_compras';
	protected $fillable = ['id','id_articulo','id_distribuidor','cantidad','articulo','precioCompra','total','fecha','created_at','updated_at'];

	public function producto(){
		return $this->belongsTo('Producto','id_articulo','id');

	}

	public function distribuidor(){
		return $this->belongsTo('Distribuidor','id_articulo','id');
	}


}
