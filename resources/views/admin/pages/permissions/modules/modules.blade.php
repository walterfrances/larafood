@extends('adminlte::page')

@section('title', "Modulos da Permissão {$permission->name}")

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
        Modulos da Permissão <b>{{$permission->name}}</b>
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
                @foreach($modules as $module)
                <tr>
                    <td>
                        {{$module->name}}
                    </td>
                    <td>
                        {{$module->description}}
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
        {{ $modules->appends($filters)->links() }}
        @else
        {{ $modules->links() }}
        @endif

        
    </div>

</div>



@stop