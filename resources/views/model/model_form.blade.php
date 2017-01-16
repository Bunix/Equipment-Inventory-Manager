<div class="form-group">
    <div class="col-sm-3 control-label">
        <label for="device_name" class = "col-form-label">Model</label>
    </div>
    <div class="col-sm-9">
        <input type="text" class="form-control" value="{{ old('device_name', isset($model->device_name) ? $model->device_name : '') }}" id="device_name" name="device_name" placeholder="Required">
    </div>
</div>

<div class="form-group">
    <div class="col-sm-3 control-label">
        <label for="description" class = "col-form-label">Description</label>
    </div>
    <div class="col-sm-9">
        <textarea class="form-control" id="description" rows="3" name="description">{{ old('description', isset($model->description ) ? $model->description : '') }}</textarea>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-3 control-label">
        <label for="guarding_required" class = "col-form-label">Machine Guarding Required</label>
    </div>
    <div class="col-sm-9">
            
            <div class="radio">
                <label><input type="radio" name="guarding_required" id="guarding_required_no" value="No" @if(old('guarding_required', isset($model->guarding_required ) ? $model->guarding_required : '') == 'No') checked @elseif (old('guarding_required') != 'Yes') checked @endif>No</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="guarding_required" id="guarding_required_yes" value="Yes" @if(old('guarding_required', isset($model->guarding_required ) ? $model->guarding_required : '') == 'Yes') checked @endif>Yes</label>
            </div>
            
    </div>
</div>

<div class="form-group" id="guarding_status">
    <div class="col-sm-3 control-label">
        <label for="guarding_status" class = "col-form-label">Guarding Status</label>
    </div>
    <div class="col-sm-9">
        <input type="text" class="form-control" value="{{ old('guarding_status', isset($model->guarding_status ) ? $model->guarding_status : '') }}" id="guarding_status" name="guarding_status">
    </div>
</div>

<div class="form-group">
    <div class="col-sm-3 control-label">
        <label for="safety_pm_status" class = "col-form-label">Safety PM Status</label>
    </div>
    <div class="col-sm-9">
        
            <div class="radio">
                <label><input type="radio" name="safety_pm_status" id="safety_pm_status_no" value="No" @if(old('safety_pm_status', isset($model->safety_pm_status ) ? $model->safety_pm_status : '') == 'No') checked @elseif (old('safety_pm_status') != 'Yes') checked @endif>No</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="safety_pm_status" id="safety_pm_status_yes" value="Yes" @if(old('safety_pm_status', isset($model->safety_pm_status ) ? $model->safety_pm_status : '') == 'Yes') checked @endif>Yes</label>
            </div>
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-3 control-label">
        <label for="lead_battery_acid" class = "col-form-label">Lead Battery Acid</label>
    </div>
    <div class="col-sm-9">
        
            <div class="radio">
                <label><input type="radio" name="lead_battery_acid" id="lead_battery_acid_no" value="No" @if(old('lead_battery_acid', isset($model->lead_battery_acid ) ? $model->lead_battery_acid : '') == 'No') checked @elseif (old('lead_battery_acid') != 'Yes') checked @endif>No</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="lead_battery_acid" id="lead_battery_acid_Yes" value="Yes" @if(old('lead_battery_acid', isset($model->lead_battery_acid ) ? $model->lead_battery_acid : '') == 'Yes') checked @endif>Yes</label>
            </div>
        
    </div>
</div>


<div class="form-group">
    <div class="col-sm-3 control-label">
        <label for="hecp_num" class = "col-form-label">HECP number</label>
    </div>
    <div class="col-sm-9">
        <input type="text" class="form-control" value="{{ old('hecp_num', isset($model->hecp_num ) ? $model->hecp_num : '') }}" id="hecp_num" name="hecp_num" placeholder="Required">
    </div>
</div>

<div class="form-group" id="radiation_status">
    <div class="col-sm-3 control-label" >
        <label for="radiation_status" class = "col-form-label">Radiation Status</label>
    </div>
    <div class="col-sm-9">
        
            <div class="radio">
                <label><input type="radio" name="radiation_status" id="radiation_status_no" value="No" @if(old('radiation_status', isset($model->radiation_status ) ? $model->radiation_status : '') == 'No') checked @elseif (old('radiation_status') != 'Yes') checked @endif>No</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="radiation_status" id="radiation_status_yes" value="Yes" @if(old('radiation_status', isset($model->radiation_status ) ? $model->radiation_status : '') == 'Yes') checked @endif>Yes</label>
            </div>
        
    </div>
</div>

<div class="form-group" id="radiation_type">
    <div class="col-sm-3 control-label">
        <label for="radiation_type" class = "col-form-label">Radiation Type</label>
    </div>
    <div class="col-sm-9">
        <input type="text" class="form-control" value="{{ old('radiation_type', isset($model->radiation_type ) ? $model->radiation_type : '') }}" id="radiation_type" name="radiation_type">
    </div>
</div>

<div class="form-group" id="refrigerant">
    <div class="col-sm-3 control-label">
        <label for="refrigerant" class = "col-form-label">Refrigerant</label>
    </div>
    <div class="col-sm-9">
        
            <div class="radio">
                <label><input type="radio" name="refrigerant" id="refrigerant_no" value="No" @if(old('refrigerant', isset($model->refrigerant ) ? $model->refrigerant : '') == 'No') checked @elseif (old('refrigerant') != 'Yes') checked @endif>No</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="refrigerant" id="refrigerant_yes" value="Yes" @if(old('refrigerant', isset($model->refrigerant ) ? $model->refrigerant : '') == 'Yes') checked @endif>Yes</label>
            </div>
        
    </div>
</div>

<div class="form-group" id="refrigerant_type">
    <div class="col-sm-3 control-label">
        <label for="refrigerant_type" class = "col-form-label">Refrigerant Type</label>
    </div>
    <div class="col-sm-9">
        <input type="text" class="form-control" value="{{ old('refrigerant_type', isset($model->refrigerant_type ) ? $model->refrigerant_type : '') }}" id="refrigerant_type" name="refrigerant_type">
    </div>
</div>

<div class="form-group" id="refrigerant_amount">
    <div class="col-sm-3 control-label">
        <label for="refrigerant_amount" class = "col-form-label">Refrigerant Amount</label>
    </div>
    <div class="col-sm-9">
        <input type="text" class="form-control" value="{{ old('refrigerant_amount', isset($model->refrigerant_amount ) ? $model->refrigerant_amount : '') }}" id="refrigerant_amount" name="refrigerant_amount">
    </div>
</div>




<div class="form-group">
    <div class="col-sm-3 control-label">
        <label for="measure_parameters[]" class = "col-form-label">Measure Parameters</label>
    </div>
    <div class="col-sm-9">
        <select multiple class="form-control" id="measure_parameters" name="measure_parameters[]">
            @foreach($parameters as $key=>$value)
                <option value="id={{$key}}" @if(isset($model) ? $model->Measure_Parameters->contains($key) : '0') selected @elseif(collect(old('measure_parameters'))->contains($key)) selected @endif>{{ $value }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-3 control-label">
        <label for="keywords" class = "col-form-label">Keywords</label>
    </div>
    <div class="col-sm-9">
        <select multiple class="form-control" id="keywords" name="keywords[]">
            @foreach($keywords as $key=>$value)
                <option value="id={{$key}}" @if(isset($model) ? $model->Keywords->contains($key) : '0') selected @elseif(collect(old('keywords'))->contains($key)) selected @endif>{{ $value }}</option>
            @endforeach
        </select>
    </div>
</div>


<div class="form-group">
    <div class="col-sm-3 control-label">
        <label for="notes" class = "col-form-label">Notes</label>
    </div>
    <div class="col-sm-9">
        <textarea class="form-control" id="notes" rows="3" name="notes">{{ old('notes', isset($model->notes ) ? $model->notes : '') }}</textarea>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-3 control-label">
        <label for="entered_by" class = "col-form-label">Entered By</label>
    </div>
    <div class="col-sm-9">
        <input type="text" class="form-control" value="{{ $model->user->name or Auth::user()->name }}" id="entered_by" name="entered_by" disabled>
    </div>
</div>

@if(isset($model->created_at))
    <div class="form-group">
        <div class="col-sm-3 control-label">
            <label for="created_at" class = "col-form-label">Created On</label>
        </div>
        <div class="col-sm-9">
            <input type="text" class="form-control" value="{{ $model->created_at }}" id="created_at" name="created_at" disabled>
        </div>
    </div>
@endif

@if(isset($model->updated_at))
    <div class="form-group">
        <div class="col-sm-3 control-label">
            <label for="updated_at" class = "col-form-label">Last Updated On</label>
        </div>
        <div class="col-sm-9">
            <input type="text" class="form-control" value="{{ $model->updated_at }}" id="updated_at" name="updated_at" disabled>
        </div>
    </div>
@endif