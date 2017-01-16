@extends('layout')

@section('header')
<script type="text/javascript">
    function changeMethod() {
        if(confirm("Are you sure you want to delete this lab?")){
            $('[name="_method"]').val("DELETE");
            $(".form-horizontal:visible").submit();
        }
    }
    
    function back() {
         window.location = '/';
    }

</script>
<script src="{{ asset('js/labOwnerUI.js') }}"></script>
@stop

@section('content')
<div class='row'>
	<div class='col-sm-8 col-sm-offset-2'>
        
        @include('model.errors')
        @include('model.alerts')
        
        <h4>Edit Labs</h4>
        
        <hr>
        
        <div class="form-group">
            <label for="field">Owned Lab Display</label>
                <select class="form-control" id="field" name="field">
                     @foreach ($labs as $lab)
                            <option value={{$lab->id}}>{{$lab->lab_name}}</option>
                    @endforeach
                </select>
            </div>
        
        <hr>
        
        @foreach($labs as $lab)
        
        <div class = "owner-panel" id="owner-panel-{{$lab->id}}">
            
            <form class = "form-horizontal" method = "POST" action = "/admin/lab/update/mark/{{$lab->id}}">
                        
            {{ csrf_field() }}
                        
            {{ method_field('PATCH') }}
        
                <div class='form-group'>
                    <div class="col-sm-12">
                        <button class="btn btn-primary btn-block" type="submit">Mark Location</button>
                    </div>
                </div>
                
                <h4>Location last marked on: @if($lab->mark_location!=null){{Carbon\Carbon::parse($lab->mark_location)->format('m/d/Y h:i')}}@endif</h4>
                
            </form>
        
            <hr>
            
            <form class = "form-horizontal" method = "POST" action = "/admin/lab/update/info/{{$lab->id}}">
                        
            {{ csrf_field() }}
                        
            {{ method_field('PATCH') }}
                
            <div class="form-group">
                <div class="col-sm-3 control-label">
                    <label for="lab_name" class = "col-form-label">Lab Name</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="{{ old('lab_name', isset($lab->lab_name ) ? $lab->lab_name : '') }}" id="lab_name" name="lab_name">
                </div>
            </div>
                
            <div class="form-group" id="lab_members-div">
                <div class="col-sm-3 control-label">
                    <label for="lab_members" class = "col-form-label">Lab Members</label>
                </div>
                <div class="col-sm-9">
                    <select multiple class="form-control" id="lab_members" name="lab_members[]" style="width: 100%">

                                @foreach($users as $user)
                                    <option value="{{$user->id}}" @if(isset($lab) ? $lab->Members->contains($user->id) : '0') selected @elseif(collect(old('lab_members'))->contains($user->id)) selected @endif>{{$user->name}} ({{$user->jjvc_user_id}}) @if(!count($user->Labs))(User is not a member of any labs.)@endif</option>
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

                                @foreach($lab->Location as $location)
                                    <option value = "{{$location->lab_room_number}}" selected>{{$location->lab_room_number}}</option>
                                @endforeach

                    </select>
                </div>
            </div>
                
            <div class="form-group">
                <div class="col-sm-3 control-label">
                    <label for="name" class = "col-form-label">Current Lab Owner</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="{{isset($lab->Lab_Owner->name) ? $lab->Lab_Owner->name : ''}} ({{isset($lab->Lab_Owner->jjvc_user_id) ? $lab->Lab_Owner->jjvc_user_id : ''}})" id="name" name="name" disabled>
                </div>
            </div>

            @include('model.form_buttons')
                
            
            </form>
        
            <a href="/admin/lab/update/transfer/{{$lab->id}}" class='form-group'>Transfer Lab Ownership</a>
                
        </div>

        @endforeach
        


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
                placeholder: "  Add lab numbers this lab has equipment in here.",
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
        });
    </script>

@stop