@extends('layout')

@section('header')

@stop

@section('content')
<div class='row'>
	<div class='col-sm-8 col-sm-offset-2'>
        
        @include('model.errors')
        @include('model.alerts')
        
        <h4>Lab Equipment Verification List</h4>
        
        <hr>
        
        <table class="table table-hover" id="all">
            <thead>
                <tr>
                    <th>Lab Name</th>
                    <th>Last Equipment Verification Date</th>
                    <th>Lab Owner</th>
                </tr>
            </thead>
        <tbody>
        
        @foreach($labs as $lab)
        
        <tr>
            <td>{{$lab->lab_name}}</td>
            <td>@if($lab->mark_location!=null){{Carbon\Carbon::parse($lab->mark_location)->format('m/d/Y h:i')}}@endif</td>
            <td><a href='mailto:{{$lab->Lab_Owner->email}}'>{{$lab->Lab_Owner->name}} ({{$lab->Lab_Owner->jjvc_user_id}})</a></td>
        </tr>
    
        @endforeach

    </tbody>
</table>


	</div>
</div>

@stop

@section('footer')

@stop