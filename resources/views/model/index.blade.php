@extends('layout')

@section('header')

<script src="{{ asset('js/ajax.js') }}"></script>

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

@if (Auth::guest())
<div class="col-sm-12">
    <div class="alert alert-info alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>  
        You must be registered in order to add or manage any equipment. Please login (or register if you need to) by clicking the 'login' button at the top right.
    </div>
</div>
@elseif(empty(Auth::user()->Labs->pluck('id')->toArray()))
<div class="col-sm-12">
    <div class="alert alert-info alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>   
        You must be added to at least one lab in order to add or manage any equipment.
        <br><br>
        Please contact an administrator (@include('model.adminList')) or your lab manager to get that set up. 
        <br><br>
        You can still search and view all existing equipment. 
    </div>
</div>
@endif

<div class="col-sm-12">
@include('model.errors')
@include('model.alerts')
</div>

<div class="col-sm-3">
    
    <h4>Location Filter</h4>
                
           @include('model.location_filter_list')
</div>

<div class="col-sm-3">
    <h4>Equipment Inventory</h4>
    
    <div id="equipment_inventory_list">
        <div class="well">Click on a lab to to the left to list all the equipment for that location.</div>
    </div>
</div>

<div class="col-sm-6">
    <div id="equipment_info">
    </div>
</div>


@stop

@section('footer')

@stop