<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use Session;

use App\DireccionCliente;

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
		$this->pusher = new \PusherDelcheff();
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		$direccion = DireccionCliente::select('latitud', 'longitud')
			->find($this->datos['direccion_id']);

		$this->datos['longitud'] = $direccion->longitud;
		$this->datos['latitud'] = $direccion->latitud;

		$this->datos['nombre_usuario'] = Session::get('hungry_user')->nombres;
		$this->datos['celular'] = Session::get('hungry_user')->celular;

		/*$context = new \ZMQContext();
		$socket = $context->getSocket(\ZMQ::SOCKET_PUSH, 'pusher');
		$socket->connect("tcp://127.0.0.1:3000");
		$socket->send(json_encode($this->datos));*/

		$this->pusher->trigger($this->datos['empresa'], 'nuevos_pedidos', $this->datos);

	}

}
