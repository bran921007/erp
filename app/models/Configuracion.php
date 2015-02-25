<?php

class Configuracion extends \Eloquent {
	protected $table = 'configuraciones';
	protected $fillable = ['id','id_user', 'empresa', 'rnc', 'telefono', 'direccion', 'ciudad', 'paises'];

	protected $primaryKey  = "id_user";
}
