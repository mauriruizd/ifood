<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use Session;

use App\DireccionCliente;
use App\PusherDelcheff;

class EnviarSocket extends Command implements SelfHandling, ShouldBeQueued {

	use InteractsWithQueue, SerializesModels;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */

	protected $datos;
	protected $pusher;

	public function __construct(array $datos)
	{
		$this->datos = $datos;
		$this->pusher = new PusherDelcheff();
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		$direccion = DireccionCliente::select('latitud', 'longitud', 'direccion')
			->find($this->datos['direccion_id']);

		$this->datos['longitud'] = $direccion->longitud;
		$this->datos['latitud'] = $direccion->latitud;
		$this->datos['direccion'] = $direccion->direccion;

		$socket_empresa = $this->datos['empresa'];
		unset($this->datos['empresa']);
		unset($this->datos['direccion_id']);
		unset($this->datos['user_id']);

		$this->datos['nombre_usuario'] = Session::get('hungry_user')->nombres;
		$this->datos['celular'] = Session::get('hungry_user')->celular;

		$this->pusher->enviarSocket($socket_empresa, 'nuevos_pedidos', $this->datos);

	}

}
