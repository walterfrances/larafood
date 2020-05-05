@extends('adminlte::page')

@section('title', "Detalhes do Plano: { $plan->name }")

@section('content_header')

<div class="card-header">
    <div class="card-tools">
        <nav aria-label="breadcrumb" class="ml-auto">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalhes</li>
            </ol>
        </nav>
    </div>

    <h1 class="m-0 text-dark">
        Planos: <b>{{ $plan->name }}</b>
    </h1>

</div>

@include('includes.alerts')

@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <ul><li><strong>Nome: </strong>{{$plan->name}}</li></ul>
                <ul><li><strong>URL: </strong>{{$plan->url}}</li></ul>
                <ul><li><strong>Preço: </strong>{{number_format($plan->price, 2, ',', '.')}}</li></ul>
                <ul><li><strong>Descrição: </strong>{{$plan->Description}}</li></ul>

                <hr>

                {{ Form::open(['route'=>['plans.destroy', $plan->url], 'method'=>'DELETE']) }}

                {{ Form::submit('Eliminar', ['class' => 'btn btn-danger']) }}

                {{ Form::close() }}

            </div>
        </div>
    </div>
</div>
@stop