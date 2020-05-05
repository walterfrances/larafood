
@include('includes.alerts')

{{Form::label('name', 'Nome', ['class' => 'awesome'])}}
{{ Form::text('name', null, ['class' => 'form-control form-group' , 'placeholder' => 'Nome']) }}


{{ Form::submit('Gravar', ['class' => 'btn btn-success']) }}

