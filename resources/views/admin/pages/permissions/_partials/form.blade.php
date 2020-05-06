
@include('includes.alerts')

{{Form::label('name', '* Nome', ['class' => 'awesome'])}}
{{ Form::text('name', null, ['class' => 'form-control form-group' , 'placeholder' => 'Nome']) }}

{{Form::label('description', 'Descrição', ['class' => 'awesome'])}}
{{ Form::text('description',null, ['class' => 'form-control form-group', 'placeholder' => 'Descrição']) }}

{{ Form::submit('Gravar', ['class' => 'btn btn-success']) }}

