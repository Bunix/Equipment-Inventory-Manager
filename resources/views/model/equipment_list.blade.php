@extends('layout')

@section('content')

<div class="list-group" id="equipment_inventory_list">
    @foreach ($items as $item)
        <a href='/equipment_item/{{$item->id}}' class="list-group-item item" id="{{$item->id}}">
            {{$item->Equipment_Model->device_name}} - @if($item->serial_num != '') {{$item->serial_num}} @else {{$item->asset_tag}} @endif
        </a>
    @endforeach
</div>


@stop