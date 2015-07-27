<?php namespace App\Http\Middleware;

use Closure;

class LoginChecker {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

		if(!\Session::has('hungry_user')){
			return \Redirect::to('/');
		}

		return $next($request);
	}

}
