@extends('layout')

@section('header')
<script src="{{ asset('js/summaryUI.js') }}"></script>
@stop


@section('content')

<div class='row'>
    <div class="col-sm-12">
        
        @include('model.errors')
        @include('model.alerts')
        
        <h4>Summary view for {{$field}} containing "{{$search}}".</h4>
        
        <hr>
        
        <h4>Order Filter</h4>
        <div class="radio">
            <label><input type="radio" name="filter" id="filter_all" value="all" checked>All</label>
        </div>
        <div class="radio">
            <label><input type="radio" name="filter" id="filter_safety" value="safety">Safety</label>
        </div>
        <div class="radio disabled">
            <label><input type="radio" name="filter" id="filter_metrology" value="metrology">Metrology</label>
        </div>

        @include('model.summary_view_table')
        
    </div>
</div>


@stop