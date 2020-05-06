@extends('adminlte::page')

@section('title', "Editar Módulo: : { $module->name }")

@section('content_header')
<div class="card-header">
    <div class="card-tools">
        <nav aria-label="breadcrumb" class="ml-auto">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('modules.index')}}">Módulos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
        </nav>
    </div>

    <h1 class="m-0 text-dark">
        Editar : <b>{{ $module->name }}</b>
    </h1>

</div>

@stop

@section('content')

<div class="card">

    <div class="card-body">

        {{ Form::model($module, ['route' =>['modules.update', $module->id], 'method'=>'PUT', 'class' => 'form'])}}

        @include('admin.pages.modules._Partials.form')

        {{ Form::close() }}
    </div>

</div>

@stop