@if (count($errors))
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
          <strong>ERROR:</strong> {{ $error }}
        </div>
    @endforeach
@endif

@if(Session::has('alert'))

    <div class="alert alert-danger">
      <strong>ERROR:</strong> {{Session::get('alert')}}
    </div>

@endif