@extends('adminlte::page')

@section('title', "Permissões do módulo {$module->name}")

@section('content_header')

<div class="card-header">
    <div class="card-tools">
        <nav aria-label="breadcrumb" class="ml-auto">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Permissões</li>
            </ol>
        </nav>
    </div>

    <h1 class="m-0 text-dark">
        <span>
            <a href="{{ route('modules.permissions.available', $module->id) }}" class="text-dark">
                <i class="fas fa-plus fa-1x" aria-hidden="true"></i>
            </a>
        </span>
        Permissões do módulo <b>{{$module->name}}</b>
    </h1>

</div>

@stop

@section('content')

<div class="card">
    <div class="card-header">
        
    @include('includes.alerts')

        {{ Form::open(['route'=>'modules.search'],['class' => 'form form-inline']) }}
        <div class="input-group col-3">

            {{ Form::text('filter', $filters['filter'] ?? null , ['class' => 'form-control', 'placeholder' => 'Procurar']) }}

            <div class="input-group-append">
                {{ Form::button('<i class="fa fa-search"></i>', ['type' => 'submit', 'class' => 'btn btn-success btn-sm'] )  }}
            </div>
            {{ Form::close() }}

        </div>

        @if(isset($filters))
        <a href="{{ route('modules.index', $module->id) }}">(X) Limpar os filtros</a>
        @endif
    </div>

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
                @foreach($permissions as $permission)
                <tr>
                    <td>
                        {{$permission->name}}
                    </td>
                    <td>
                        {{$permission->description}}
                    </td>
                    <td>
                        <a href="{{ route('modules.permission.detach', [$module->id, $permission->id]) }}" class="btn btn-danger btn-sm"><i class="far fa-window-close"> Desvincular</i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <div class="card-footer">
        @if(isset($filters))
        {{ $permissions->appends($filters)->links() }}
        @else
        {{ $permissions->links() }}
        @endif

        
    </div>

</div>



@stop