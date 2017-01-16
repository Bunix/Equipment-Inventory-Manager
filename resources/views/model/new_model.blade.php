@extends('layout')

@section('header')
<script src="{{ asset('js/classUI.js') }}"></script>
<script type="text/javascript">
    function back() {
         window.location = '/';
    }
</script>
@stop

@section('content')
<div class='row'>
	<div class='col-sm-8 col-sm-offset-2'>

		<h1>New Equipment Class</h1>

		<hr>
        
        @include('model.errors')
        @include('model.alerts')

        <h4>Equipment Class Information</h4>

            <form class = "form-horizontal" method = "POST" action = "new_model/add_model">
                        
                {{ csrf_field() }}
                        
				@include('model.model_form')		
                        
                @include('model.form_buttons')
        </form>
        
        
	</div>
</div>

@stop

@section('footer')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#keywords").select2({
                placeholder: "  Select or add class keywords here.",
                tags: true
            });
        });
        
        $(document).ready(function() {
            $("#measure_parameters").select2({
                placeholder: "  Select or add measure parameters here.",
                tags: true
            });
        });
    </script>
@stop