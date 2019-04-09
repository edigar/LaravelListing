@extends('layout.layout')

@section('content')
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif
    <div class="container col-md-6 col-md-offset-5">
      <h1>Editar Atividade</h1>
        <div class="row-auto">
            <form method="post" action="{{action('ActivityController@update', $id)}}" >
                {{csrf_field()}}
                <input name="_method" type="hidden" value="PATCH">
                <input name="module_id" type="hidden" value={{$activity->module_id}}>
                <div class="form-group">
                    <input type="hidden" value="{{csrf_token()}}" name="_token" />
                    <label for="title">Título:</label>
                    <input type="text" class="form-control" name="title" value={{$activity->title}} />
                </div>
                <div class="form-group">
                    <label for="description">Descrição:</label>
                    <input type="text" class="form-control" name="description" value={{$activity->description}} />
                </div>
                <div class="form-group">
                    <div class="col-auto my-1">
                        <label class="mr-sm-2" for="status">Status</label>
                        <select class="custom-select mr-sm-2" name="status" id="status">
                            @if($activity->status == 1)
                                <option value="1" selected>Status 1</option>
                            @else
                                <option value="1">Status 1</option>
                            @endif
                            @if($activity->status == 2)
                                <option value="2" selected>Status 2</option>
                            @else
                                <option value="2">Status 2</option>
                            @endif
                            @if($activity->status == 3)
                                <option value="3" selected>Status 3</option>
                            @else
                                <option value="3">Status 3</option>
                            @endif
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
</div>
@endsection