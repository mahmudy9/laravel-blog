@include('layouts.header')

<div class="container">

    <ul class="list-group">
        @foreach($categories as $category)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{ url('categories/'.$category->name) }}" >{{ $category->name }}</a><span class="badge"><a href="{{ url('dashboard/deletecategory/'.$category->id) }}" class="btn btn-danger">Delete Category</a></span>
            <span class="badge badge-primary badge-pill">{{ $number[$category->name] }}</span>
        </li>
        @endforeach
    </ul>
    <br>
            <div class = "container" >
            <a class="btn btn-primary" href="{{ url('dashboard/addcategory') }}" role="button">Add Category</a>
        </div>
<br><br>
{{ $categories->links() }}
</div>
@include('layouts.footer')