@foreach($admins as $admin)
<a href="mailto:{{$admin->email}}">{{$admin->name}}</a>@if($loop->remaining == 1) and @elseif(!$loop->last), @endif
@endforeach