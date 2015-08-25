@extends('user')
@section('page-content')
    <div id="center">
        <h1>Ingresa tu nombre de usuario para que te enviemos un mail</h1><br>
        <form action="{{ URL::to('nueva_clave') }}" method="POST" class="form-estilizado">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" name="usuario" placeholder="Ingrese su usuario">
            <input type="submit" value="Enviar">
        </form>
    </div>
@stop