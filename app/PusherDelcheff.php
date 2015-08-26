<?php
namespace App;
use Pusher;
class PusherDelcheff{
    protected $app_id;
    protected $app_key;
    protected $app_secret;
    protected $pusher;

    public function __construct(){
        $this->app_id = '137619';
        $this->app_key = '35aa4c752e4b1fa7475f';
        $this->app_secret = '8449b1840cb57014c13d';
        $this->pusher = new Pusher($this->app_key, $this->app_secret, $this->app_id, array('encrypted' => true));
    }

    public function enviarSocket($channels, $event, array $data){
        $this->pusher->trigger($channels, $event, $data);
        return true;
    }
}