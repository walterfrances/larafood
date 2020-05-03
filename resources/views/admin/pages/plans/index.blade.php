@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')

<div class="card-header">
    <div class="card-tools">
        <nav aria-label="breadcrumb" class="ml-auto">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Planos</li>
            </ol>
        </nav>
    </div>

    <h1 class="m-0 text-dark">
        <span>
            <a href="{{ route('plans.create') }}" class="text-dark">
                <i class="fas fa-plus fa-1x" aria-hidden="true"></i>
            </a>
        </span>
        Planos
    </h1>

</div>

@stop

@section('content')

<div class="card">
    <div class="card-header">
    @include('includes.alerts')
        {{ Form::open(['route'=>'plans.search'],['class' => 'form form-inline']) }}
        <div class="input-group col-3">

            {{ Form::text('filter', null , ['class' => 'form-control', 'placeholder' => 'Nome']) }}

            <div class="input-group-append">
                {{ Form::button('<i class="fa fa-search"></i>', ['type' => 'submit', 'class' => 'btn btn-success btn-sm'] )  }}
            </div>
            {{ Form::close() }}

        </div>

        @if(isset($filters))
        <a href="{{ route('plans.index') }}">(X) Limpar os filtros</a>
        @endif
    </div>

    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preços</th>
                    <th width="150">Acções</th>
                </tr>
            </thead>
            <tbody>
                @foreach($plans as $plan)
                <tr>
                    <td>
                        {{$plan->name}}
                    </td>
                    <td>
                        {{ number_format($plan->price, 2, ',', '.')}}
                    </td>
                    <td>
                        <a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-info btn-sm"><i class="fa fa-edit" ></i></a>
                        <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-warning btn-sm"><i class="fa fa-eye" ></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <div class="card-footer">
        @if(isset($filters))
        {{ $plans->appends($filters)->links() }}
        @else
        {{ $plans->links() }}
        @endif

        
    </div>

</div>



@stop