<?php namespace App\Http\Middleware;

use Closure;
use Redirect;
use Session;

class CarritoChecker {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

		if((count(Session::get('carrito.items')) == 0) || (Session::get('carrito.direccion') == 0)){
			return Redirect::to('carrito');
		}

		return $next($request);
	}

}
