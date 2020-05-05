@extends('adminlte::page')

@section('title', "Detalhes do detalhe {$detail->name}")

@section('content_header')
<div class="card-header">
    <div class="card-tools">
        <nav aria-label="breadcrumb" class="ml-auto">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Plano</a></li>
                <li class="breadcrumb-item"><a href="{{route('plans.show', $plan->url)}}">{{$plan->name}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('details.plan.index', $plan->url)}}">Detalhes</a></li>
                <li class="breadcrumb-item active" aria-current="page">ver</li>
            </ol>
        </nav>
    </div>

    <h1 class="m-0 text-dark">
        Detalhes do detalhe <b>{{$detail->name}}</b>
    </h1>

</div>

@include('includes.alerts')

@stop

@section('content')


<div class="card">

    <div class="card-body">

        <ul>
            <li>
                <strong>Nome: </strong> {{ $detail->name}}
            </li>
        </ul>

        <hr>

        <div class="card-footer">
            {{ Form::open(['route'=>['details.plan.destroy', $plan->url, $detail->id], 'method'=>'DELETE']) }}

            {{ Form::submit('Eliminar', ['class' => 'btn btn-danger']) }}

            {{ Form::close() }}
        </div>
    </div>

</div>

@stop