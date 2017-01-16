@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @include('model.errors')
            @include('model.alerts')
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('jjvc_user_id') ? ' has-error' : '' }}">
                            <div class="col-sm-3 control-label">
                            <label for="jjvc_user_id" class="col-form-label">JJVC User ID or Email</label>
                            </div>
                            
                            <div class="col-md-9">
                                <input id="jjvc_user_id" type="text" class="form-control" name="jjvc_user_id" value="{{ old('jjvc_user_id') }}" autofocus>
                            </div>
                            
                                @if ($errors->has('jjvc_user_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jjvc_user_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-sm-3 control-label">
                            <label for="password" class="col-form-label">Password</label>
                            </div>

                            <div class="col-sm-9">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                        
                        <hr>
                        
                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                Don't have an account?
                                <a class="btn btn-link" href="/register">
                                    Register here!
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
