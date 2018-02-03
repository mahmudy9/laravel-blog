@include('layouts.header')

    <div class="container">
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ url('dashboard/notapproved') }}">Posts To Be Approved</a>
                <span class="badge badge-primary badge-pill">{{ $data['notApprovedPosts'] }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{url('dashboard/userslist')}}" >Users List</a>
                <span class="badge badge-primary badge-pill">{{ $data['users'] }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{url('dashboard/postslist')}}" >Posts List</a>
                <span class="badge badge-primary badge-pill">{{ $data['approvedPosts'] }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ url('dashboard/categories') }}" >Categories List</a>
                <span class="badge badge-primary badge-pill">{{ $data['categories'] }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{url('dashboard/contacts')}}" >Contacts</a>
                <span class="badge badge-primary badge-pill">{{ $data['contacts'] }}</span>
            </li>

        </ul>
        <hr>

    </div>
@include('layouts.footer')

