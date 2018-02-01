@include('layouts.header')

    <div class="container">

        @include('errors')
        <form method="post" action="{{ url('post/store') }}" >
            {{ csrf_field() }}
            <div class="form-group">
                <label for="formGroupExampleInput">Title</label>
                <input type="text" name="title" class="form-control" id="formGroupExampleInput" placeholder="Example input">
            </div>
            <div class="col-auto my-1">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Category</label>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="category">
                    <option selected>Choose...</option>
                    <option value="1">Technology</option>
                    <option value="2">Sport</option>
                    <option value="3">Life</option>
                </select>
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" id="mytext"></textarea>
            </div>
            <div class="form-group">
                <label for="body"></label>
                <button type="submit" class="btn btn-primary" name="submit">Publish Post</button>
            </div>
        </form>
       
        
    </div>
@include('layouts.footer')

