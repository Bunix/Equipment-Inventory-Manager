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
            
        <div class='row'>
            <div class='col-sm-6'>
                <a type="button" class="btn btn-primary btn-block" href="/admin/newLab">Add New Lab</a>
            </div>
            <div class='col-sm-6'>
                <a type="button" class="btn btn-primary btn-block" href="/admin/adminLab">Edit Existing Labs</a>
            </div>
        </div>
        <br>
        <div class='row'>
            <div class='col-sm-6'>
                <a type="button" class="btn btn-primary btn-block" href="/admin/editUsers">Edit User Info/Roles</a>
            </div>
            <div class='col-sm-6'>
                <a type="button" class="btn btn-primary btn-block" href="/admin/verifiedList">Lab Equipment Verification List</a>
            </div>
        </div>

           

	</div>
</div>

@stop

@section('footer')

@stop