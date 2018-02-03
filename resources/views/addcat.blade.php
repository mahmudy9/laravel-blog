@include('layouts.header')

    <div class="container">

        @include('errors')
        <form method="post" action="{{ url('dashboard/storecategory') }}" >
            {{ csrf_field() }}
            <div class="form-group">
                <label for="formGroupExampleInput">Category Name</label>
                <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Example input">
            </div>
            <div class="form-group">
                <label for="body"></label>
                <button type="submit" class="btn btn-primary" name="submit">Add Category</button>
            </div>
        </form>
       
        
    </div>
@include('layouts.footer')

