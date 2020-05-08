@extends('adminlte::page')

@section('title', 'Cadastrar Nova Categoria')

@section('content_header')
<div class="card-header">
    <div class="card-tools">
        <nav aria-label="breadcrumb" class="ml-auto">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Utilizadores</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
            </ol>
        </nav>
    </div>

    <h1 class="m-0 text-dark">
        Cadastrar Nova Categoria
    </h1>

</div>

@stop

@section('content')

        <div class="card">

            <div class="card-body">
                
                {{ Form::open(['route'=>'categories.store'],['class' => 'form']) }}

                @include('admin.pages.categories._Partials.form')

                {{ Form::close() }}
            </div>

        </div>

@stop