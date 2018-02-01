@include('layouts.app')

<div class="container">
@include('errors')
<form method="post" action="{{ url('updateuser/'.$user->id) }}" > 
  {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{ $user->email }}" >
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Name</label>
    <input type="hidden" name="id" value="{{ $user->id }}" />
    <input type="text" class="form-control" name="name" value="{{ $user->name }}" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>    
</div>