@extends('layout.layout')

@section('content')
    <div class="container col-md-4 col-md-offset-2">
        <h1>Nova Atividade</h1>
        <hr>
        <form class="form-horizontal" action="/activities/{{$moduleId}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <input name="module_id" type="hidden" value={{$moduleId}}>
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title"  name="title">
            </div>
            <div class="form-group">
                <label for="description">Descrição</label>
                <input type="text" class="form-control" id="description" name="description">
            </div>
            <div class="form-group">
                <div class="col-auto my-1">
                    <label class="mr-sm-2" for="status">Status</label>
                    <select class="custom-select mr-sm-2" name="status" id="status">
                    <option value="1">Status 1</option>
                    <option value="2">Status 2</option>
                    <option value="3">Status 3</option>
                    </select>
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection