@extends('layout')

@section('header')
<script src="{{ asset('js/search.js') }}"></script>
@stop

@section('content')

<div class="row">
    <div class="col-sm-12">
        <form class = "form-inline text-center" method = "POST" action = "/search/results/">
            {{ csrf_field() }}
          <div class="form-group">
            <label for="field">Search field </label>
                <select class="form-control" id="field" name="field">
                     @foreach ($searchFields as $key => $value)
                            <option value={{$value['column']}}:{{$value['table']}}>{{$value['display_name']}}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
            <label> for </label>
            </div>
            
            <div class="form-group">
            
                <div class="hideable" id="text_field">
                    <input type="text" class="form-control" placeholder="Search Term" name="search">
                </div>
               
                <div class="hideable" id="keywords_select">
                    <select class="form-control" name="search">
                        @foreach($keywords as $key=>$value)
                            <option value={{$key}}>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="hideable" id="parameters_select">
                    <select class="form-control" name="search">
                        @foreach($parameters as $key=>$value)
                            <option value={{$key}}>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="hideable" id="parts_select">
                    <select class="form-control" name="search">
                        @foreach($parts as $key=>$value)
                            <option value={{$key}}>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="hideable" id="lab_select">
                    <select class="form-control" name="search">
                        @foreach($labs as $key=>$value)
                            <option value={{$key}}>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="hideable" id="radio_select">
                    <div class="radio">
                    <label><input type="radio" name="search" value="No" checked>No</label>
                    </div>
                    <div class="radio">
                    <label><input type="radio" name="search" value="Yes">Yes</label>
                    </div>
                </div>
                
            </div>
            
            
            <div class="form-group">
                <button type="submit" class="btn btn-default">Go!</button>
            </div>
            
        </form>
        <p class="text-center">Leave search field blank to find all items with a non-empty selected field.</p>
     </div>   
</div> 


@stop