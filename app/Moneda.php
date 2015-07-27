<?php namespace App;

class Moneda{
	public static function guaranies($cantidad){
		$precio = 'Gs. ';
		$precio .= (string)number_format($cantidad, 0, '', '.');
		return $precio;
	}
}