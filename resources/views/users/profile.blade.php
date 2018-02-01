@include('layouts.app')

<div class="container">
    <ul>
        <li>{{ $user->name }} 
            </li>
            <li> {{ $user->email }} </li>
    </ul>

</div>