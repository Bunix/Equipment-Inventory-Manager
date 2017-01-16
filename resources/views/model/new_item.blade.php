@extends('layout')

@section('header')
<script src="{{ asset('js/labUI.js') }}"></script>
<script src="{{ asset('js/itemUI.js') }}"></script>
<script src="{{ asset('js/classUI.js') }}"></script>

<script type="text/javascript">
    function back() {
         window.location = '/';
    }
</script>
@stop

@section('content')
<div class='row'>

		<h1>New Equipment Item for {{ $model->device_name }}</h1>

		<hr>
        
        @include('model.alerts')
        
        
    <form class = "form-horizontal" method = "POST" action = "model/{{$model -> id}}/item">

	       <div class='col-sm-6'>
               
                <h4>Equipment Class Information</h4>
                        
                {{ csrf_field() }}
                        
               <fieldset disabled>
                @include('model.model_form')
               </fieldset>
            </div>


             
        <div class='col-sm-6'>
                @include('model.errors')
            
                <h4>New Model Item</h4>
                        
                @include('model.item_form')
                    
                @include('model.form_buttons')
            
         </div>
     </form>
</div>
@stop

@section('footer')

    <script type="text/javascript">
        $(document).ready(function() {
            $("#parts").select2({
                placeholder: "  Add worstation part numbers here.",
                tags: true
            });
        

            $("#keywords").select2({
                placeholder: "  Select or add class keywords here.",
                tags: true,
                disabled: true
            });

        
            $("#measure_parameters").select2({
                placeholder: "  Select or add measure parameters here.",
                tags: true,
                disabled: true
            });
        });
    </script>
@stop

