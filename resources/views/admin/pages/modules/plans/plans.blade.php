@extends('adminlte::page')

@section('title', "Planos do {$module->name}")

@section('content_header')

<div class="card-header">
    <div class="card-tools">
        <nav aria-label="breadcrumb" class="ml-auto">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('modules.index')}}">Módulos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Permissões</li>
            </ol>
        </nav>
    </div>

    <h1 class="m-0 text-dark">
        Planos do <b>{{$module->name}}</b>
    </h1>

</div>

@stop

@section('content')

<div class="card">
    <div class="card-header">
        
    @include('includes.alerts')


    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
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
                        {{$plan->Description}}
                    </td>
                    <td>
                        <a href="{{ route('plans.modules.detach', [$plan->id, $module->id]) }}" class="btn btn-danger btn-sm"><i class="far fa-window-close"> Desvincular</i></a>
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