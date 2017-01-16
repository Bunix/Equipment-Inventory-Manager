@extends('layout')

@section('content')
            <div class="row">
            <h1>Add New Equipment Item</h1>
        </div>
        
        <div class="row">
            
            <div class="col-sm-3 col-sm-offset-2">
            <h4>Choose Existing Equipment Class</h4> 
                <div class="list-group"> 
                    @foreach ($models as $model)
                            <a href='/new/{{$model->id}}' class="list-group-item">{{$model -> device_name}}</a>
                    @endforeach
                </div>
            </div>
            
            <div class="col-sm-2">
                <h3>OR</h3>
            </div>
            
            <div class="col-sm-3">
                <h4>Create New Equipment Class</h4>
                <a class="btn btn-primary btn-block" href="/new-model" role="button">Create New Class</a>
            </div>
            
         </div>


@stop