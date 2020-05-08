@extends('adminlte::page')

@section('title', "Editar Categoria: $category->name")

@section('content_header')
<div class="card-header">
    <div class="card-tools">
        <nav aria-label="breadcrumb" class="ml-auto">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categoriaes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
        </nav>
    </div>

    <h1 class="m-0 text-dark">
        Utilizador : <b>{{ $category->name }}</b>
    </h1>

</div>

@stop

@section('content')

<div class="card">

    <div class="card-body">

        {{ Form::model($category, ['route' =>['categories.update', $category->id], 'method'=>'PUT', 'class' => 'form'])}}

        @include('admin.pages.categories._Partials.form')

        {{ Form::close() }}
    </div>

</div>

@stop