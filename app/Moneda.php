<?php namespace App;

class Moneda{
	public static function guaranies($cantidad, $numeral=false){
		$numero = number_format($cantidad, 0, '', '.');
		if($numeral){
			return $numero;
		}
		$precio = 'Gs. ';
		$precio .= (string)$numero;
		return $precio;
	}
}