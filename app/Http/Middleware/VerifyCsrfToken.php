<?php namespace App\Http\Middleware;

use Closure;
use Redirect;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		/*if($request->method() == 'POST'){
			return $next($request);
		}*/

		return $next($request);

		return parent::handle($request, $next);
	}

}
