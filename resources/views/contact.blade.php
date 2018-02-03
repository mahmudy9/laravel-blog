@include('layouts.header')
<div class="container">
<p>This is Contact page</p>
    @include('errors')
        <form method="post" action="{{ url('contact/store') }}" >
            {{ csrf_field() }}
            <div class="form-group">
                <label for="formGroupExampleInput">Name</label>
                <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Example input">
            </div>
            
            <div class="form-group">
                <label for="formGroupExampleInput">Email</label>
                <input type="text" name="email" class="form-control" id="formGroupExampleInput" placeholder="Example input">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" name="body" rows="5" ></textarea>
            </div>
            <div class="form-group">
                <label for="body"></label>
                <button type="submit" class="btn btn-primary" name="submit">Send Message</button>
            </div>
        </form>


</div>

@include('layouts.footer')




