<div class="form-group">
    <div class="col-sm-3 control-label">
        <label for="manufacturer" class = "col-form-label">Manufacturer</label>
    </div>
    <div class="col-sm-9">
        <input type="text" class="form-control" value="{{ old('manufacturer', isset($item->manufacturer ) ? $item->manufacturer : '') }}" id="manufacturer" name="manufacturer">
    </div>
</div>

<div class="form-group">
    <div class="col-sm-3 control-label">
        <label for="serial_num" class = "col-form-label">Serial Number</label>
    </div>
    <div class="col-sm-9">
        <input type="text" class="form-control" value="{{ old('serial_num', isset($item->serial_num) ? $item->serial_num : '') }}" id="serial_num" name="serial_num" placeholder="A Serial Number or JJVC Asset Tag is required.">
    </div>
</div>

<div class="form-group">
    <div class="col-sm-3 control-label">
        <label for="asset_tag" class = "col-form-label">JJVC Asset Tag</label>
    </div>
    <div class="col-sm-9">
        <input type="text" class="form-control" value="{{ old('asset_tag', isset($item->asset_tag) ? $item->asset_tag : '') }}" id="asset_tag" name="asset_tag" placeholder="A Serial Number or JJVC Asset Tag is required.">
    </div>
</div>

<div class="form-group">
    <div class="col-sm-3 control-label">
        <label for="workstation_num" class = "col-form-label">Workstation Number</label>
    </div>
    <div class="col-sm-9">
        <input type="text" class="form-control" value="{{ old('workstation_num', isset($item->workstation_num) ? $item->workstation_num : '') }}" id="workstation_num" name="workstation_num">
    </div>
</div>



<div class="form-group" id="parts-div">
    <div class="col-sm-3 control-label">
        <label for="parts" class = "col-form-label">Workstation Parts</label>
    </div>
    <div class="col-sm-9">
        <select multiple class="form-control" id="parts" name="parts[]" style="width: 100%">
                @if(isset($parts))
                    @foreach($parts as $part)
                        <option value = "{{$part->name}}" selected>{{$part->name}}</option>
                    @endforeach
                @endif
        </select>
    </div>
</div>



<div class="form-group">
    <div class="col-sm-3 control-label">
        <label for="owned_by_lab_id" class = "col-form-label">Lab Info</label>
    </div>
    <div class="col-sm-9">
        <select class="form-control" id="owned_by_lab_id" name="owned_by_lab_id">
            @if(!Auth::guest() and isset($item) ? in_array($item->owned_by_lab_id, $user_info->Labs->pluck('id')->toArray()) : true)
                @foreach($user_info->Labs as $l)
                    <option value="{{$l->id}}" @if(isset($item) ? $item->owned_by_lab_id == $l->id : '0') selected @endif>{{$l->lab_name}} --- Lab Owner: {{$l->Lab_Owner->name}}</option>
                @endforeach
            @else
                <option>{{$lab->lab_name}} --- Lab Owner: {{$lab->Lab_Owner->name}}</option>
            @endif
        </select>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-3 control-label">
        <label for="current_location_id" class = "col-form-label">Current Lab Number</label>
    </div>
    <div class="col-sm-9">
        <select class="form-control" id="current_location_id" name="current_location_id">
            @if(!Auth::guest() and isset($item) ? in_array($item->owned_by_lab_id, $user_info->Labs->pluck('id')->toArray()) : true)
                @foreach($user_info->Labs as $l)
                    @foreach($l->Location as $loc)
                        <option value="{{$loc->id}}" class="labID{{$l->id}}" @if(isset($item) ? $item->current_location_id == $loc->id : '0') selected @endif>{{$loc->lab_room_number}}</option>
                    @endforeach
                @endforeach

            @else
                <option>{{$location->lab_room_number}}</option>
            @endif
        </select>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-3 control-label">
        <label for="current_floor" class = "col-form-label">Current Floor</label>
    </div>
    <div class="col-sm-9">
            @if(!Auth::guest() and isset($item) ? in_array($item->owned_by_lab_id, $user_info->Labs->pluck('id')->toArray()) : true)
                @foreach($user_info->Labs as $l)
                    @foreach($l->Location as $loc)
                        <input type="text" class="form-control labID{{$loc->id}}" value="{{$loc->Floor->floor_name}}" id="current_floor" name="current_floor" disabled>
                    @endforeach
                @endforeach
            @else
                <input type="text" class="form-control" value="{{$location->Floor->floor_name}}" id="current_floor" name="current_floor" disabled>
            @endif
    </div>
</div>


<div class="form-group">
    <div class="col-sm-3 control-label">
        <label for="calibration_tag" class = "col-form-label">Calibration Tag</label>
    </div>
    <div class="col-sm-9">
        <input type="text" class="form-control" value="{{ old('calibration_tag', isset($item->calibration_tag) ? $item->calibration_tag : '') }}" id="calibration_tag" name="calibration_tag">
    </div>
</div>

<div class="form-group" id="calibration_due">
    <div class="col-sm-3 control-label">
        <label for="calibration_due" class = "col-form-label">Calibration Due</label>
    </div>
    <div class="col-sm-9">
        <input type="text" class="form-control" value="{{ old('calibration_due', isset($item->calibration_due) ? $item->calibration_due : '') }}" id="calibration_due" name="calibration_due">
    </div>
</div>

<div class="form-group" id="calibration_schedule">
    <div class="col-sm-3 control-label">
        <label for="calibration_schedule" class = "col-form-label">Calibration Schedule</label>
    </div>
    <div class="col-sm-9">
        <input type="text" class="form-control" value="{{ old('calibration_schedule', isset($item->calibration_schedule) ? $item->calibration_schedule : '') }}" id="calibration_schedule" name="calibration_schedule">
    </div>
</div>

<div class="form-group">
    <div class="col-sm-3 control-label">
        <label for="available" class = "col-form-label">Available</label>
    </div>
    <div class="col-sm-9">
        
            <div class="radio">
                <label><input type="radio" name="available" id="available_yes" value="Yes" @if(old('available', isset($model->available ) ? $model->available : '') == 'Yes') checked @elseif (old('available') != 'No') checked @endif>Yes</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="available" id="available_no" value="No" @if(old('available', isset($model->available ) ? $model->available : '') == 'No') checked @endif>No</label>
            </div>
    </div>
</div>

@if(isset($item->Lab->mark_location))
    <div class="form-group">
        <div class="col-sm-3 control-label">
            <label for="mark_location" class = "col-form-label">Last Mark Location</label>
        </div>
        <div class="col-sm-9">
            <input type="text" class="form-control" value="{{ $item->Lab->mark_location }}" id="mark_location" name="mark_location" disabled>
        </div>
    </div>
@endif

<div class="form-group">
    <div class="col-sm-3 control-label">
        <label for="off_site" class = "col-form-label">Off Site</label>
    </div>
    <div class="col-sm-9">
        
            <div class="radio">
                <label><input type="radio" name="off_site" id="off_site_no" value="No" @if(old('off_site', isset($item->off_site ) ? $item->off_site : '') == 'No') checked @elseif (old('off_site') != 'Yes') checked @endif>No</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="off_site" id="off_site_yes" value="Yes" @if(old('off_site', isset($item->off_site ) ? $item->off_site : '') == 'Yes') checked @endif>Yes</label>
            </div>
        
    </div>
</div>

<div class="form-group" id="off_site_location">
    <div class="col-sm-3 control-label">
        <label for="off_site_location" class = "col-form-label">Off Site Location</label>
    </div>
    <div class="col-sm-9">
        <input type="text" class="form-control" value="{{ old('off_site_location', isset($item->off_site_location) ? $item->off_site_location : '') }}" id="off_site_location" name="off_site_location">
    </div>
</div>

<div class="form-group">
    <div class="col-sm-3 control-label">
        <label for="qualified" class = "col-form-label">Equipment Qualified</label>
    </div>
    <div class="col-sm-9">
        
            <div class="radio">
                <label><input type="radio" name="qualified" id="qualified_no" value="No" @if(old('qualified', isset($item->qualified ) ? $item->qualified : '') == 'No') checked @elseif (old('qualified') != 'Yes') checked @endif>No</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="qualified" id="qualified_yes" value="Yes" @if(old('qualified', isset($item->qualified ) ? $item->qualified : '') == 'Yes') checked @endif>Yes</label>
            </div>
        
    </div>
</div>


<div class="form-group">
    <div class="col-sm-3 control-label">
        <label for="notes_2" class = "col-form-label">Notes</label>
    </div>
    <div class="col-sm-9">
        <textarea class="form-control" id="notes_2" name="notes_2" rows="3">{{ old('notes_2', isset($item->notes) ? $item->notes : '') }}</textarea>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-3 control-label">
        <label for="entered_by_2" class = "col-form-label">Entered By</label>
    </div>
    <div class="col-sm-9">
        <input type="text" class="form-control" value="{{ $item->user->name or Auth::user()->name  }}" id="entered_by_2" name="entered_by_2" disabled>
    </div>
</div>

@if(isset($item->created_at))
    <div class="form-group">
        <div class="col-sm-3 control-label">
            <label for="created_at_2" class = "col-form-label">Created On</label>
        </div>
        <div class="col-sm-9">
            <input type="text" class="form-control" value="{{ $item->created_at }}" id="created_at_2" name="created_at_2" disabled>
        </div>
    </div>
@endif

@if(isset($item->updated_at))
    <div class="form-group">
        <div class="col-sm-3 control-label">
            <label for="updated_at_2" class = "col-form-label">Last Updated On</label>
        </div>
        <div class="col-sm-9">
            <input type="text" class="form-control" value="{{ $item->updated_at }}" id="updated_at_2" name="updated_at_2" disabled>
        </div>
    </div>
@endif
