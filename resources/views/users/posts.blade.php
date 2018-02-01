@include('layouts.header')

<div class="container">
    <div class="blog-post" >
    @foreach($posts as $post)

    <h1>{{ $post->title }}
        </h1>

        <hr>
        <p>{!! clean($post->body) !!}
            </p>

    @endforeach
    </div>
    {{ $posts->links() }}
</div>
@include('layouts.footer')