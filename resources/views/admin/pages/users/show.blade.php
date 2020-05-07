@extends('adminlte::page')

@section('title', "Detalhes do Utilizador: $user->name")

@section('content_header')

<div class="card-header">
    <div class="card-tools">
        <nav aria-label="breadcrumb" class="ml-auto">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('users.index')}}">Utilizadores</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalhes</li>
            </ol>
        </nav>
    </div>

    <h1 class="m-0 text-dark">
        Utilizadors: <b>{{ $user->name }}</b>
    </h1>

</div>

@include('includes.alerts')

@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                
                <ul><li><strong>Empresa: </strong>{{$user->tenant->name}}</li></ul>
                <ul><li><strong>Nome: </strong>{{$user->name}}</li></ul>
                <ul><li><strong>E-mail: </strong>{{$user->email}}</li></ul>

                <hr>

                {{ Form::open(['route'=>['users.destroy', $user->id], 'method'=>'DELETE']) }}

                {{ Form::submit('Eliminar', ['class' => 'btn btn-danger']) }}

                {{ Form::close() }}

            </div>
        </div>
    </div>
</div>
@stop