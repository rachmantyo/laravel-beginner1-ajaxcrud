@extends('post.master')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="pull-left">
				<h3>Update Post</h3>
			</div>
		</div>
	</div>
	@if(count($errors) > 0)
		<div class="alert alert-danger">
			<strong> WHOOOOPPPSSSS !!!</strong> There were some problems with your input. <br>
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>

		</div>
	@endif
	
  {!! Form::model($post, ['method'=>'PATCH','route'=>['post.update', $post->id]])!!}
    @include('post.form')
  {!! Form::close() !!}


@endsection