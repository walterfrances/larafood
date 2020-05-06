
@include('includes.alerts')

{{Form::label('name', 'Nome', ['class' => 'awesome'])}}
{{ Form::text('name', null, ['class' => 'form-control form-group' , 'placeholder' => 'Nome']) }}

{{Form::label('price', 'Preço', ['class' => 'awesome'])}}
{{ Form::number('price', null, ['pattern'=>'[0-9]+([,\.][0-9]+)?', 'min' => '0.00', 'step' => 'any', 'class' => 'form-group form-control', 'placeholder' => 'Preço']) }}

{{Form::label('Description', 'Descrição', ['class' => 'awesome'])}}
{{ Form::text('Description',null, ['class' => 'form-control form-group', 'placeholder' => 'Descrição']) }}

{{ Form::submit('Gravar', ['class' => 'btn btn-success']) }}

