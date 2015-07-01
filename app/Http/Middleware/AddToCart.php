<?php namespace App\Http\Middleware;

use Closure;
use Session;
use App\Pedido;

class AddToCart {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		Session::forget('carrito');
		return $next($request);
	}

}
