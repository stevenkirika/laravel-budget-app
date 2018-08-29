@if(count($errors)>0)
  @foreach($errors->all() as $error)
  <div class="alert alert-danger alert-sm dismissable">
  	<a class="pull-right" href=""  data-dismiss="alert">&times;</a>
  	{{$error}}
  </div>
  @endforeach
@endif

@if(session('success'))
<div class="alert alert-success alert-sm dismissable">
	<a class="pull-right" href=""  data-dismiss="alert">&times;</a>
	{{session('success')}}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-sm dismissable">
	<a class="pull-right" href=""  data-dismiss="alert">&times;</a>
	{{session('error')}}
</div>
@endif