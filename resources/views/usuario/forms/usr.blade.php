<div class="form-group">
    {!!Form::label('Nombre:')!!}
    {!!Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Ingrese su nombre'])  !!}
</div>
<div class="form-group">
    {!! Form::label('Email:') !!}
    {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingrese su email']) !!}
</div>
<div class="form-group">
    {!! Form::label('Password') !!}
    {!! Form::password('password',['class'=>'form-control','placeholder'=>'Ingrese su password']) !!}
</div>
<div class="form-group">
    <label class="label_radio r_off" for="radio-01">
        {!! Form::radio('activo', '1', true) !!}Administrador
    </label>
    <label class="label_radio r_off" for="radio-01">
        {!! Form::radio('activo', '0') !!}Operador
    </label>

</div>