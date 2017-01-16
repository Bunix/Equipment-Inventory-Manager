@extends('layout')

@section('header')
<script type="text/javascript">
    function back() {
         window.location = '/';
    }
</script>

@stop

@section('content')
<div class='row'>
	<div class='col-sm-8 col-sm-offset-2'>
        
        @include('model.errors')
        @include('model.alerts')
        
        <h4>Transfering a lab to a new owner can only be undone by the new lab owner or an admin. Proceed with caution. </h4>
        
        <hr>
            
            <form class = "form-horizontal" method = "POST" action = "/admin/lab/update/transfer/{{$lab->id}}/go">
                        
            {{ csrf_field() }}
                        
            {{ method_field('PATCH') }}
                
                                
            <div class="form-group">
                <div class="col-sm-3 control-label">
                    <label for="name" class = "col-form-label">Current Lab Owner</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="{{isset($lab->Lab_Owner->name) ? $lab->Lab_Owner->name : ''}} ({{isset($lab->Lab_Owner->jjvc_user_id) ? $lab->Lab_Owner->jjvc_user_id : ''}})" id="name" name="name" disabled>
                </div>
            </div>
                

            <div class="form-group" id="lab_members-div">
                <div class="col-sm-3 control-label">
                    <label for="lab_owner" class = "col-form-label">New Lab Owner</label>
                </div>
                <div class="col-sm-9">
                    <select multiple class="form-control" id="lab_owner" name="lab_owner" style="width: 100%">

                                @foreach($users as $user)
                                    <option value="{{$user->id}}" @if($user->id == $lab->Lab_Owner->id) selected @endif>{{$user->name}} ({{$user->jjvc_user_id}})</option>
                                @endforeach

                    </select>
                </div>
            </div>
                


            @include('model.form_buttons')
                
            
            </form>
        

                
        </div>

        
</div>

@stop

@section('footer')

@stop