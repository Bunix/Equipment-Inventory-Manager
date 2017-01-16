@extends('layout')

@section('header')

@if(!Auth::guest() and isset($item) ? in_array($item->owned_by_lab_id, $user_info->Labs->pluck('id')->toArray()) : true)
<script src="{{ asset('js/labUI.js') }}"></script>
@endif
<script src="{{ asset('js/itemUI.js') }}"></script>
<script src="{{ asset('js/classUI.js') }}"></script>

<script type="text/javascript">
    function changeMethod() {
        if(confirm("Are you sure you want to delete this item?")){
            $('[name="_method"]').val("DELETE");
            $(".form-horizontal").submit();
        }
    }
    
    function back() {
         window.location = '/';
    }

</script>


@stop

@section('content')
<div class='row'>
	<div class='col-sm-8 col-sm-offset-2'>
        
        <h1> {{$model->device_name}} - {{$item -> serial_num}} </h1>
        
		<hr>
        
        <div id="equipment_info">
            
        @include('model.errors')
        @include('model.alerts')
            
        @if (Auth::guest() or !(isset($item) ? in_array($item->owned_by_lab_id, $user_info->Labs->pluck('id')->toArray()) : true))
        <div class="alert alert-info col-sm-12 alert-dismissable" id="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>  
            You are not a member of the lab that owns this equipment, so you cannot update or delete this item.
        </div>
        @endif
            
            <form class = "form-horizontal" method = "POST" action = "update/{{$model -> id}}/{{$item -> id}}">
                        
            {{ csrf_field() }}
                        
            {{ method_field('PATCH') }}
                
           
                
            <h4>Equipment Class Information</h4>
                        
            @include('model.model_form')		

		      <hr>
            
            <h4>Equipment Item Information</h4>
                
            @include('model.item_form')		
                        
            @include('model.form_buttons')
                
            
            </form>
        </div>

        <hr>

		
	</div>
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
                tags: true
            });
            
            $("#measure_parameters").select2({
                placeholder: "  Select or add measure parameters here.",
                tags: true
            });
        });
    </script>

@stop