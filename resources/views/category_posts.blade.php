@include('layouts.header')

<div class="container">
<h1> {{ $category_name }} </h1>
    <ul class="list-group">
        @foreach($category->posts as $post)
        
        <div class="card w-75">
            <div class="card-body">
                <h3 class="card-title">{{ $post->title }}</h3>
                <p class="card-text">{!! substr(clean($post->body),0,100) !!}</p>
                <?php
                    $slug = strtolower(str_replace(" ","-",$post->title))
                ?>
                <a href="{{ url('post/show/'.$post->id.'/'.$slug) }}" class="btn btn-primary">Continue Reading</a>
            </div>
        </div>
        
        @endforeach
    </ul>

</div>
@include('layouts.footer')