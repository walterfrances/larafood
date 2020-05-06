@extends('adminlte::page')

@section('title', 'Cadastrar Novo Módulo')

@section('content_header')
<div class="card-header">
    <div class="card-tools">
        <nav aria-label="breadcrumb" class="ml-auto">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('modules.index')}}">Módulos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
            </ol>
        </nav>
    </div>

    <h1 class="m-0 text-dark">
        Cadastrar Novo Módulo
    </h1>

</div>

@stop

@section('content')

        <div class="card">

            <div class="card-body">
                
                {{ Form::open(['route'=>'modules.store'],['class' => 'form']) }}

                @include('admin.pages.modules._Partials.form')

                {{ Form::close() }}
            </div>

        </div>

@stop