@include('layouts.header')

<div class="container">

    <ul class="list-group">
        @foreach($categories as $category)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{ url('categories/'.$category->name) }}" >{{ $category->name }}</a>
            <span class="badge badge-primary badge-pill">{{ $number[$category->name] }}</span>
        </li>
        @endforeach
    </ul>

</div>
@include('layouts.footer')