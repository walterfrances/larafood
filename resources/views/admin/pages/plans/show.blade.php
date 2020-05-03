@extends('adminlte::page')

@section('title', 'Detalhes do Plano: <b>{{ $plan->name }}</b>')

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
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
                    <p><strong>Nome: </strong>{{$plan->name}}</p>
                    <p><strong>URL: </strong>{{$plan->url}}</p>
                    <p><strong>Preço: </strong>{{number_format($plan->price, 2, ',', '.')}}</p>
                    <p><strong>Descrição: </strong>{{$plan->Description}}</p>

                    <hr>

                    {{ Form::open(['route'=>['plans.destroy', $plan->url], 'method'=>'DELETE']) }}

                    {{ Form::submit('Eliminar', ['class' => 'btn btn-danger']) }}

                    {{ Form::close() }}
            
                </div>
            </div>
        </div>
    </div>
@stop