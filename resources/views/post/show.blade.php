
@include('layouts.header')

    <div class="container">
        <h1>{{ $post->title }}</h1>
        <br>
        <br>
        <p>

            {!! clean($post->body) !!}
        </p>
@include('comments')
    </div>
@include('layouts.footer')

