@extends('adminlte::page')

@section('title', "Detalhes do Plano:  {$plan->name}")

@section('content_header')

<div class="card-header">
    <div class="card-tools">
        <nav aria-label="breadcrumb" class="ml-auto">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Plano</a></li>
                <li class="breadcrumb-item"><a href="{{route('plans.show', $plan->url)}}">{{$plan->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalhes</li>
            </ol>
        </nav>
    </div>

    <h1 class="m-0 text-dark">
        <span>
            <a href="{{ route('details.plan.create', $plan->url) }}" class="text-dark">
                <i class="fas fa-plus fa-1x" aria-hidden="true"></i>
            </a>
        </span>
        Detalhes do Plano:  {{$plan->name}}
    </h1>

</div>

@include('includes.alerts')

@stop

@section('content')

<div class="card">

    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th width="150">Acções</th>
                </tr>
            </thead>
            <tbody>
                @foreach($details as $detail)
                <tr>
                    <td>
                        {{$detail->name}}
                    </td>
                    <td>
                        <a href="{{ route('details.plan.edit', [$plan->url, $detail->id]) }}" class="btn btn-info btn-sm"><i class="fa fa-edit" ></i></a>
                        <a href="{{ route('details.plan.show', [$plan->url, $detail->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-eye" ></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <div class="card-footer">
        @if(isset($filters))
        {{ $details->appends($filters)->links() }}
        @else
        {{ $details->links() }}
        @endif

        
    </div>

</div>



@stop