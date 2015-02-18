<?php

class Transaccion extends \Eloquent {
	protected $table = 'transacciones';
	protected $fillable = ['id','amount_received','amount_total','amount_dollar','rate_currency','description','statement_description','full_name','address','phone','date'];
}
