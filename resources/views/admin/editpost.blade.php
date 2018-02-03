@include('layouts.header')

    <div class="container">

        @include('errors')
        <form method="post" action="{{ url('dashboard/updatepost/'.$post->id) }}" >
            {{ csrf_field() }}
            <div class="form-group">
                <label for="formGroupExampleInput">Title</label>
                <input type="text" name="title" class="form-control" id="formGroupExampleInput" value="{{$post->title}}">
            </div>
            <div class="col-auto my-1">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Category</label>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="category">
                    <option selected>Choose...</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}"  
                        @if( $category->id == $post->category_id)
                        selected
                        @endif
                        >{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" id="mytext">{{$post->body}}</textarea>
            </div>
            <div class="form-group">
                <label for="body"></label>
                <button type="submit" class="btn btn-primary" name="submit">Update Post</button>
            </div>
        </form>
       
        
    </div>
@include('layouts.footer')
