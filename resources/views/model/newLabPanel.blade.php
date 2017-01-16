@extends('layout')

@section('header')
<script type="text/javascript">
    function back() {
         window.location = '/';
    }
</script>
@stop

@section('content')
<div class='row'>
	<div class='col-sm-8 col-sm-offset-2'>
        
        @include('model.errors')
        @include('model.alerts')
        
        <h4>Add New Lab</h4>
        
        <hr>
            
        <form class = "form-horizontal" method = "POST" action = "/admin/newLab/addLab">
                        
            {{ csrf_field() }}
                
            <div class="form-group">
                <div class="col-sm-3 control-label">
                    <label for="lab_name" class = "col-form-label">Lab Name</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="{{ old('lab_name', isset($lab->lab_name ) ? $lab->lab_name : '') }}" id="lab_name" name="lab_name" placeholder="(Required)">
                </div>
            </div>
            
            <div class="form-group" id="lab_owner-div">
                <div class="col-sm-3 control-label">
                    <label for="lab_owner" class = "col-form-label">Lab Owner</label>
                </div>
                <div class="col-sm-9">
                    <select multiple class="form-control" id="lab_owner" name="lab_owner" style="width: 100%">

                                @foreach($users as $u)
                                    <option value="{{$u->id}}">{{$u->name}} ({{$u->jjvc_user_id}})</option>
                                @endforeach

                    </select>
                </div>
            </div>
                
            <div class="form-group" id="lab_members-div">
                <div class="col-sm-3 control-label">
                    <label for="lab_members" class = "col-form-label">Lab Members</label>
                </div>
                <div class="col-sm-9">
                    <select multiple class="form-control" id="lab_members" name="lab_members[]" style="width: 100%">

                                @foreach($users as $u)
                                    <option value="{{$u->id}}" @if(isset($lab) ? $lab->Members->contains($u->id) : '0') selected @elseif(collect(old('lab_members'))->contains($u->id)) selected @endif>{{$u->name}} ({{$u->jjvc_user_id}}) @if(!count($u->Labs))(User is not a member of any labs.)@endif</option>
                                @endforeach

                    </select>
                </div>
            </div>
                
            <div class="form-group" id="lab_room_numbers-div">
                <div class="col-sm-3 control-label">
                    <label for="lab_room_numbers" class = "col-form-label">Lab Room Numbers</label>
                </div>
                <div class="col-sm-9">
                    <select multiple class="form-control" id="lab_room_numbers" name="lab_room_numbers[]" style="width: 100%">

                    </select>
                </div>
            </div>
                
            

            @include('model.form_buttons')
            
            </form>


	</div>
</div>

@stop

@section('footer')

    <script type="text/javascript">
        $(document).ready(function() {
            function format (tag){
                var numEncountered = false;
                var temp = "";
                for(var i = 0; i < tag.length; i++){
                    var c = tag.charAt(i);
                    if (!isNaN(c)){
                        numEncountered = true;
                    }
                    if(numEncountered){
                        temp=temp+c;
                    }
                }
                return temp;
            }
            
            $("#lab_room_numbers-div select").select2({
                placeholder: "  Add lab numbers this lab has equipment in here. (Required)",
                tags: true,
                tokenSeparators: ['\n',' '],
                createTag: function (term) {
                    tag = format(term.term);
                    return { id: tag, text: tag};
                }
            });
            $("#lab_members-div select").select2({
                placeholder: "  Add lab members here.",
                tags: false
            });
            
            $("#lab_owner-div select").select2({
                placeholder: "  Add lab owner here. (Required)",
                tags: false,
                maximumSelectionLength: 1
            });
        });
    </script>

@stop