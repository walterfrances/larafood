@extends('adminlte::page')

@section('title', "Detalhes do Módulo: : { $module->name }")

@section('content_header')
<div class="card-header">
    <div class="card-tools">
        <nav aria-label="breadcrumb" class="ml-auto">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('modules.index')}}">Módulos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalhes</li>
            </ol>
        </nav>
    </div>

    <h1 class="m-0 text-dark">
        Detalhes : <b>{{ $module->name }}</b>
    </h1>

</div>

@stop

@section('content')

<div class="card">

    <div class="card-body">

        <ul>
            <li><strong>Nome: </strong>{{$module->name}}</li>
        </ul>
        <ul>
            <li><strong>Descrição: </strong>{{$module->description}}</li>
        </ul>

        <hr>

        {{ Form::open(['route'=>['modules.destroy', $module->id], 'method'=>'DELETE']) }}

        {{ Form::submit('Eliminar', ['class' => 'btn btn-danger']) }}

        {{ Form::close() }}
    </div>

</div>

@stop