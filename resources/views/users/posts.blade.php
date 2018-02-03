@include('layouts.header')

<div class="container">
    <div class="blog-post" >
    @foreach($posts as $post)

        <div class="card w-75">
            <div class="card-body">
                <h3 class="card-title">{{ $post->title }}</h3>
                                <p class="blog-post-meta">{{$post->created_at }} By<a href="{{ url('user/profile/'.$post->user->id) }}"> {{ $post->user->name }}</a></p>
                <p class="card-text">{!! substr(clean($post->body,[ 'HTML.Allowed' => '' ]),0,140) !!}</p>
                <?php
                    $slug = strtolower(str_replace(" ","-",$post->title))
                ?>
                <a href="{{ url('post/show/'.$post->id.'/'.$slug) }}" class="btn btn-primary">Continue Reading</a>
            </div>
        </div>
        
    @endforeach
    </div>
    {{ $posts->links() }}

</div>
@include('layouts.footer')