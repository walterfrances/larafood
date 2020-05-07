@extends('adminlte::page')

@section('title', "Editar Utilizador: $user->name")

@section('content_header')
<div class="card-header">
    <div class="card-tools">
        <nav aria-label="breadcrumb" class="ml-auto">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('users.index')}}">Utilizadores</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
        </nav>
    </div>

    <h1 class="m-0 text-dark">
        Utilizador : <b>{{ $user->name }}</b>
    </h1>

</div>

@stop

@section('content')

<div class="card">

    <div class="card-body">

        {{ Form::model($user, ['route' =>['users.update', $user->id], 'method'=>'PUT', 'class' => 'form'])}}

        @include('admin.pages.users._Partials.form')

        {{ Form::close() }}
    </div>

</div>

@stop