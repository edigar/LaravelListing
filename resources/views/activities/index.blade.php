@extends('layout.layout')

@section('content')
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <div class="container">
            <div class="row align-items-center">
                <div class="col"><h1>Atividades</h1></div>
                <div class="col">
                    <div class="text-right">
                        @if (@isset($activities[0]->id))
                            <a href="/create/activity/{{$activities[0]->module_id}}"><input type="button" value="Nova Atividade" class="btn btn-primary" /></a>
                        @else
                            <a href="/create/activity/{{$activities[0]['module_id']}}"><input type="button" value="Nova Atividade" class="btn btn-primary" /></a>
                        @endif
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
                    @if (@isset($activities[0]->id))
                        @foreach($activities as $activity)
                        <tr>
                        <td>{{$activity->title}}</td>
                        <td>{{$activity->description}}</td>
                        <td>{{$activity->created_at->toFormattedDateString()}}</td>
                        <td>{{$activity->updated_at->toFormattedDateString()}}</td>
                        <td>{{$activity->status}}</td>
                        <td>
                        <div class="btn-group" role="group">
                            <a href="{{ URL::to('edit/activity/' . $activity->id) }}">
                                <button type="button" class="btn btn-warning">Edit</button>
                            </a>&nbsp;
                            <form action="{{url('delete/activity', [$activity->id])}}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-danger" value="Apagar"/>
                            </form>
                        </div>
                        </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
                </table>
            </div>
        </div>
@endsection