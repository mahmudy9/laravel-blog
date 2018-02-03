@include('layouts.header')
<div class="container">
    @if(! $contacts))

        <h1>No Contacts Yet</h1>

    @else
        @foreach($contacts as $contact)
        <p>name : {{ $contact->name }} </p>
        <p>Email : {{ $contact->email }} </p>
        <p>Body : {{ $contact->body }} </p>
        <a href="{{ url('dashboard/deletecontact/'.$contact->id) }}" class="btn btn-danger">Delete Message</a>
        @endforeach
    @endif

</div>
@include('layouts.footer')
