@extends('post.master')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<h3>simple Laravel CRUD</h3>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="pull-right">
				<a class="btn btn-xs btn-success" href=" {{ route('post.create') }} " > Create New Post</a>
			</div>
		</div>
	</div>

	@if($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif

	<table class="table table-bordered">
		
		<thead>
			<tr>
				<th>No</th>
				<th>Title</th>
				<th>Description</th>
				<th width="300px">Action</th>
			</tr>
		</thead>
		<tbody>

			@foreach($posts as $data)
				<tr>
					<td>{{ $data->id }}</td>
					<td>{{ $data->title }}</td>
					<td>{{ $data->desc }}</td>
					<td>
						<a class="btn btn-xs btn-info" href="{{ route('post.show', $data->id) }}" >Show</a>
						<a class="btn btn-xs btn-primary" href="{{ route('post.edit', $data->id) }}" >Edit</a>

						{!! Form::open(['method'=>'delete', 'route'=>['post.destroy', $data->id], 'style'=>'display:inline']) !!}
						{!! Form::submit('delete', ['class'=>'btn btn-xs btn-danger']) !!}
						{!! Form::close() !!}
 
					</td>
				</tr>
			@endforeach
			
		</tbody>
	</table>
	{!! $posts->links() !!}
@endsection