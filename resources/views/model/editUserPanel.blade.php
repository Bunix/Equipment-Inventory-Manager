@extends('layout')

@section('header')
<script type="text/javascript">
    function changeMethod() {
        if(confirm("Are you sure you want to delete this user?")){
            $('[name="_method"]').val("DELETE");
            $(".form-horizontal:visible").submit();
        }
    }
    
    function back() {
         window.location = '/';
    }

</script>
<script src="{{ asset('js/editUserPanelUI.js') }}"></script>
@stop

@section('content')
<div class='row'>
	<div class='col-sm-8 col-sm-offset-2'>
        
        @include('model.errors')
        @include('model.alerts')
        
        <h4>Edit Users</h4>
        
        <hr>
        
        <div class="form-group">
            <label for="field">User Display</label>
                <select class="form-control" id="field" name="field">
                     @foreach ($users as $user)
                            <option value="{{$user->id}}" @if(isset($lab) ? $lab->Members->contains($user->id) : '0') selected @elseif(collect(old('lab_members'))->contains($user->id)) selected @endif>{{$user->name}} ({{$user->jjvc_user_id}}) @if($user->role == 'admin')(Admin)@endif @if(!count($user->Labs))(User is not a member of any labs.)@endif</option>
                    @endforeach
                </select>
            </div>
        
        <hr>
        
        @foreach($users as $user)
        
        <div class = "user" id="user-{{$user->id}}">
            
            <form class = "form-horizontal" method = "POST" action = "/admin/editUsers/{{$user->id}}/update">
                        
            {{ csrf_field() }}
                        
            {{ method_field('PATCH') }}
                
            <div class="form-group">
                <div class="col-sm-3 control-label">
                    <label for="name" class = "col-form-label">Name</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="{{ old('name', isset($user->name ) ? $user->name : '') }}" id="name" name="name">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-3 control-label">
                    <label for="jjvc_user_id" class = "col-form-label">JJVC User ID</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="{{ old('jjvc_user_id', isset($user->jjvc_user_id) ? $user->jjvc_user_id : '') }}" id="jjvc_user_id" name="jjvc_user_id">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-3 control-label">
                    <label for="email" class = "col-form-label">Email</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="{{ old('email', isset($user->email) ? $user->email : '') }}" id="email" name="email">
                </div>
            </div>
                
            <div class="form-group">
                <div class="col-sm-3 control-label">
                    <label for="role" class = "col-form-label">User/Admin</label>
                </div>
                <div class="col-sm-9">

                        <div class="radio">
                            <label><input type="radio" name="role" id="role_user" value="user" @if(old('role', isset($user->role ) ? $user->role : '') == 'user') checked @elseif (old('role') != 'admin') checked @endif>User</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="role" id="role_admin" value="admin" @if(old('role', isset($user->role ) ? $user->role : '') == 'admin') checked @endif>Admin</label>
                        </div>
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
        
            <h4>Labs this user is currently a member of:</h4>
        
            @foreach($user->Labs as $lab)
                <h6>{{$lab->lab_name}}</h6>
            @endforeach
        
            <hr>
        
            <h4>Labs this user currently owns:</h4>
        
            @foreach($user->Owned_Lab as $lab)
                <h6>{{$lab->lab_name}}</h6>
            @endforeach
            
        </div>
        
        @endforeach

	</div>
</div>

@stop

@section('footer')

@stop