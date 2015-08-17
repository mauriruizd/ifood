<?php namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;

class Admin {
	protected $auth;
	public function __construct(){
		$this->auth =$auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if($this->auth->user()->codigo !=1){
			Session::flash('mensage-error', 'Sin Privilegios');
			return redirect()->to('/login');
		}
		return $next($request);
	}

}
