<?php

class Configuracion extends \Eloquent {
	protected $fillable = ['id','id_user', 'empresa', 'rnc', 'telefono', 'direccion', 'ciudad', 'paises'];
}
