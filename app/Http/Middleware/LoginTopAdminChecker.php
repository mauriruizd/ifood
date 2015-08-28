<?php namespace App\Http\Middleware;

use Closure;

class LoginTopAdminChecker {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

		if(!\Session::has('topadmin_user')){
			return \Redirect::to('/adm/login');
		}

		return $next($request);
	}

}
