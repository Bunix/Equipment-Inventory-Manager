<div class="list-group list-group-root well">
    <a href="#item-1" class="list-group-item" data-toggle="collapse">
    <i class="glyphicon glyphicon-chevron-right"></i>RnD Building
    </a>
    <div class="list-group collapse" id="item-1">
    @foreach ($floors as $floorkey=>$floor)
        <a href="#item-1-{{$floorkey}}" class="list-group-item" data-toggle="collapse">
        <i class="glyphicon glyphicon-chevron-right"></i>{{$floor->floor_name}}
        </a>
        <div class="list-group collapse" id="item-1-{{$floorkey}}">
            @foreach ($floor->Location->sortBy('lab_room_number') as $roomkey=>$loc)
                @if(count($loc->Equipment_Items) != 0)
                    <a href="equipment_list/{{$loc->id}}" class="list-group-item lab_number" id="labroom{{$loc->id}}">{{$loc->lab_room_number}}</a>
                @else
                    <a href="#" class="list-group-item disabled" id="labroom{{$loc->id}}disabled">{{$loc->lab_room_number}}</a>
                @endif
            @endforeach
        </div>
    @endforeach
    </div>
    <a href='equipment_list/offsite' class="list-group-item lab_number" id="offsite"> Offsite </a>
</div>

