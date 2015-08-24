<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Ranking;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Input;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class RestRanking extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$empresa_codigo = Input::get('empresa_codigo');
		return Ranking::where('empresa_codigo', '=', $empresa_codigo)->first();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($empresa_codigo)
	{
		//return Ranking::where('empresa_codigo', '=', $empresa_codigo)->first();
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//$ranking = Ranking::find($id);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
