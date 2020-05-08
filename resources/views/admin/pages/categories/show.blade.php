@extends('adminlte::page')

@section('title', "Detalhes da Categoria: $category->name")

@section('content_header')

<div class="card-header">
    <div class="card-tools">
        <nav aria-label="breadcrumb" class="ml-auto">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorias</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalhes</li>
            </ol>
        </nav>
    </div>

    <h1 class="m-0 text-dark">
        Categoria: <b>{{ $category->name }}</b>
    </h1>

</div>

@include('includes.alerts')

@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                
                <ul><li><strong>Empresa: </strong>{{$category->tenant->name}}</li></ul>
                <ul><li><strong>Nome: </strong>{{$category->name}}</li></ul>
                <ul><li><strong>E-mail: </strong>{{$category->email}}</li></ul>

                <hr>

                {{ Form::open(['route'=>['categories.destroy', $category->id], 'method'=>'DELETE']) }}

                {{ Form::submit('Eliminar', ['class' => 'btn btn-danger']) }}

                {{ Form::close() }}

            </div>
        </div>
    </div>
</div>
@stop