@if (!Auth::guest() and isset($item) ? in_array($item->owned_by_lab_id, $user_info->Labs->pluck('id')->toArray()) : true)

<div class="row form-group">
    <div class="col-sm-4">
        <button class="btn btn-primary btn-block" type="submit">Save Changes</button>
    </div>

    <div class="col-sm-4">
        <button class="btn btn-default btn-block" type="button" onclick="back()">Cancel Changes</button>
    </div>
    
    @if(isset($item->id) or isset($user->id))

    <div class="col-sm-4">
        <button class="btn btn-danger btn-block delete" type="button" onclick="changeMethod()">Delete</button>
    </div>
    
    @endif

</div>
@endif

