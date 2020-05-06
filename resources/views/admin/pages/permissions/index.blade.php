@extends('adminlte::page')

@section('title', 'Permissões')

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
            <a href="{{ route('permissions.create') }}" class="text-dark">
                <i class="fas fa-plus fa-1x" aria-hidden="true"></i>
            </a>
        </span>
        Permissões
    </h1>

</div>

@stop

@section('content')

<div class="card">
    <div class="card-header">
    @include('includes.alerts')
        {{ Form::open(['route'=>'permissions.search'],['class' => 'form form-inline']) }}
        <div class="input-group col-3">

            {{ Form::text('filter', $filters['filter'] ?? null , ['class' => 'form-control', 'placeholder' => 'Procurar']) }}

            <div class="input-group-append">
                {{ Form::button('<i class="fa fa-search"></i>', ['type' => 'submit', 'class' => 'btn btn-success btn-sm'] )  }}
            </div>
            {{ Form::close() }}

        </div>

        @if(isset($filters))
        <a href="{{ route('permissions.index') }}">(X) Limpar os filtros</a>
        @endif
    </div>

    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th width="250">Acções</th>
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
                        <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit" ></i></a>
                        <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-eye" ></i></a>
                        <a href="{{ route('permissions.modules', $permission->id) }}" class="btn btn-info btn-sm"><i class="fa fa-address-book" ></i></a>
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