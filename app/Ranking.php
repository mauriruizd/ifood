<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Ranking extends Model {

    protected $table = 'ranking';
    protected $primaryKey ='codigo';

    public $timestamps = false;

}
