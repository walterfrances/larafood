@extends('adminlte::page')

@section('title', "Adicionar novo detalhe ao {$plan->name}")

@section('content_header')
<div class="card-header">
    <div class="card-tools">
        <nav aria-label="breadcrumb" class="ml-auto">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Plano</a></li>
                <li class="breadcrumb-item"><a href="{{route('plans.show', $plan->url)}}">{{$plan->name}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('details.plan.index', $plan->url)}}">Detalhes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Novo</li>
            </ol>
        </nav>
    </div>

    <h1 class="m-0 text-dark">
        Adicionar novo detalhe ao {{$plan->name}}
    </h1>

</div>

@stop

@section('content')


<div class="card">

    <div class="card-body">

        {{ Form::open(['route' => ['details.plan.store', $plan->url]], ['class' => 'form' , 'method' => 'post']) }}

        @include('admin.pages.plans.details._Partials.form')

        {{ Form::close() }}
    </div>

</div>

@stop