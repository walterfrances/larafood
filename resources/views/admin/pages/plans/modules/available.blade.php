@extends('adminlte::page')

@section('title', "M+odulos disponíveis para o {$plan->name}")

@section('content_header')

<div class="card-header">
    <div class="card-tools">
        <nav aria-label="breadcrumb" class="ml-auto">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
                <li class="breadcrumb-item"><a href="{{route('plans.modules', $plan->id)}}">Módulos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Disponíveis</li>
            </ol>
        </nav>
    </div>

    <h1 class="m-0 text-dark">
        Módulos disponíveis para o <b>{{$plan->name}}</b>
    </h1>

</div>

@stop

@section('content')

<div class="card">
    <div class="card-header">

    @include('includes.alerts')
        
        {{ Form::open(['route'=>['plans.modules.available', $plan->id],'class' => 'form form-inline']) }}
        <div class="input-group col-3">

            {{ Form::text('filter', $filters['filter'] ?? null , ['class' => 'form-control', 'placeholder' => 'Procurar']) }}

            <div class="input-group-append">
                {{ Form::button('<i class="fa fa-search"></i>', ['type' => 'submit', 'class' => 'btn btn-success btn-sm'] )  }}
            </div>
            {{ Form::close() }}

        </div>

    </div>

    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th width="50px">#</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                {{ Form::model($plan, ['route' =>['plans.modules.attach', $plan->id], 'class' => 'form'])}}

                @foreach($modules as $module)
                <tr>
                    <td>
                        {{ Form::checkbox('modules[]', $module->id, false) }}
                    </td>
                    <td>
                        {{$module->name}}
                    </td>
                    <td>
                        {{$module->description}}
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="500">
                        {{ Form::button('<i class="fas fa-link"> Vincular </i>', ['type' => 'submit', 'class' => 'btn btn-success'] )  }}
                    </td>
                </tr>
                {{ Form::close() }}

            </tbody>
        </table>

    </div>

    <div class="card-footer">
        @if(isset($filters))
        {{ $modules->appends($filters)->links() }}
        @else
        {{ $modules->links() }}
        @endif

        
    </div>

</div>



@stop