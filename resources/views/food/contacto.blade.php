@extends('user')
@section('page-content')
    <form action="{{ URL::to('envio_formulario') }}" method="POST" class="form-estilizado">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="asunto" placeholder="Asunto">
        <textarea name="mensaje" placeholder="Mensaje"></textarea>
        <input type="submit" value="Enviar">
    </form>
@stop