@if ($errors->all())
<div class="alert alert-danger" role="alert">
  <center>
    @foreach ($errors->all() as $error)
    <li>- <span>{{ $error }}</span></li>
    @endforeach
  </center>
</div>
@endif

@if (session('status'))
<div class="alert alert-{{session('status')}}" role="alert">
  <center>
    {{ session('msg') }}
  </center>
</div>
@endif
