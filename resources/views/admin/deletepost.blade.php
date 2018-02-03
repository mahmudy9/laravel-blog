@include('layouts.header')

    <div class="container">
<button type="submit" value="1"  class="btn btn-danger btn-lg" onclick="event.preventDefault();document.getElementById('destroy').submit();" >Delete</button>
<button type="submit" onclick="event.preventDefault();document.getElementById('cancel').submit();" value="0" class="btn btn-secondary btn-lg">Cancel</button>
<form method="post" action="{{ url('dashboard/destroypost/'.$id) }}" id="destroy" >
{{csrf_field()}}
</form>
<form method="post" action="{{ url('dashboard/canceldeletenotapproved') }}" id="cancel" >
{{ csrf_field() }}
</form>

        
</div>

@include('layouts.footer')

