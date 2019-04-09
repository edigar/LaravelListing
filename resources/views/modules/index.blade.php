@extends('layout.layout')

@section('content')
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <div class="container">
            <div class="row align-items-center">
                <div class="col"><h1>Módulos</h1></div>
                <div class="col">
                    <div class="text-right">
                        <a href="/create/module"><input type="button" value="Novo Módulo" class="btn btn-primary" /></a>
                    </div>
                </div>
                <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Data de Cadastro</th>
                    <th scope="col">Data de Modificação</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($modules as $module)
                    <tr>
                    <td>{{$module->title}}</td>
                    <td>{{$module->description}}</td>
                    <td>{{$module->created_at->toFormattedDateString()}}</td>
                    <td>{{$module->updated_at->toFormattedDateString()}}</td>
                    <td>{{$module->status}}</td>
                    <td>
                    <div class="btn-group" role="group">
                        <a href="{{ URL::to('modules/' . $module->id . '/edit') }}">
                            <button type="button" class="btn btn-warning">Edit</button>
                        </a>&nbsp;
                        <form action="{{url('modules', [$module->id])}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-danger" value="Delete"/>
                        </form>&nbsp;
                        <a href="{{ URL::to('activities/' . $module->id) }}">
                            <button type="button" class="btn btn-info">Atividades ({{$module->countActivities}})</button>
                        </a>
                    </div>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
@endsection