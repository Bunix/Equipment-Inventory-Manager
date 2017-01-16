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
        
        <h4>Edit Profile</h4>
        
        <hr>
            
            <form class = "form-horizontal" method = "POST" action = "profile/update/">
                        
            {{ csrf_field() }}
                        
            {{ method_field('PATCH') }}
                
            <div class="form-group">
                <div class="col-sm-3 control-label">
                    <label for="name" class = "col-form-label">Name</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="{{ old('name', isset($u->name ) ? $u->name : '') }}" id="name" name="name">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-3 control-label">
                    <label for="jjvc_user_id" class = "col-form-label">JJVC User ID</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="{{ old('jjvc_user_id', isset($u->jjvc_user_id) ? $u->jjvc_user_id : '') }}" id="jjvc_user_id" name="jjvc_user_id">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-3 control-label">
                    <label for="email" class = "col-form-label">Email</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="{{ old('email', isset($u->email) ? $u->email : '') }}" id="email" name="email">
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-sm-3 control-label">
                            <label for="password" class="col-form-label">New Password</label>
                            </div>

                            <div class="col-sm-9">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Leave blank to keep current password.">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <div class="col-sm-3 control-label">
                <label for="password-confirm" class="col-form-label">Confirm New Password</label>
                </div>

                <div class="col-sm-9">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Leave blank to keep current password.">

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
                        
            @include('model.form_buttons')
                
            
            </form>
        
            <hr>
        
            <h4>Labs you're currently a member of:</h4>
        
            @foreach($u->Labs as $lab)
                <h6>{{$lab->lab_name}}</h6>
            @endforeach
        
            <hr>
        
            <h4>Labs you currently own:</h4>
        
            @foreach($u->Owned_Lab as $lab)
                <h6>{{$lab->lab_name}}</h6>
            @endforeach

	</div>
</div>

@stop

@section('footer')

@stop