
@include('includes.alerts')

{{Form::label('name', 'Nome', ['class' => 'awesome'])}}
{{ Form::text('name', null, ['class' => 'form-control form-group' , 'placeholder' => 'Nome']) }}

{{Form::label('email', 'E-mail', ['class' => 'awesome'])}}
{{ Form::email('email',null, ['class' => 'form-control form-group', 'placeholder' => 'E-mail']) }}

{{Form::label('password', 'Senha', ['class' => 'awesome'])}}
{{ Form::password('password', ['class' => 'form-control form-group', 'placeholder' => 'Senha']) }}

{{ Form::submit('Gravar', ['class' => 'btn btn-success']) }}

