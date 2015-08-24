<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Puntuacion;
use App\Ranking;
use Illuminate\Http\Response;
use Input;
use Illuminate\Http\Request;

class RestPuntuacion extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$empresa_codigo = Input::query('empresa_codigo');
		//$cliente_codigo = Input::query('cliente_codigo');
		return Puntuacion::join('ranking', 'ranking.codigo', '=', 'puntuacion.ranking_codigo')
			->where('ranking.empresa_codigo', '=', $empresa_codigo)
			//->where('puntuacion.cliente_codigo', '=', $cliente_codigo)
			->get();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$datos = Input::all();
		$ranking = Ranking::where('empresa_codigo', '=', $datos['empresa_codigo'])->first();
		if(is_null($ranking)){
			$ranking = new Ranking;
			$ranking->cont_click = 0;
			$ranking->empresa_codigo = $datos['empresa_codigo'];
		} else {
			$puntuacion = Puntuacion::where('ranking_codigo', '=', $ranking->codigo)
				->where('cliente_codigo', '=', $datos['cliente_codigo'])
				->first();
			if(!is_null($puntuacion)){
				$ranking->cont_click = $ranking->cont_click - 1;
				$ranking->total_puntos = $ranking->total_puntos - $puntuacion->puntaje;
			}
		}
		$ranking->cont_click = $ranking->cont_click + 1;
		$ranking->total_puntos = $ranking->total_puntos + $datos['puntaje'];
		$ranking->rating = ($ranking->total_puntos / ($ranking->cont_click * 5)) * 5;
		$ranking->save();
		if(!isset($puntuacion)) {
			$puntuacion = new Puntuacion;
		}
		$puntuacion->cliente_codigo = $datos['cliente_codigo'];
		$puntuacion->puntaje = $datos['puntaje'];
		$puntuacion->comentario = $datos['comentario'];
		$puntuacion->ranking_codigo = $ranking->codigo;
		$puntuacion->save();
		return new Response(null, 200);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
