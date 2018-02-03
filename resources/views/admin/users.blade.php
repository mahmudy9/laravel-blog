@include('layouts.header')

<div class="container">

    <ul class="list-group">
        @foreach($users as $user)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{ url('profile/'.$user->id) }}" >{{ $user->name }}</a>
            <span>{{$user->email}}</span>
            <a class="btn btn-danger" href="{{url('dashboard/deleteuser/'.$user->id)}}">Delete User </a>
            <span class="badge badge-primary badge-pill"></span>
        </li>
        @endforeach
    </ul>
    <br>
</div>
@include('layouts.footer')