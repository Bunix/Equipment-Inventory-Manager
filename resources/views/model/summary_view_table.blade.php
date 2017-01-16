<table class="table table-hover" id="all">
    <thead>
        <tr>
            <th>Equipment Class</th>
            <th>Equipment</th>
            <th>Location</th>
            <th>Serial Number</th>
            <th>HECP number</th>
            <th>Machine Guarding Required</th>
            <th>Guarding Status</th>
            <th>Safety PM Status</th>
            <th>Radiation Status</th>
            <th>Radiation Type</th>
            <th>Refrigerant</th>
            <th>Refrigerant Amount</th>
            <th>Refrigerant Type</th>
            <th>Lead Battery Acid</th>
            <th>JJVC Asset Tag</th>
            <th>Calibration Tag</th>
            <th>Floor</th>
            <th>Manufacturer</th>
            <th>Available</th>
            <th>Off Site</th>
            <th>Off Site Location</th>
            <th>Qualified</th>
            <th>Workstation Number</th>
            <th>Part Numbers</th>
            <th>Owned by Lab</th>
            <th>Measure Parameters</th>
            <th>Keywords</th>
            <th>Description</th>
        </tr>
    </thead>
<tbody>
        
@foreach ($items as $item)
    
        <tr>
            <td>{{$item->Equipment_Model->device_name}}</td>
            <td><a href='/equipment_item/{{$item->id}}'>{{$item->Equipment_Model->device_name}} - @if($item->serial_num != '') {{$item->serial_num}} @else {{$item->asset_tag}} @endif</a></td>
            <td>{{$item->Location->lab_room_number}}</td>
            <td>{{$item->serial_num}}</td>
            <td>{{$item->Equipment_Model->hecp_num}}</td>
            <td>{{$item->Equipment_Model->guarding_required}}</td>
            <td>{{$item->Equipment_Model->guarding_status}}</td>
            <td>{{$item->Equipment_Model->safety_pm_status}}</td>
            <td>{{$item->Equipment_Model->radiation_status}}</td>
            <td>{{$item->Equipment_Model->radiation_type}}</td>
            <td>{{$item->Equipment_Model->refrigerant}}</td>
            <td>{{$item->Equipment_Model->refrigerant_amount}}</td>
            <td>{{$item->Equipment_Model->refrigerant_type}}</td>
            <td>{{$item->Equipment_Model->lead_battery_acid}}</td>
            <td>{{$item->asset_tag}}</td>
            <td>{{$item->calibration_tag}}</td>
            <td>{{$item->Location->Floor->floor_name}}</td>
            <td>{{$item->manufacturer}}</td>
            <td>{{$item->available}}</td>
            <td>{{$item->off_site}}</td>
            <td>{{$item->off_site_location}}</td>
            <td>{{$item->qualified}}</td>
            <td>{{$item->workstation_num}}</td>
            
            <td>@foreach($parts as $key=>$value)
                    @if(isset($item) ? $item->Parts->contains($key) : '0')
                        {{$value}}
                    @endif
            @endforeach</td>
            <td>{{$item->Lab->lab_name}}</td>
            
            <td>@foreach($parameters as $key=>$value)
                    @if(isset($item->Equipment_Model) ? $item->Equipment_Model->Measure_Parameters->contains($key) : '0')
                        {{$value}}
                    @endif
            @endforeach</td>
            
            <td>@foreach($keywords as $key=>$value)
                    @if(isset($item->Equipment_Model) ? $item->Equipment_Model->Keywords->contains($key) : '0')
                        {{$value}}
                    @endif
            @endforeach</td>
                
            <td>{{$item->Equipment_Model->description}}</td>
        </tr>
    
@endforeach

    </tbody>
</table>

<table class="table table-hover" id="safety">
    <thead>
        <tr>
            <th>Equipment Class</th>
            <th>Equipment</th>
            <th>Location</th>
            <th>Serial Number</th>
            <th>HECP number</th>
            <th>Machine Guarding Required</th>
            <th>Guarding Status</th>
            <th>Safety PM Status</th>
            <th>Radiation Status</th>
            <th>Radiation Type</th>
            <th>Refrigerant</th>
            <th>Refrigerant Amount</th>
            <th>Refrigerant Type</th>
            <th>Lead Battery Acid</th>
            <th>JJVC Asset Tag</th>
            <th>Floor</th>
            <th>Off Site</th>
            <th>Off Site Location</th>
            <th>Description</th>
        </tr>
    </thead>
<tbody>
        
@foreach ($items as $item)
    
        <tr>
            <td>{{$item->Equipment_Model->device_name}}</td>
            <td><a href='/equipment_item/{{$item->id}}'>{{$item->Equipment_Model->device_name}} - @if($item->serial_num != '') {{$item->serial_num}} @else {{$item->asset_tag}} @endif</a></td>
            <td>{{$item->Location->lab_room_number}}</td>
            <td>{{$item->serial_num}}</td>
            <td>{{$item->Equipment_Model->hecp_num}}</td>
            <td>{{$item->Equipment_Model->guarding_required}}</td>
            <td>{{$item->Equipment_Model->guarding_status}}</td>
            <td>{{$item->Equipment_Model->safety_pm_status}}</td>
            <td>{{$item->Equipment_Model->radiation_status}}</td>
            <td>{{$item->Equipment_Model->radiation_type}}</td>
            <td>{{$item->Equipment_Model->refrigerant}}</td>
            <td>{{$item->Equipment_Model->refrigerant_amount}}</td>
            <td>{{$item->Equipment_Model->refrigerant_type}}</td>
            <td>{{$item->Equipment_Model->lead_battery_acid}}</td>
            <td>{{$item->asset_tag}}</td>
            <td>{{$item->Location->Floor->floor_name}}</td>
            <td>{{$item->off_site}}</td>
            <td>{{$item->off_site_location}}</td>
            <td>{{$item->Equipment_Model->description}}</td>
        </tr>
    
@endforeach

    </tbody>
</table>

<table class="table table-hover" id="metrology">
    <thead>
        <tr>
            <th>Equipment Class</th>
            <th>Equipment</th>
            <th>Location</th>
            <th>Serial Number</th>
            <th>JJVC Asset Tag</th>
            <th>Calibration Tag</th>
            <th>Measure Parameters</th>
            <th>Manufacturer</th>
            <th>Keywords</th>
            <th>Workstation Number</th>
            <th>Part Numbers</th>
            <th>Floor</th>
            <th>Owned by Lab</th>
            <th>Qualified</th>
            <th>Off Site</th>
            <th>Off Site Location</th>
            <th>Description</th>
        </tr>
    </thead>
<tbody>
        
@foreach ($items as $item)
    
        <tr>
            <td>{{$item->Equipment_Model->device_name}}</td>
            <td><a href='/equipment_item/{{$item->id}}'>{{$item->Equipment_Model->device_name}} - @if($item->serial_num != '') {{$item->serial_num}} @else {{$item->asset_tag}} @endif</a></td>
            <td>{{$item->Location->lab_room_number}}</td>
            <td>{{$item->serial_num}}</td>
            <td>{{$item->asset_tag}}</td>
            <td>{{$item->calibration_tag}}</td>
            
            <td>@foreach($parameters as $key=>$value)
                    @if(isset($item->Equipment_Model) ? $item->Equipment_Model->Measure_Parameters->contains($key) : '0')
                        {{$value}}
                    @endif
            @endforeach</td>
            <td>{{$item->manufacturer}}</td>
            
            <td>@foreach($keywords as $key=>$value)
                    @if(isset($item->Equipment_Model) ? $item->Equipment_Model->Keywords->contains($key) : '0')
                        {{$value}}
                    @endif
            @endforeach</td>
            
            <td>{{$item->workstation_num}}</td>
            
            <td>@foreach($parts as $key=>$value)
                    @if(isset($item) ? $item->Parts->contains($key) : '0')
                        {{$value}}
                    @endif
            @endforeach</td>
            
            <td>{{$item->Location->Floor->floor_name}}</td>
            <td>{{$item->Lab->lab_name}}</td>
            <td>{{$item->qualified}}</td>
            <td>{{$item->off_site}}</td>
            <td>{{$item->off_site_location}}</td>
            <td>{{$item->Equipment_Model->description}}</td>
        </tr>
    
@endforeach

    </tbody>
</table>