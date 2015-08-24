<?php namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Psr7\Response;
use Session;

class RestLoginChecker {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if(!Session::has('hungry_user')){
			return new Response(null, 401);
		}
		return $next($request);
	}

}
